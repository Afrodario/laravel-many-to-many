@extends('admin.layouts.admin-base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Recuperato dall'HomeController i dati sull'utente attuale loggato, 
                    posso stamparne il nome e tutte le informazioni che desidero --}}
                    <span>Bentornato, {{$user->name}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
