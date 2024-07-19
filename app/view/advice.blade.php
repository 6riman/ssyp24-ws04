@extends('layout')
@section('head')
    <title>Случайный Совет</title>
    <script src="https://kit.fontawesome.com/2e9ea694a4.js" crossorigin="anonymous"></script>
@endsection
@section('styles')
    #a {
        min-height: 100vh;
    }
    button {
            color: white;
            border: none;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            animation: bounce 1s infinite alternate;
        }
        .advice-box {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease;
            text-align: left;
        }
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-5px); }
        }
@endsection
@section('content')
    <div class="d-flex flex-column justify-content-between" id="a">
        <div>
        @include('header', [
            "name" => "advice",
            "url" => $url,
        ]) 
        @include('advice_content')
        </div>
        @include('footer')
    </div>
@endsection
