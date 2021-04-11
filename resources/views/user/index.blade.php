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
                <div class="card card-secondary card-outline">
                    <div class="card-header">
                        <h2 class="card-title">
                            USUARIOS

                        </h2>
                        <!-- tools box -->
                        <div class="card-tools">
                            <a class="btn btn-secondary btn-sm" href="{{route('user/create')}}">Crear</a>

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
                        <table class="table table-bordered" id="tabla">

                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>email</th>
                                    <th>Fecha de creación</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>

                            <tbody>
                                @foreach ($user as $users)
                                <tr>
                                    <th></th>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->created_at}}</td>
                                    <td>{{$users->rol['nombre_rol']}}</td>
                                    @if($users->estado_id == 1)
                                    <td class="text-success"> {{$users->estado['nombre_estado']}}</td>
                                    @else
                                    <td class="text-danger"> {{$users->estado['nombre_estado']}}</td>
                                    @endif
                                    <td>
                                        @if($users->estado_id==1)
                                        <form method="POST"
                                            action="{{route('user/desactivar', $users->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="DESACTIVAR"><i
                                                    class="fas fa-minus-circle"></i></button>

                                        </form>

                                        @else
                                        <form style="float: left; margin-right: 5px;" method="POST"
                                            action="{{route('user/activar', $users->id)}}">
                                            {{-- <a href="{{route('user/edit',$users->user_id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a> --}}
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="ACTIVAR"><i
                                                    class="fas fa-check-circle"></i></i></button>

                                        </form>
                                        <form action="{{route('user/destroy', $users->id)}}"
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
