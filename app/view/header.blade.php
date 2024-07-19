
<div class="bg-primary-subtle">
    <div class="d-flex  justify-content-between container ">
        <div class="d-flex justify-content-stat align-items-center fs-1 pt-2 pb-2">       
            @if($theme === 'light')
            <a href="{{$url}}">
                <i class="fa-solid fa-sun text-primary me-3"></i> 
            </a>
            @else
            <a href="{{$url}}">
                <i class="fa-solid fa-moon text-primary me-3"></i>
            </a>   
            @endif
            <a href="/" style="text-decoration: none;">
                <h1  class="fs-1 fw-bold text-primary mb-0">Погода в школе</h1>
            </a>
        </div>
        <div class="d-flex align-items-center">
        <div class="dropdown-right">
  <div class="dropdown fs-1 text-primary" id="dropdownMenuButton2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-bars"></i>
</div>
  <ul class="dropdown-menu dropdown-menu-end @if($theme === 'light') dropdown-menu-light @else dropdown-menu-dark @endif" aria-labelledby="dropdownMenuButton2">
    @if($name === "home_page")
    <li><a class="dropdown-item" href="/about/">О нас</a></li>
    <li><a class="dropdown-item" href="https://meteo.ssypmarket.ru/advice/">Случайный совет</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item active" href="https://meteo.ssypmarket.ru/">Главная страница</a></li>
    @endif
    @if($name === "advice")
    <li><a class="dropdown-item" href="/about/">О нас</a></li>
    <li><a class="dropdown-item" href="https://meteo.ssypmarket.ru/">Главная страница</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item active" href="https://meteo.ssypmarket.ru/advice/">Случайный совет</a></li>
    @endif
    @if($name === "about")
    <li><a class="dropdown-item" href="https://meteo.ssypmarket.ru/">Главная страница</a></li>
    <li><a class="dropdown-item" href="https://meteo.ssypmarket.ru/advice/">Случайный совет</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item active" href="/about/">О нас</a></li>
    @endif

  </ul>
</div>
        </div>
    </div> 
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    