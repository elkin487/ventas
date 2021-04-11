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
                            INGRESOS

                        </h2>
                        <!-- tools box -->
                        <div class="card-tools">
                            <a class="btn btn-secondary btn-sm" href="{{route('ingreso/create')}}">Crear</a>

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
                        <table class="table table-bordered data-info" id="tabla">

                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Fecha creación</th>
                                    <th>Proveedor</th>
                                    <th>Comprobante</th>
                                    <th>estado</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody>
                            @foreach ($ingreso as $ingresos)
                           
                                <tr>
                                    <th></th>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ingresos->fecha_create}}</td>
                                    <td>{{$ingresos->proveedor['nombre_proveedor']}}</td>
                                    <td>{{$ingresos->comprobante['nombre_comprobante']}}</td>
                                    @if($ingresos->estado_id == 3)
                                    <td  class="text-success" > {{$ingresos->estado['nombre_estado']}}</td>
                                    @else
                                    <td  class="text-danger" > {{$ingresos->estado['nombre_estado']}}</td>
                                    @endif
                                    <td>
                                        @if($ingresos->estado_id == 3)
                                        <form method="POST"
                                            action="{{route('ingreso/anulado', $ingresos->ingreso_id)}}">
                                            <a href="" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="EDITAR"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="ANULAR"><i
                                                    class="fas fa-minus-circle"></i></button>
                                            <a href="{{route('ingreso/reporte',$ingresos->ingreso_id)}}" class="btn btn-secondary btn-sm"><i style="color: white;" class="far fa-file-pdf" data-toggle="tooltip" data-placement="bottom" title="REPORTE"></i></a>

                                        </form>

                                        @else
                                        <form style="  float: left; margin-right: 5px;" method="POST"
                                            action="{{route('ingreso/confirmado', $ingresos->ingreso_id)}}">
                                            <a href="" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="CONFIRMAR"><i
                                                    class="fas fa-check-circle"></i></i></button>
                                            {{-- <a type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a> --}}

                                        </form>
                                        <form action="{{route('ingreso/destroy', $ingresos->ingreso_id)}}"
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
{{-- final seccion --}}








@endsection
