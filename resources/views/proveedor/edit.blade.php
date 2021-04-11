@extends('dashboard.layout')
@section('content')
<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h1 class="card-title">
                            EDITAR PROVEEDOR

                        </h1>
                        {{-- btn cerrar y colapsar --}}
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="{{route('proveedor/index')}}">Volver</a>

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
                        <form method="POST" action="{{route('proveedor/update', $proveedor->proveedor_id)}}">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Nombre proveedor</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        value="{{$proveedor->nombre_proveedor}}" name="nombre_proveedor" required>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Tipo Documento</label>
                                    <select class="form-control " name="tipo_documento_id"
                                    value="{{ old('nombre_tipo_documento') }}" required
                                    {{-- autocomplete="empleado_tipo_empleado" autofocus> --}}
                                    @foreach($tipo_documento as $tipo_documento)
                                    <option value="{{ $tipo_documento->tipo_documento_id }}" @if($proveedor->tipo_documento_id ===
                                        $tipo_documento->tipo_documento_id) selected='selected'
                                        @endif>{{$tipo_documento->nombre_tipo_documento}}</option>
                                    @endforeach
                                </select>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Numero de Documento</label>
                                    <input type="number" class="form-control" id="validationDefault02"
                                        value="{{($proveedor->numero_documento_proveedor)}}" min="1" 
                                        name="numero_documento_proveedor" required>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Tel/Cel</label>
                                    <input type="number" class="form-control" id="validationDefault03"
                                        value="{{($proveedor->telefono_proveedor)}}" name="telefono_proveedor" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">E-mail</label>
                                    <input type="email" class="form-control" id="validationDefault01"
                                        value="{{($proveedor->email_proveedor)}}" name="email_proveedor" required>
                                </div>

                            </div>
                            <div class="col-md-3 mb-3">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection