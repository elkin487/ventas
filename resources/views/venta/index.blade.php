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
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Ventas

                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <a class="btn btn-info btn-sm" href="{{route('venta/create')}}">Crear</a>

                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="tabla">

                            <thead>
                                <tr>


                                    <th></th>
                                    <th>#</th>
                                    <th>fecha creación</th>
                                    <th>Cliente</th>
                                    <th>Comprobante</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>


                            </thead>
                            <tbody>
                                @foreach ($venta as $ventas)

                                <tr>
                                    <th></th>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ventas->time_create}}</td>
                                    <td>{{$ventas->cliente['nombre_cliente']}}</td>
                                    <td>{{$ventas->comprobante['nombre_comprobante']}}</td>
                                    <td>{{$ventas->cantidad_venta * $ventas->precio_venta}}</td>
                                    @if($ventas->estado_id == 1)
                                    <td  class="text-success" > {{$ventas->estado['nombre_estado']}}</td>
                                    @else
                                    <td  class="text-danger" > {{$ventas->estado['nombre_estado']}}</td>
                                    @endif
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                        <a href="" class="btn btn-warning btn-sm"><i class="far fa-file-pdf"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>


                                    </td>
                                </tr>
                                @endforeach

                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </section>
</div>






@endsection
