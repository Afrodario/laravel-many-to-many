@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{-- Pulsante che riporta alla rotta create dei post --}}
                <a href="{{route('admin.posts.create')}}" class="btn btn-warning">Crea un nuovo post</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>

                        {{-- Ciclo per tutti i post --}}
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                {{-- La funzione substr riporta solo i primi trenta caratteri del contenuto --}}
                                <td>{{substr($post->content, 0, 30)}}</td>
                                {{-- E' presente un oggetto di tipo category qui per via delle funzioni di relazione del model --}}
                                <td>{{$post->slug}}</td>
                                <td>{{$post->category->name}}</td>
                                <td class="d-flex">
                                    <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Vedi</a>
                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary mx-2">Modifica</a>

                                    <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection