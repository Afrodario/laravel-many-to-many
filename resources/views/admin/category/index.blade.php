@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Lista delle categorie</h1>
                <a href="{{route('admin.category.create')}}" class="btn btn-warning">Crea una nuova categoria</a>
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between">{{$category->name}}

                            <div class="d-flex">
                                <a href="{{route('admin.category.show', $category->id)}}" class="btn btn-primary">Vedi</a>
                                <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-warning mx-3">Modifca</a>
                                <form method="POST" action="{{route('admin.category.destroy', $category->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
@endsection