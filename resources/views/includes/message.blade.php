@if (session('message'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-ban"></i> Mensaje del sistema</h5>
  {{session("message")}}
</div>
@endif