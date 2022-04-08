@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>

                        {{-- Ciclo per tutti i post --}}
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug}}</td>
                                <td class="d-flex">
                                    <a href="{{route('admin.tags.show', $tag->id)}}" class="btn btn-primary">Vedi</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection