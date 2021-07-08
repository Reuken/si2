@extends ('layouts.admin')
@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
		    <div class="panel panel-default">
		      <div style="text-align:center; font-size:20px" class="panel-heading">
		      	<br>
		        <b>PROVEEDORES</b>
		      </div>
		    	<div class="panel-body">
		    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    	<a href="{{ url('proveedor/create') }}" class="btn btn-success btn-sm">
		        <i class="fa fa-plus" aria-hidden="true"></i> Agregar
		      </a>
			  	<div class="table-responsive">
			  	<br>
					<table class="table table-striped table-bordered table-condensed table-hover">
					  <thead>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Nit</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Descripcion</th>
					  </thead>
					  @foreach ($proveedors as $proveedor)
						<tr>
						  <td>{{ $proveedor->nombre}}</td>
						  <td>{{ $proveedor->direccion}}</td>
						  <td>{{ $proveedor->nit}}</td>
						  <td>{{ $proveedor->telefono}}</td>
						  <td>{{ $proveedor->descripcion}}</td>
						  <td>
						    <a href="proveedor/{{ $proveedor->id }}/edit">
						    	<button class="btn btn-info btn-xs">
						    		Editar <i class="fa-pencil-square-o" aria-hidden="true"></i>
						    	</button>
						    </a>
						    <a href="" data-target="#modal-delete-{{$proveedor->id}}"data-toggle="modal">
						    	<button class="btn btn-danger btn-xs">
						    		Eliminar <i class="fa fa-trash-o" aria-hidden="true"></i>
						    	</button>
						    </a>
						  </td>
						</tr>
						@include('proveedor.modal')
					  @endforeach
					</table>	
				  </div>
				{{$proveedors->render()}}
			  </div>           
		    </div>
		  </div>
		 </div>
		</div>
	</div>
</div>
@endsection