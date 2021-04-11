@extends('dashboard.layout')
@section('content')
<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h2 class="card-title">
                            CATEGORIAS
                        </h2>
                        <div class="card-tools">
                            {{-- boton crear --}}
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#modal-default">
                                Crear
                            </button>
                            {{-- Modal --}}
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h4 class="modal-title">Crear Categoria</h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('categoria/store')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">Nombre De Categoria</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="formGroupExampleInput" name="nombre_categoria" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Descripción</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="formGroupExampleInput2" name="descripcion_categoria"
                                                        required>
                                                </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="reset" class="btn btn-secondary">limpiar</button>
                                            <button type="submit" class="btn btn-success">Crear</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                        {{-- mensaje de alerta --}}
                        @if( session('mensaje2') )
                        <br>
                        <div class="alert alert-success alert-sm">{{ session('mensaje2') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        @endif

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
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria as $categorias)
                                <tr>
                                    <th></th>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$categorias->nombre_categoria}}</td>
                                    <td>{{$categorias->descripcion_categoria}}</td>
                                    <td>
                                        <form action="{{route('categoria/destroy', $categorias->categoria_id)}}"
                                            method="POST">
                                            <a href="" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="EDITAR"><i class="far fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm swalDefaultSuccess" data-toggle="tooltip" data-placement="bottom" title="ELIMINAR"><i
                                                    class="far fa-trash-alt"></i></button>
                                    </td>
                                    </form>
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
