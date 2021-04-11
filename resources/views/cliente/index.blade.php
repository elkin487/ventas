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
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h2 class="card-title">
                            CLIENTES

                        </h2>
                        <!-- tools box -->
                    <div class="card-tools">
                        <a class="btn btn-danger btn-sm" href="{{route('cliente/create')}}">Crear</a>

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
                            <th>telefono</th>
                            <th>Direccion</th>
                            <th>email</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($cliente as $clientes)
                            <tr>
                                <th></th>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$clientes->nombre_cliente}}</td>
                        <td>{{$clientes->tipo_documento['nombre_tipo_documento']}}</td>
                        <td>{{$clientes->numero_doc_cliente}}</td>
                        <td>{{$clientes->telefono_cliente}}</td>
                        <td>{{$clientes->direccion_cliente}}</td>
                        <td>{{$clientes->email_cliente}}</td>
                        @if($clientes->estado_id == 1)
                                    <td class="text-success"> {{$clientes->estado['nombre_estado']}}</td>
                                    @else
                                    <td class="text-danger"> {{$clientes->estado['nombre_estado']}}</td>
                                    @endif
                                    <td>
                                        @if($clientes->estado_id==1)
                                        <form method="POST"
                                            action="{{route('cliente/desactivar', $clientes->cliente_id)}}">
                                            <a href="{{route('cliente/edit',$clientes->cliente_id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="EDITAR"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="DESACTIVAR"><i
                                                    class="fas fa-minus-circle"></i></button>
                                            {{-- <a type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}

                                        </form>

                                        @else
                                        <form style="  float: left; margin-right: 5px;" method="POST"
                                            action="{{route('cliente/activar', $clientes->cliente_id)}}">
                                            <a href="{{route('cliente/edit', $clientes->cliente_id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="ACTIVAR"><i
                                                    class="fas fa-check-circle"></i></i></button>
                                            {{-- <a type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}

                                        </form>
                                        <form action="{{route('ciente/destroy', $clientes->cliente_id)}}"
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