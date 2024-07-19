<div class="col-xl-{{$size}} col-sm-6 mb-4 info-box">
    <div class="card bg-{{$theme}} border-body-tertiary">
        <div class="card-body">
            <p class="card-text"> {{$card_name}} </p>
            <h5 class="card-title" @if($id) id="{{$id}}" @endif>  {!!$card_info!!} </h5>
        </div>  
    </div>
</div> 