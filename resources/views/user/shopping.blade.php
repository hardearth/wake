@extends('layouts.educrat_user')
@section('content')
    <div class="row pb-50 mb-10">
        <div class="col-auto">
            <h1 class="text-30 lh-12 fw-700">Tus Pagos </h1>
        </div>
    </div>

    <div class="row y-gap-30">
        <div class="col-12">
            <div class="rounded-16 bg-white shadow-4 h-100">
                <div class="py-30 px-30">
                    <div class="mt-15">Si tiene alguna duda o alguna consulta sobre sus pagos comuniquese con nuestro canal de atención al cliente, ahi le brindaremos toda la información que necesite.</div>
                    <button class="button h-50 px-30 -purple-1 text-white mt-30">Atención al cliente</button>

                    <div class="mt-40">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Monto')}}</th>
                                <th>{{__('Nombre')}}</th>
                                <th>{{__('Apellido')}}</th>
                                <th>{{__('Ciudad')}}</th>
                                <th>{{__('Celular')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Método Pago')}} </th>
                                <th>{{__('Estado')}}</th>
                                <th>{{__('Fecha')}}</th>
                                <th>{{__('Detalle')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bills as $bill)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>$ {{$bill->amount}}</td>
                                    <td>{{$bill->name}}</td>
                                    <td>{{$bill->lastname}}</td>
                                    <td>{{$bill->city}}</td>
                                    <td>{{$bill->cellphone}}</td>
                                    <td>{{$bill->email}}</td>
                                    <td>{{$bill->payment_method}}</td>
                                    <td>{{$bill->status_name}}</td>
                                    <td>{{$bill->created_at}}</td>
                                    <td>
                                        @if($bill->courses && is_object($bill->courses))
                                            <button type="button" class="button px-10 -purple-1 text-white" data-bs-toggle="modal" data-bs-target="#detail_bill_{{$bill->id}}">
                                                {{__('Detalle')}}
                                            </button>
                                            @include('user.partial.shopping.modal', compact('bill'))
                                        @endif
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">{{__('Sin registros')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex text-center items-center mt-50">

                        {{$bills->links()}}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
