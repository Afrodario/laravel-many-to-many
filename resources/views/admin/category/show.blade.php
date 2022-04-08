@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Dettagli categoria</h1>

                <div>Titolo: {{$category->name}}</div>

                <a href="{{route('admin.category.index')}}" class="btn btn-primary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection