@extends("theme.$theme.layout")

@section('title')
Crear Rol
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
        <li class="breadcrumb-item active">Crear</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
  @include('admin.rol.form')
@endsection