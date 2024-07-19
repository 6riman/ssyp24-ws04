
    <div class="container">
        <div class="d-flex justify-content-stat align-items-center">
            <h2 class="mt-4 mb-3 me-3">Статистика за день</h2>
        </div>

        <div class="d-flex justify-content-stat align-items-center mb-4"> 
            <form action="/" method="GET">
                <div class="d-flex justify-content-stat align-items-center">
                    <input class="form-control me-3 bg-{{$theme}} @if($theme === 'light') text-black @else text-white @endif" style="max-width:200px" id="calendar-input" type="date" value="{{$send_date}}" name="date" />
                    <button type="submit" class="btn btn-primary">Показать</button>
                </div>
            </form> 
        </div> 
        <div class="row"> 
            @if(!$no_statistic)
                @if($send_date === date('Y-m-d'))
                    @include('card', ['card_name' => 'Температура', 'card_info' => $temperature.' °C', 'size' => 3])
                    @include('card', ['card_name' => 'Давление', 'card_info' => $pressure.' мм.рт.ст', 'size' => 3])
                    @include('card', ['card_name' => 'Влажность', 'card_info' => $humidity.' %', 'size' => 3])
                    @include('card', ['card_name' => 'Средняя t°', 'card_info' => $avg_temp.' °C', 'size' => 3])
                    @include('card', ['card_name' => 'Минимальная t°', 'card_info' => $min_temp.' °C', 'size' => 3])
                    @include('card', ['card_name' => 'Максимальная t°', 'card_info' => $max_temp.' °C', 'size' => 3])
                    @include('card', ['card_name' => 'Время восхода', 'id' => 'sunrise', 'card_info' => 0, 'size' => 3])
                    @include('card', ['card_name' => 'Время заката', 'id' => 'sunset', 'card_info' => 0, 'size' => 3])
                    <p><small>*Время последнего измерения {{$create_time}}</small></p>
                @endif
                @if($send_date !== date('Y-m-d'))
                    @component('card', ['card_name' => 'Утро', 'size' => 3]) 
                        @slot('card_info')
                            <i class="fa-solid fa-temperature-low" style = "min-width: 25px"></i> {{number_format($morning_data['temperature']??0, 1, ',', ' ')}} °C<br /> <br /> <i class="fa-solid fa-cloud-arrow-down" style = "min-width: 25px"></i> {{number_format($morning_data['pressure']??0, 0, ',', ' ')}} мм.рт.ст<br/> <br /> <i class="fa-solid fa-droplet" style = "min-width: 25px"></i> {{number_format($morning_data['humidity']??0, 0, ',', ' ')}} %<br/>
                        @endslot
                    @endcomponent
                    @component('card', ['card_name' => 'День', 'size' => 3])
                        @slot('card_info')
                            <i class="fa-solid fa-temperature-low" style = "min-width: 25px"></i> {{number_format($noon_data['temperature']??0, 1, ',', ' ')}} °C<br /> <br /> <i class="fa-solid fa-cloud-arrow-down" style = "min-width: 25px"></i>  {{number_format($noon_data['pressure']??0, 0, ',', ' ')}} мм.рт.ст<br/> <br /> <i class="fa-solid fa-droplet" style = "min-width: 25px"></i> {{number_format($noon_data['humidity']??0, 0, ',', ' ')}} %<br/>
                        @endslot
                    @endcomponent
                     @component('card', ['card_name' => 'Вечер', 'size' => 3])
                        @slot('card_info')
                            <i class="fa-solid fa-temperature-low" style = "min-width: 25px"></i> {{number_format($evening_data['temperature']??0, 1, ',', ' ')}} °C<br /> <br /> <i class="fa-solid fa-cloud-arrow-down" style = "min-width: 25px"></i>  {{number_format($evening_data['pressure']??0, 0, ',', ' ')}} мм.рт.ст<br/> <br /> <i class="fa-solid fa-droplet" style = "min-width: 25px"></i> {{number_format($evening_data['humidity']??0, 0, ',', ' ')}} %<br/>
                        @endslot
                    @endcomponent
                    @component('card', ['card_name' => 'Ночь', 'size' => 3])
                        @slot('card_info')
                            <i class="fa-solid fa-temperature-low" style = "min-width: 25px"></i> {{number_format($night_data['temperature']??0, 1, ',', ' ')}} °C<br /> <br /> <i class="fa-solid fa-cloud-arrow-down" style = "min-width: 25px"></i>  {{number_format($night_data['pressure']??0, 0, ',', ' ')}} мм.рт.ст<br/> <br /> <i class="fa-solid fa-droplet" style = "min-width: 25px"></i> {{number_format($night_data['humidity']??0, 0, ',', ' ')}} %<br/>
                        @endslot
                    @endcomponent
                    @include('card', ['card_name' => 'Средняя t°', 'card_info' => $avg_temp.' °C', 'size' => 4])
                    @include('card', ['card_name' => 'Минимальная t°', 'card_info' => $min_temp.' °C', 'size' => 4])
                    @include('card', ['card_name' => 'Максимальная t°', 'card_info' => $max_temp.' °C', 'size' => 4])
                    @include('card', ['card_name' => 'Время восхода', 'id' => 'sunrise', 'card_info' => 0, 'size' => 6])
                    @include('card', ['card_name' => 'Время заката', 'id' => 'sunset', 'card_info' => 0, 'size' => 6])
                @endif
                <h2 class="mt-4 mb-3" id="chart">График</h2>
                <form action="/#chart" method="GET">
                    <div style="max-width: 400px;" class="d-flex justify-content-around align-items-start gap-3 mb-3">
                        <div class="fs-5 fw-bold">
                            <select class="form-select" required aria-label="select example" name="data_type_chart">
                                <option @if($data_type_chart === "temperature") selected @endif value="temperature">Температура</option>
                                <option @if($data_type_chart === "pressure") selected @endif value="pressure">Давление</option>
                                <option @if($data_type_chart === "humidity") selected @endif value="humidity">Влажность</option>
                            </select>
                        </div>
                        <div class="fs-5 fw-bold">
                            <select class="form-select" required aria-label="select example" name="time_chart">
                                <option @if($time_chart == "1") selected @endif value="1">1 день</option>
                                <option @if($time_chart == "3") selected @endif value="3">3 дня</option>
                                <option @if($time_chart == "7") selected @endif value="7">1 неделя</option>
                            </select>
                        </div>

                        <input type="hidden" value="{{$send_date}}" name="date">
                        <button type="submit" class="btn btn-primary">График</button>
                    </div>
                </form>
                
                <table id="weatherChart-table" style="display: none;" caption="meteo.info">
                    <tr>
                        <td>Date</td>
                        @if($data_type_chart === "temperature")
                            <td>Temperature</td>
                        @endif
                        @if($data_type_chart === "pressure")
                            <td>Pressure</td>
                        @endif
                        @if($data_type_chart === "humidity")
                            <td>Humidity</td>
                        @endif
                    </tr>
                    @foreach($table as $value)
                        <tr>
                            <td>{{date("m.d.y H:i", strtotime($value['create_time']))}}</td>
                            @if($data_type_chart === "temperature")
                                <td>{{$value['temperature']}}</td>
                            @endif
                            @if($data_type_chart === "pressure")
                                <td>{{$value['pressure']}}</td>
                            @endif
                            @if($data_type_chart === "humidity")
                                <td>{{$value['humidity']}}</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
                
                <div class="container mb-5" style="width: 100%; overflow: auto;" >
                    <div style="min-width: 1000px; overflow: auto;">
                         <canvas id="weatherChart"></canvas>
                    </div>
            
                </div>
                @endif
                @if($no_statistic)
                    <div class="container text-center fs-1 text-primary fw-bold">Нет данных</div>
                @endif
            </div>
            <script>
                window.onbeforeunload = () => sessionStorage.setItem('scrollPos', window.scrollY);
                window.onload = () => window.scrollTo(0, sessionStorage.getItem('scrollPos') || 0);
            </script>
            @if(!$no_statistic)
                @include('fox')
            @endif 
           
</div>