@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Visualizzazione del tag</h1>

                <div>Nome: {{$tag->name}}</div>
                <div>Slug: {{$tag->slug}}</div>

                <div>
                    {{-- Tramite la funzione posts definita nel model Tag, posso recuperare i post
                        con uno specifico tag--}}
                    <ul>
                        @foreach ($tag->posts as $post)
                            <li>
                                <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <a href="{{route('admin.tags.index')}}" class="btn btn-primary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection