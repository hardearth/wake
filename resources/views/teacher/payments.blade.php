@extends('layouts.educrat_user')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">Ventas y Pagos área de instructores</h1>
            </div>
        </div>


        <div class="row y-gap-30">

            <div class="col-xl-4 col-md-4">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Alumnos registrados</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">15</div>
                        <div class="lh-1 mt-25"><a href="">Ver todos los afiliados </a></div>
                    </div>

                    <i class="text-40 icon-online-learning text-purple-1"></i>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Membresias totales</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">15</div>
                        <div class="lh-1 mt-25"><a href="">Total de membresias vendidas </a></div>
                    </div>
                    <i class="text-40 icon-graduate-cap text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Mis Cursos vendidos</div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">3,759</div>
                        <div class="lh-1 mt-25"><a href="">Total de cursos vendidos </a></div>
                    </div>

                    <i class="text-40 icon-play-button text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-6 col-md-6">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Ultimo pago </div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">25$</div>
                        <div class="lh-1 mt-25">Ultimo pago abonado a tu wallet </div>
                    </div>

                    <i class="text-40 icon-graduate-cap text-purple-1"></i>
                </div>
            </div>

            <div class="col-xl-6 col-md-6">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div>
                        <div class="lh-1 fw-500 text-18">Ganancias Totales </div>
                        <div class="text-35 lh-1 fw-700 text-dark-1 mt-20">3,759 $</div>
                        <div class="lh-1 mt-25">Suma de todos los abonos realizados a tus wallet</div>
                    </div>

                    <i class="text-40 icon-online-learning text-purple-1"></i>
                </div>
            </div>

        </div>

        <div class="row y-gap-30 pt-30">
            <div class="col-xl-12 col-md-6">
                <div class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
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
                            <td>24 junio 2023</td>
                            <td>Aprobada</td>
                            <td>Se ha realizado una afiliación por tu referido "Pedro Mata"</td>
                            <td>24$</td>
                        </tr>
                        <tr>
                            <td>02 junio 2023</td>
                            <td>Rechazada</td>
                            <td>Afiliaste un referido "Leonel Messi"</td>
                            <td>28$</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- fin de la sección -->


    </div>
@endsection
