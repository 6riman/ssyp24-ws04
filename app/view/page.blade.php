@extends('layout')
@section('head')
    <title>Погода в школе</title>
    <script src="https://kit.fontawesome.com/2e9ea694a4.js" crossorigin="anonymous"></script>
@endsection
@section('styles')  
    #a {
        min-height: 100vh;
    }
    .info-box {
        animation: slideIn 1s ease;
    }
    @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
    }

@endsection
@section('content')
    <div class="d-flex flex-column justify-content-between" id="a">
        <div>
            @include('header', [
                "name" => "home_page",
                "url" => $url,
            ])
            @include('info') 
        </div>
        @include('footer')  
    </div>
<script src="/public/scriptChart.js"></script>
<script src="/public/scriptSun.js"></script>
@endsection
