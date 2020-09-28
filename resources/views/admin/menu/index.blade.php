@extends("theme.$theme.layout")

@section('title')
Menus
@endsection

@section('contentHeader')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Administacion de menús</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Admin</a></li>
        <li class="breadcrumb-item active">Menu</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

@endsection