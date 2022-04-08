<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Richiamo il css --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    
    {{-- Creo una nuova istanza di VUE, precedentemente richiamata nel file js specifico per il front-end, front.js --}}
    <div id="root">

    </div>


    {{-- Richiamo lo script di vue --}}
    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>