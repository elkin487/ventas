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
                            CONFIGURACIONES

                        </h2>
                        <!-- tools box -->
                        <div class="card-tools">
                            @if(count($configuracion)==0)
                            <a class="btn btn-danger btn-sm" href="{{route('configuracion/create')}}">Crear</a>
                            @endif
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
                        <table class="table table-bordered" id="tabla">
                            <thead>
                                <tr>

                                    <th></th>
                                    <th>#</th>
                                    <th>Empresa</th>
                                    <th>Direccion</th>
                                    <th>Pais </th>
                                    <th>Ciudad</th>
                                    <th>Telefono</th>
                                    <th>E-mail</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($configuracion as $configuraciones)
                                <tr>
                                    <th></th>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$configuraciones->empresa}}</td>
                                    <td>{{$configuraciones->direccion}}</td>
                                    <td>{{$configuraciones->pais}}</td>
                                    <td>{{$configuraciones->ciudad}}</td>
                                    <td>{{$configuraciones->telefono}}</td>
                                    <td>{{$configuraciones->email}}</td>
                                <td>
                                    <form action="{{route('configuracion/destroy', $configuraciones->configuracion_id)}}" method="POST">
                                    
                                        <a href="{{route('configuracion/edit',$configuraciones->configuracion_id)}}" class="btn btn-info btn-sm">
                                            <i class="far fa-edit"></i></a>

                                        @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                        class="far fa-trash-alt"></i></button>

                                    </form>
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
