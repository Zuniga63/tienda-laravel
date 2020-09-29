@extends("theme.$theme.layout")

@section('title')
Roles
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/create.js")}}"></script>
@endsection

@section('contentHeader')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Sistema de roles</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Admin</a></li>
        <li class="breadcrumb-item"><a href="{{route('rol')}}">Menu</a></li>
        <li class="breadcrumb-item active">Editar</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
@include('includes.form_error')
@include('includes.message')
<!-- Horizontal Form -->
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Editar rol</h3>
    <div class="card-tools">
      <a href="{{route('rol')}}" class="btn btn-block btn-primary btn-sm">
        <i class="fas fa-reply-all"></i> Volver a listado
      </a>
    </div>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" id="form-general" action="{{route('update_rol', ['id' => $data->id])}}" method="POST">
    @csrf @method('put')
    <div class="card-body">
      <div class="form-group row">
        <label for="name" class="col-lg-2 col-form-label required">Nombre</label>
        <div class="col-lg-9">
          <input type="text" class="form-control" id="name" name="name" placeholder="Escribe el nombre aquí"
            value="{{old('name', $data->name ?? '')}}" required>
            {{-- si el dato existe y es nulo pone por defecto '' --}}
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-success">Editar</button>
      <button type="reset" class="btn btn-default float-right">Cancelar</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->
@endsection