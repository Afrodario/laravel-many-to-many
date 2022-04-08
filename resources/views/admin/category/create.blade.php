@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Crea una nuova categoria</h1>

                {{-- Il form con metodo POST punta alla rotta store --}}
                <form method="POST" action={{route('admin.category.store')}}>

                    {{-- Controllo --}}
                    @csrf

                    <div class="form-group">
                      <label for="name">Nome della categoria</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Salva categoria</button>

                  </form>
            </div>
        </div>
    </div>
@endsection