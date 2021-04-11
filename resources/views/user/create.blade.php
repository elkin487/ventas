@extends('dashboard.layout')
@section('content')
<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h1 class="card-title">
                            NUEVO USUARIO

                        </h1>
                        {{-- btn cerrar y colapsar --}}
                        <div class="card-tools">
                            <a class="btn btn-danger btn-sm" href="{{route('user/index')}}">Volver</a>

                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>



                    </div>

                    {{-- contenido --}}
                    <div class="container">

                        <form method="POST" action="{{route('user/store')}}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Nombre Usuario</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        value="{{old('name')}}" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">E-mail</label>
                                    <input type="email" class="form-control" id="validationDefault01"
                                        value="{{old('email')}}" name="email" required>
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Contraseña</label>
                                    <input type="password" class="form-control" id="validationDefault03"
                                        value="{{old('password')}}" name="password" required>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Dirección</label>
                                    <input type="text" class="form-control" id="validationDefault03"
                                        value="{{old('direccion_cliente')}}" name="direccion_cliente" required>
                                </div> --}}
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Rol</label>
                                    <select class="custom-select" id="validationDefault04" name="rol_id"
                                        required>
                                        <option selected disabled value="">Selecione</option>
                                        @foreach ($rol as $rol)
                                        <option value="{{$rol->rol_id}}">
                                            {{$rol->nombre_rol}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


{{-- 
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Tel/Cel</label>
                                    <input type="number" class="form-control" id="validationDefault03"
                                        value="{{old('telefono_cliente')}}" name="telefono_cliente" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Dirección</label>
                                    <input type="text" class="form-control" id="validationDefault03"
                                        value="{{old('direccion_cliente')}}" name="direccion_cliente" required>
                                </div>
                            </div> --}}

                                
                                
                          
                            <div class="col-md-3 mb-3">
                                
                                <button class="btn btn-danger" type="submit">Guardar</button>
                                <button  class="btn btn-warning" type="reset">limpiar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection