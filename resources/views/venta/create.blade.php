@extends('dashboard.layout')
@section('content')

<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h1 class="card-title">
                            NUEVA VENTA

                        </h1>
                        {{-- btn cerrar y colapsar --}}
                        <div class="card-tools">
                            <a class="btn btn-info btn-sm" href="{{route('venta/index')}}">Volver</a>

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
                        <form method="POST" action="{{route('venta/store')}}">
                            @csrf
                            <div class="col-md-12 mb-3">
                                <label for="validationDefault04">Cliente</label>
                                <select class="custom-select" id="validationDefault04" name="cliente_id" required>
                                    <option selected disabled value="">Selecione</option>
                                    @foreach ($cliente as $clientes)
                                    <option value="{{$clientes->cliente_id}}">
                                        {{$clientes->nombre_cliente}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- tipo comprobante --}}
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Tipo de Comprobante</label>
                                    <select class="custom-select" id="validationDefault04" name="comprobante_id"
                                        required>
                                        <option selected disabled value="">Selecione</option>
                                        @foreach ($comprobante as $comprobantes)
                                        <option value="{{$comprobantes->comprobante_id}}">
                                            {{$comprobantes->nombre_comprobante}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="">Serie de Comprobante</label>
                                    <input type="number" class="form-control" id="validationDefault01"
                                        value="{{old('serie_venta')}}" name="serie_venta" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationDefault01">Número comprobante</label>
                                    <input type="number" class="form-control" id="validationDefault01"
                                        value="{{old('numero_venta')}}" name="numero_venta" required>
                                </div>
                            </div>
                            {{-- Cantidad --}}
                            <div class="form-row">
                                <div class="card col-md-12 ">
                                    <div class="row container-fluid">
                                        <div class="col-md-3 mb-2">
                                            <label for="validationDefault04">Articulo</label>
                                            <select class="custom-select" id="validationDefault04" name="articulo_id"
                                                required>
                                                <option selected disabled value="">Selecione</option>
                                                @foreach ($articulo as $articulos)
                                                <option value="{{$articulos->articulo_id}}">
                                                    {{$articulos->nombre_articulo}} {{$articulos->codigo_articulo}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label for="validationDefault02">Cantidad </label>
                                            <input type="number" class="form-control" id="validationDefault02"
                                                value="{{old('cantidad_venta')}}" min="1" name="cantidad_venta"
                                                required>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="validationDefault03">stok</label>
                                            <input type="number" class="form-control" id="validationDefault03"
                                                value="{{old('stok')}}" name="stok" required>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="validationDefault03">Precio Venta</label>
                                            <input type="number" class="form-control" id="validationDefault03"
                                                value="{{old('precio_venta')}}" name="precio_venta" required>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="validationDefault03">Descuento</label>
                                            <input type="number" class="form-control" id="validationDefault03"
                                            value="{{old('descuento_venta')}}" name="descuento_venta" required>
                                        </div>
                                        
                                        <div class="col-md-1 mb-2">
                                            <br>
                                                <button type="button" name="add" id="add" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i> </button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <button class="btn btn-danger" type="submit">Guardar</button>
                                <button class="btn btn-warning" type="reset">limpiar</button>

                            </div>
                        </form>
                    </div>

                </div>
                <div class="row"></div>
            </div>

    </section>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
        var i = 1;

        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'">' +
                                        '<td><input type="text" name="name[]" placeholder="Ingrese el Nombre" class="form-control name_list" /></td>' +
                                        '<td><input type="text" name="name[]" placeholder="Ingrese el Nombre" class="form-control name_list" /></td>' +
                                        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                                        '</tr>');
        });
        
        $(document).on('click', '.btn_remove', function () {
            var id = $(this).attr('id');
           $('#row'+ id).remove();
        });

        $('#submit').click(function(){
            $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    })
</script>
@endsection
