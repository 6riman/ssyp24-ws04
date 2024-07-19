<div class="col-xl-{{$size}} col-sm-6 mb-4 info-box">
    <div class="card bg-{{$theme}} @if($theme === 'light') border-secondary @else border-light @endif">
        <div class="card-body">
            <p class="card-title fw-bold"> {{$card_name}} </p>
            <h5 class="card-text fw-bold" @if($id) id="{{$id}}" @endif>  {!!$card_info!!} </h5>
        </div>  
    </div>
</div> 