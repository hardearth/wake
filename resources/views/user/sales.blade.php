@extends('layouts.educrat_user')
@section('content')

    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">Ventas y Pagos</h1>
            </div>
        </div>


        <div class="row y-gap-30">

            <div class="col-xl-4 col-md-4">
                <div
                    class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">{{__('Afiliados')}}</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">{{$user->referred->count()}}</div>
                        <div class="lh-1 mt-25"><a href="">Ver todos los afiliados </a></div>
                    </div>

                    <i class="text-40 icon-online-learning text-purple-1"></i>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div
                    class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Membresias</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">0</div>
                        <div class="lh-1 mt-25"><a href="">Total de membresías vendidas </a></div>
                    </div>
                    <i class="text-40 icon-graduate-cap text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <div
                    class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Cursos</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">{{$user->salesCourses()->courses}}</div>
                        <div class="lh-1 mt-25"><a href="">Total de cursos vendidos </a></div>
                    </div>

                    <i class="text-40 icon-play-button text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-6 col-md-6">
                <div
                    class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Ultimo pago</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">0$</div>
                        <div class="lh-1 mt-25">Ultimo pago abonado a tu wallet</div>
                    </div>

                    <i class="text-40 icon-graduate-cap text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-6 col-md-6">
                <div
                    class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Ganancias Totales</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">{{$user->salesCourses()->profits}}</div>
                        <div class="lh-1 mt-25">Suma de todos los abonos realizados a tus wallet</div>
                    </div>

                    <i class="text-40 icon-online-learning text-purple-1"></i>
                </div>
            </div>

        </div>

        <div class="row y-gap-30 pt-30">
            <div class="col-xl-12 col-md-6">
                <div
                    class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <table class="table w-1/1 text-center">
                        <thead>
                        <tr>
                            <th style="width: 20%;">Fecha y hora</th>
                            <th style="width: 15%;">Estatus</th>
                            <th style="width: 40%;">Descripción</th>
                            <th style="width: 15%;">Cantidad (USD)</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td colspan="3" class="text-center" style="color: gray">No existen registros</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- fin de la sección -->
    </div>

@endsection
