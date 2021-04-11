@extends('dashboard.layout')
@section('content')
    <div id="imp1">

<link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
<br>
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> DBOOK S.A.
                <small class="float-right">Fecha Impresión:</b> {{date('Y-m-d')}}</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">

            <address>
                @foreach ($configuracion as $configuracion)
                <strong>{{$configuracion->empresa}}</strong><br>
                Direccion {{$configuracion->direccion}}<br>
                {{$configuracion->pais}}, {{$configuracion->ciudad}}<br>
                Tel-empresa: {{$configuracion->telefono}}<br>
                Email: {{$configuracion->email}}
                @endforeach
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">

            <address>
               
                <strong>Reporte De Ingreso</strong><br>
                Proveedor: {{$ingreso->proveedor['nombre_proveedor']}}<br>
                {{$ingreso->proveedor->tipo_documento['nombre_tipo_documento']}} :
                {{$ingreso->proveedor['numero_documento_proveedor']}}<br>
                Tel: {{$ingreso->proveedor['telefono_proveedor']}}<br>
                Email: {{$ingreso->proveedor['email_proveedor']}}
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>{{$ingreso->comprobante['nombre_comprobante']}}- {{$ingreso->ingreso_id}}</b><br>
            <br>
            {{-- <b>Fecha Creación: {{$ingreso->fecha_create}}<br> --}}
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>articulo</th>
                        <th>cantidad</th>
                        <th>precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingresoArticulo as $articulos)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$articulos->articulo['nombre_articulo']}}</td>
                        <td>{{$articulos->cantidad}}</td>
                        <td>{{$articulos->precio_compra}}</td>
                        <td>${{$articulos->total}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
            <p class="lead"> Metodos de pago</p>
            <img src="{{asset('dashboard/dist/img/credit/visa.png')}}" alt="Visa">
            <img src="{{asset('dashboard/dist/img/credit/mastercard.png')}}" alt="Mastercard">
            <img src="{{asset('dashboard/dist/img/credit/paypal2.png')}}" alt="Paypal">
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos amet sit dolore tempore. Rem aspernatur a
                ducimus, illo officia dolores amet accusantium cum suscipit ea, ab nisi fugiat saepe alias!
            </p>
        </div>
        <!-- /.col -->
        <div class="col-6">
            <p class="lead">Fecha: {{date('Y-m-d')}}</p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Cantidad de productos:</th>
                        <td>{{$producto_total}}</td>
                    </tr>
                    
                   
                    <tr>
                        <th>Total Final:</th>
                        <td>${{$ingreso_articulo}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <button class="btn btn-secondary"type="button"
    onclick="javascript:imprim1(imp1);">Imprimir</button>
<script>
    function imprim1(imp1) {
        var printContents = document.getElementById('imp1').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
        w.print();
        w.close();
        return true;
    }
</script>
@endsection
  
