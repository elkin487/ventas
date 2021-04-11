@extends('dashboard.layout')
@section('content')
<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h1 class="card-title">
                            CONFIGURACIONES

                        </h1>
                        {{-- btn cerrar y colapsar --}}
                        <div class="card-tools">

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
                        <form method="POST" action="{{route('configuracion/update', $configuracion->configuracion_id)}}">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Nombre Empresa</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        value="{{$configuracion->empresa}}" name="empresa" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Dirección</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        value="{{$configuracion->direccion}}" name="direccion" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">País</label>
                                    <input type="text" class="form-control" id="validationDefault03"
                                        value="{{$configuracion->pais}}" name="pais" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Ciudad</label>
                                    <input type="text" class="form-control" id="validationDefault03"
                                        value="{{$configuracion->ciudad}}" name="ciudad" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Telefono</label>
                                    <input type="number" class="form-control" id="validationDefault03"
                                        value="{{$configuracion->telefono}}" name="telefono" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">E-mail</label>
                                    <input type="email" class="form-control" id="validationDefault03"
                                        value="{{$configuracion->email}}" name="email" required>
                                </div>
                            </div>

                                
                                
                          
                            <div class="col-md-3 mb-3">
                                
                                <button class="btn btn-warning" type="submit">Guardar</button>
                                <button  class="btn btn-secondary" type="reset">limpiar</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection