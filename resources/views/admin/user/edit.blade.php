@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Edición Usuario')}} </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.cruds.user.update',$user)}}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="name">Nombre:</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                       class="form-control" required>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                       class="form-control" required>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="role_id">Rol:</label>
                                {{Form::select('role_id',$roles, old('role_id', $user->roles_id), ['class'=> "form-control",'required'] )}}
                                @error('role_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="referred_user_id">Usuario referido:</label>
                                <input type="text" id="referred_user_id" value="{{ $user->referred_user?->name }}"
                                       class="form-control" disabled>
                                @error('referred_user_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="referred_url">URL referida:</label>
                                <input type="text" id="referred_url" value="{{ $user->referred_url }}" class="form-control" disabled>
                                @error('referred_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="password">Nueva Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="password_confirmation">Confirmar contraseña:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Guardar cambios</button>
                    </form>
                </div>

            </div>
        </div>



        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Pagos')}} </h4>
                </div>
                <div class="card-body overflow-auto">
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
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($user->bills as $bill)
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">{{__('Sin registros')}}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
