@include('includes.form_error')
@include('includes.message')
<!-- Horizontal Form -->
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Crear Menú</h3>
    <div class="card-tools">
      <a href="{{route('rol')}}" class="btn btn-block btn-primary btn-sm">
        <i class="fas fa-reply-all"></i> Volver a listado
      </a>
    </div>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" id="form-general" action="{{route('store_rol')}}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="name" class="col-lg-2 col-form-label required">Nombre</label>
        <div class="col-lg-9">
          <input type="text" class="form-control" id="name" name="name" placeholder="Escribe el nombre aquí"
            value="{{old('name')}}" required>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-success">Crear</button>
      <button type="reset" class="btn btn-default float-right">Cancelar</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->