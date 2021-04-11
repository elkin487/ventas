@extends('dashboard.layout')
@section('content')

<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h2 class="card-title">
                            ARTICULOS
                        </h2>
                        <!-- tools box -->
                        <div class="card-tools">
                            <a class="btn btn-danger btn-sm" href="{{route('articulo/create')}}">Crear</a>
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
                        {{-- mensajes de alerta --}}
                        @if( session('mensaje1') )
                        <br>
                        <div class="alert alert-danger alert-sm">{{ session('mensaje1') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <table class="table table-bordered data-info" id="tabla">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Codigo</th>
                                    <th>Categoria </th>
                                    <th>Stok</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articulo as $articulos)
                                <tr>
                                    <th></th>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$articulos->nombre_articulo}}</td>
                                    <td>{{$articulos->codigo_articulo}}</td>
                                    <td>{{$articulos->categoria['nombre_categoria']}}</td>
                                    <td>{{$articulos->stok}}</td>
                                    <td class="text-center"> <img style="width: 100px;" src="{{asset($articulos->imagen)}}" alt=""></td>
                                    @if($articulos->estado_id == 1)
                                    <td class="text-success"> {{$articulos->estado['nombre_estado']}}</td>
                                    @else
                                    <td class="text-danger"> {{$articulos->estado['nombre_estado']}}</td>
                                    @endif
                                    <td>
                                        @if($articulos->estado_id==1)
                                        <form method="POST"
                                            action="{{route('articulo/desactivar', $articulos->articulo_id)}}">
                                            <a href="{{route('articulo/edit',$articulos->articulo_id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="EDITAR"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning btn-sm swalDefaultSuccess"data-toggle="tooltip" data-placement="bottom" title="DESACTIVAR"><i
                                                    class="fas fa-minus-circle"></i></button>
                                            {{-- <a type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}
                                        </form>
                                        @else
                                        <form style="  float: left; margin-right: 5px;" method="POST"
                                            action="{{route('articulo/activar', $articulos->articulo_id)}}">
                                            <a href="{{route('articulo/edit',$articulos->articulo_id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="EDITAR"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="ACTIVAR"><i
                                                    class="fas fa-check-circle"></i></i></button>
                                            {{-- <a type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}
                                        </form>
                                        <form action="{{route('articulo/destroy', $articulos->articulo_id)}}"
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
                                </tfoot>
                        </table>
                        {{-- final tabla --}}
                    </div>
                </div>
            </div>
        </div>
</div>
</section>




@endsection
