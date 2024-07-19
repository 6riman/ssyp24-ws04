@extends('layout')
@section('head')
    <title>Погода в школе</title>
    <script src="https://kit.fontawesome.com/2e9ea694a4.js" crossorigin="anonymous"></script>
@endsection
@section('styles') 
img{
    max-width: 650px;
    max-height: 650px;
} 
@endsection
@section('content')
<div class = 'fs-1'>
    <div class = "container d-flex justify-content-around">
        <img src="/public/img/404.jpg" alt="404 Image" class="w-100 h-100 mt-3 error-image " >
    </div>
    <div class = "container d-flex justify-content-around">
        <h1 class="d-flex justify-content-center fw-bold">Ошибка 404</h1>
    </div>
    <div class = "container d-flex justify-content-around">
        <p class="fs-2 d-flex justify-content-center fw-bold">Страница не найдена</p>
    </div>
    <br/>
    <div class = "container d-flex justify-content-around">
        <a href="/" class="fs-5 btn btn-primary return-button d-flex justify-content-center w-100" style = "max-width: 350px;">Вернуться на сайт</a>
    </div>
</div>
@endsection
