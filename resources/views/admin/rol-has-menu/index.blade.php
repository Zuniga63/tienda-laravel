@extends("theme.$theme.layout")

@section('title')
Roles y menus
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/menu-rol/index.js")}}"></script>
@endsection

@section('contentHeader')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Sistema de roles y menús</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Admin</a></li>
        <li class="breadcrumb-item active">Roles y menus</li>
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
          <h3 class="card-title">Asignacion de menús</h3>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
          @csrf
          <table class="table table-head-fixed table-hover table-striped text-nowrap">
            <thead>
              <tr>
                <th>Menús</th>
                @foreach ($roles as $id => $name)
                <th class="text-center">{{$name}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $key => $menu)
              {{-- PRIMER NIVEL DE MENUS --}}
              <tr>
                <td class="font-weight-bold pl-10">
                  <i class="fas fa-arrows-alt"></i>
                  {{$menu['name']}}
                </td>
                @foreach ($roles as $id => $name)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol" class="menu_rol" data-menuid={{$menu['id']}} value="{{$id}}"
                    {{in_array($id, array_column($menuHasRol[$menu["id"]], "id")) ? "checked" : ''}}>
                </td>
                @endforeach
              </tr>
              {{-- SEGUNDO NIVEL DE MENÚS --}}
              @foreach ($menu['submenus'] as $key => $hijo)
              <tr>
                <td class="pl-20">
                  <i class="fas fa-arrow-right"></i>
                  {{$hijo['name']}}
                </td>
                @foreach ($roles as $id => $name)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol" class="menu_rol" data-menuid={{$hijo['id']}} value="{{$id}}"
                    {{in_array($id, array_column($menuHasRol[$hijo["id"]], "id")) ? "checked" : ''}}>
                </td>
                @endforeach
              </tr>
              {{-- TERCER NIVEL DE MENÚS --}}
              @foreach ($hijo['submenus'] as $key => $hijo2)
              <tr>
                <td class="pl-30">
                  <i class="fas fa-arrow-right"></i>
                  {{$hijo2['name']}}
                </td>
                @foreach ($roles as $id => $name)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol" class="menu_rol" data-menuid={{$hijo2['id']}} value="{{$id}}"
                    {{in_array($id, array_column($menuHasRol[$hijo2["id"]], "id")) ? "checked" : ''}}>
                </td>
                @endforeach
              </tr>

              {{-- CUARRTO NIVEL DE MENÚS --}}
              @foreach ($hijo2['submenus'] as $key => $hijo3)
              <tr>
                <td class="pl-40">
                  <i class="fas fa-arrow-right"></i>
                  {{$hijo3['name']}}
                </td>
                @foreach ($roles as $id => $name)
                <td class="text-center">
                  <input type="checkbox" name="menu_rol" class="menu_rol" data-menuid={{$hijo3['id']}} value="{{$id}}"
                    {{in_array($id, array_column($menuHasRol[$hijo3["id"]], "id")) ? "checked" : ''}}>
                </td>
                @endforeach
              </tr>
              @endforeach {{-- Fin del cuarto nivel --}}

              @endforeach {{-- Fin del tercer nivel --}}

              @endforeach {{-- Fin del segundo nivel --}}


              @endforeach {{-- Fin del primer nivel --}}
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