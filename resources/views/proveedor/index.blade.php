@extends('dashboard.layout')
@section('content')

{{-- @foreach ($cliente as $cliente)
{{$cliente->nombre_cliente}}
{{$cliente->tipo_documento['nombre_tipo_documento']}}

@endforeach --}}
<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h2 class="card-title">
                            PROVEEDORES

                        </h2>
                        <!-- tools box -->
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="{{route('proveedor/create')}}">Crear</a>

                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>

                    </div>
                    <div class="card-body">
                        <!-- /.inicio tabla-->
                        {{-- mensajes --}}
                        @if( session('mensaje1') )
                        <br>
                        <div class="alert alert-success alert-sm">{{ session('mensaje1') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        @endif
                        @if( session('mensaje2') )
                        <br>
                        <div class="alert alert-success alert-sm">{{ session('mensaje2') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        @endif
                        <table class="table table-bordered" id="tabla">

                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>N° Doc</th>
                                    <th>Tel/Cel</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($proveedor as $proveedores)
                                <tr>
                                    <th></th>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$proveedores->nombre_proveedor}}</td>
                                    <td>{{$proveedores->tipo_documento['nombre_tipo_documento']}}</td>
                                    <td>{{$proveedores->numero_documento_proveedor}}</td>
                                    <td>{{$proveedores->telefono_proveedor}}</td>
                                    <td>{{$proveedores->email_proveedor}}</td>
                                    @if($proveedores->estado_id == 1)
                                    <td class="text-success"> {{$proveedores->estado['nombre_estado']}}</td>
                                    @else
                                    <td class="text-danger"> {{$proveedores->estado['nombre_estado']}}</td>
                                    @endif
                                    
                                    <td>
                                        @if($proveedores->estado_id==1)
                                        <form method="POST"
                                            action="{{route('proveedor/desactivar', $proveedores->proveedor_id)}}">
                                            <a href="{{route('proveedor/edit', $proveedores->proveedor_id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="EDITAR"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="DESACTIVAR"><i
                                                    class="fas fa-minus-circle"></i></button>
                                            {{-- <a type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}

                                        </form>

                                        @else
                                        <form style="  float: left; margin-right: 5px;" method="POST"
                                            action="{{route('proveedor/activar', $proveedores->proveedor_id)}}">
                                            <a href="{{route('proveedor/edit',$proveedores->proveedor_id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="ACTIVAR"><i
                                                    class="fas fa-check-circle"></i></i></button>
                                            {{-- <a type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}

                                        </form>
                                        <form action="{{route('proveedor/destroy', $proveedores->proveedor_id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="ELIMINAR"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>

                                        @endif

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- final tabla --}}
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
{{-- final seccion --}}

@endsection
