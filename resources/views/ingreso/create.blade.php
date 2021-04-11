@extends('dashboard.layout')
@section('content')
<header>

</header>
<br>
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h1 class="card-title">
                            NUEVO INGRESO

                        </h1>
                        {{-- btn cerrar y colapsar --}}
                        <div class="card-tools">
                            <a class="btn btn-secondary btn-sm" href="{{route('ingreso')}}">Volver</a>

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
                        {{-- <form name="add_name" id="add_name"> --}}

                        <form method="POST" name="add_name" id="add_name" action="{{route('ingreso/store')}}">
                            @csrf
                            <div class="col-md-12 mb-3">
                                <label for="validationDefault04">Proveedor</label>
                                <select class="custom-select " id="validationDefault04" name="proveedor_id" required>
                                    <option selected disabled value="">Selecione</option>
                                    @foreach ($proveedor as $proveedores)
                                    <option value="{{$proveedores->proveedor_id}}">
                                        {{$proveedores->nombre_proveedor}}
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
                                        value="{{old('serie_ingreso')}}" name="serie_ingreso" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationDefault01">Número comprobante</label>
                                    <input type="number" class="form-control" id="validationDefault01"
                                        value="{{old('numero_ingreso')}}" name="numero_ingreso" required>
                                </div>
                            </div>
                            {{-- Cantidad --}}
                            {{-- <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Articulo</label>
                                    <select class="custom-select" id="validationDefault04" name="articulo_id" required>
                                        <option selected disabled value="">Selecione</option>
                                        @foreach ($articulo as $articulos)
                                        <option value="{{$articulos->articulo_id}}">
                            {{$articulos->nombre_articulo}} {{$articulos->codigo_articulo}}
                            </option>
                            @endforeach
                            </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="validationDefault02">Cantidad </label>
                        <input type="number" class="form-control" id="validationDefault02"
                            value="{{old('cantidad_ingreso')}}" min="1" name="cantidad_ingreso" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationDefault03">Precio Compra</label>
                        <input type="number" class="form-control" id="validationDefault03"
                            value="{{old('precio_compra_ingreso')}}" name="precio_compra_ingreso" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationDefault03">Precio Venta</label>
                        <input type="number" class="form-control" id="validationDefault03"
                            value="{{old('precio_venta_ingreso')}}" name="precio_venta_ingreso" required>
                    </div>
                </div>
            </div> --}}
            {{-- TABLITA DINAMICA --}}
            <div class="card">

                <div class="card-body">
                    <div id="table" class="table-editable">
                        <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                                    class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Articulo</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Precio Compra</th>
                                    <th class="text-center">Precio Venta</th>

                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pt-3-half" contenteditable="true">
                                        <select class="custom-select" id="validationDefault04" name="ingreso_articulo[]"
                                            required>
                                            <option selected disabled value="">Selecione</option>
                                            @foreach ($articulo as $articulos)
                                            <option value="{{$articulos->articulo_id}}">
                                                {{$articulos->nombre_articulo}} {{$articulos->codigo_articulo}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="pt-3-half" contenteditable="true"><input name="cantidad[]" class="form-control"
                                            type="number" name="" id=""></td>
                                    <td class="pt-3-half" contenteditable="true"><input name="precio_compra[]" class="form-control"
                                            type="number"></td>
                                    <td class="pt-3-half" contenteditable="true"><input name="precio_venta[]" class="form-control"
                                            type="number"></td>

                                    {{-- <td class="pt-3-half">
                                        <span class="table-up"><a href="#!" class="indigo-text"><i
                                                    class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                                        <span class="table-down"><a href="#!" class="indigo-text"><i
                                                    class="fas fa-long-arrow-alt-down"
                                                    aria-hidden="true"></i></a></span>
                                    </td> --}}
                                    <td>
                                        <span class="table-remove"><button type="button"
                                                class="btn btn-danger btn-rounded btn-sm my-0"><i class="far fa-trash-alt"></i></button></span>
                                    </td>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <button class="btn btn-danger" type="submit">Guardar</button>
                <button class="btn btn-warning" type="reset">limpiar</button>

            </div>
        </div>
    </section>
</div>




<!-- Editable table -->

<!-- MBD BOSTRAPCITO -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
</script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
</script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
</script>

<script>
    const $tableID = $('#table');
    const $BTN = $('#export-btn');
    const $EXPORT = $('#export');

    const newTr = `
<tr class="hide">
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half">
    <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
    <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
  </td>
  <td>
    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button></span>
  </td>
</tr>`;

    $('.table-add').on('click', 'i', () => {

        const $clone = $tableID.find('tbody tr').last().clone(true).removeClass(
            'hide table-line');

        if ($tableID.find('tbody tr').length === 0) {

            $('tbody').append(newTr);
        }

        $tableID.find('table').append($clone);
    });

    $tableID.on('click', '.table-remove', function () {

        $(this).parents('tr').detach();
    });

    $tableID.on('click', '.table-up', function () {

        const $row = $(this).parents('tr');

        if ($row.index() === 0) {
            return;
        }

        $row.prev().before($row.get(0));
    });

    $tableID.on('click', '.table-down', function () {

        const $row = $(this).parents('tr');
        $row.next().after($row.get(0));
    });

    // A few jQuery helpers for exporting only
    jQuery.fn.pop = [].pop;
    jQuery.fn.shift = [].shift;

    $BTN.on('click', () => {

        const $rows = $tableID.find('tr:not(:hidden)');
        const headers = [];
        const data = [];

        // Get the headers (add special header logic here)
        $($rows.shift()).find('th:not(:empty)').each(function () {

            headers.push($(this).text().toLowerCase());
        });

        // Turn all existing rows into a loopable array
        $rows.each(function () {
            const $td = $(this).find('td');
            const h = {};

            // Use the headers from earlier to name our hash keys
            headers.forEach((header, i) => {

                h[header] = $td.eq(i).text();
            });

            data.push(h);
        });

        // Output the result
        $EXPORT.text(JSON.stringify(data));
    });

</script>


</body>

</html>

@endsection
