@extends("theme.$theme.layout")

@section('title')
Roles
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/create.js")}}"></script>
@endsection


@section('contentHeader')
@include('includes.message')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Sistema de roles</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Admin</a></li>
        <li class="breadcrumb-item active">Rol</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title">Listado de roles</h3>
          <div class="card-tools">
            <a href="{{route('create_rol')}}" class="btn btn-block btn-success btn-sm">
              <i class="fas fa-plus-circle"></i> Nuevo registro
            </a>
          </div>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed table-hover table-striped text-nowrap">
            <thead>
              <tr>
                <th>Nombre </th>
                <th class="width70"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>{{$data->name}}</td>
                <td>
                  <a href="{{url("admin/rol/$data->id/editar")}}" class="btn-action-table tooltipsC"
                    title="Editar este registro">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{route('edit_rol', ['id' => $data->id])}}" class="d-inline form-delete">
                    @csrf @method('delete')
                    <button type="submit" class="btn-action-table delete tooltipsC" title="Eliminar registro">
                      <i class="fas fa-trash text-danger"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection