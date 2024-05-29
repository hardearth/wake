@if($date->gt(\Carbon\Carbon::now()))
<div class="row">
    <div class="col-md-12">
        <div class="clock">
            <div class="digit tenday">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>

            </div>

            <div class="digit day">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>
                <div class="w-100 flap-text">Dias</div>
            </div>
            <div class="digit tenhour">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>
            </div>

            <div class="digit hour">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>
                <div class="w-100 flap-text">Horas</div>
            </div>

            <div class="digit tenmin">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>
            </div>

            <div class="digit min">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>
                <div class="w-100 flap-text">Minutos</div>
            </div>

            <div class="digit tensec">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>
            </div>

            <div class="digit sec">
                <span class="base"></span>
                <div class="flap over front"></div>
                <div class="flap over back"></div>
                <div class="flap under"></div>
                <div class="w-100 flap-text">Segundos</div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
    @parent
    <script>
        $(document).ready(function () {
            var targetDate = new Date('{{isset($date)?$date:\Carbon\Carbon::now()->addDays(10)->format('Y-m-d H:i:s')}}');
            setTime(targetDate, false);

            setInterval(function () {
                setTime(targetDate, true);
            }, 1000);
        });

    </script>
    <script src="{{asset('js/clock.js')}}"></script>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/clock.css')}}">
@endsection
@endif
