<div class="d-flex flex-column justify-content-around" id="a">
<div class = "container d-flex justify-content-around">
<div class="col-xl-6 col-sm-6 mb-4 mt-2 advice-box bg-{{$theme}}">
    <div class="text-center card border-secondary bg-{{$theme}}">
        <div class="card-body">
            <p class="card-text fs-1 fw-bold"> Случайный совет </p>
            <h5 class="card-title fs-2 fw-light" @if($id) id="{{$id}}" @endif> {{$advice}} </h5>
            <a href = "https://meteo.ssypmarket.ru/advice/">
            <button class="btn btn-primary fs-3">Новый совет</button>
            </a>  
            <label class="consent-label fw-light fs-5" onclick="window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ')">
                <input type="checkbox" id="consentCheckbox" style="margin-left: 10px;">
                Я принимаю условия обработки персональных данных
            </label>
        </div>
    </div>
</div>
</div>
</div>






    
