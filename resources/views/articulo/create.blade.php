@extends('dashboard.layout')
@section('content')
<br>
@if( !$errors->isEmpty() )
<div class="alert alert-danger alert-sm">
    @foreach ( $errors->all() as $error )
    <strong>{{$error}}</strong><br>
    @endforeach
</div>
@endif
<div class="container-fluid">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h1 class="card-title">
                            INSERTAR ARTICULO

                        </h1>
                        {{-- btn cerrar y colapsar --}}
                        <div class="card-tools">
                            <a class="btn btn-danger btn-sm" href="{{route('articulo')}}">Volver</a>

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

                        <form method="POST" action="{{route('articulo/store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Nombre Articulo</label>
                                    <input type="text" class="form-control" id="validationDefault01"
                                        value="{{old('nombre_articulo')}}" name="nombre_articulo" required >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Codigo Articulo</label>
                                    <input type="text" class="form-control" id="validationDefault02"
                                        value="{{old('codigo_articulo')}}" name="codigo_articulo" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Stock</label>
                                    <input type="number" class="form-control" id="validationDefault03"
                                        value="{{old('stok')}}" name="stok" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationDefault04">Categoria</label>
                                    <select class="custom-select" id="validationDefault04" name="categoria_id" required>
                                        <option selected disabled value="">Selecione</option>
                                        @foreach ($categoria as $categorias)
                                        <option value="{{$categorias->categoria_id}}">{{$categorias->nombre_categoria}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                  <label for="validationDefault05">Adjuntar Imagen</label>
                                  <input type="file" name="imagen" class="form-control" id="validationDefault05"
                                      accept="image/*" onchange="showMyImage(this)">
                              </div>
                              <img  id="thumbnil" style=" width:20%; margin-top:10px;" src="" alt="" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-danger" type="submit">Guardar</button>
                                <button  class="btn btn-warning" type="reset">limpiar</button>
                            </div>
                          </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
  function showMyImage(fileInput) {
      var files = fileInput.files;
      for (var i = 0; i < files.length; i++) {
          var file = files[i];
          var imageType = /image.*/;
          if (!file.type.match(imageType)) {
              continue;
          }
          var img = document.getElementById("thumbnil");
          img.file = file;
          var reader = new FileReader();
          reader.onload = (function (aImg) {
              return function (e) {
                  aImg.src = e.target.result;
              };
          })(img);
          reader.readAsDataURL(file);
      }
  }

</script>





@endsection
