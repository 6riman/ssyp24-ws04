@extends('layout')
@section('head')
    <title>Погода в школе</title>
    <script src="https://kit.fontawesome.com/2e9ea694a4.js" crossorigin="anonymous"></script>
@endsection
@section('styles')  
    #a {
        min-height: 100vh;
    }
@endsection
@section('content')
    <div class="d-flex flex-column justify-content-between" id="a">
        <div>
            @include('header', [
                "name" => "about",
                "url" => $url,
            ])
            @include('intro') 

        </div>
        @include('footer')
        
    </div>
@endsection