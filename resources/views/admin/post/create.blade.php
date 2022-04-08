@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Crea un nuovo post</h1>

                {{-- Il form con metodo POST punta alla rotta store --}}
                <form method="POST" action={{route('admin.posts.store')}}>

                    {{-- Controllo --}}
                    @csrf

                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="form-control" id="category_id" name="category_id">

                            <option value="">Selezionare una categoria</option>

                            @foreach ($categories as $category)
                                <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                      <label for="title">Titolo</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="content">Contenuto del post</label>
                        <textarea class="form-control" id="content" rows="10" name="content" value="{{old('content')}}"></textarea>
                    </div>

                    @foreach ($tags as $tag) 
                        <div class="custom-control custom-checkbox">
                            {{-- La sintassi nel name dell'input serve per inviare al backend i value come array
                            e capire tutti i valori e quali sono selezionati --}}

                            {{-- la funzione old prevede come secondo parametro [] per prevedere il caso in cui arrivi come valore un array
                                vuoto, quindi null --}}
                            <input name="tags[]" type="checkbox" id="tag_{{$tag->id}}" value="{{$tag->id}}" {{in_array($tag->id, old('tags', []))?'checked':''}}>
                            <label class="custom-control-checkbox" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Salva post</button>

                </form>
            </div>
        </div>
    </div>
@endsection