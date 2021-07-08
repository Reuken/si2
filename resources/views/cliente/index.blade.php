@extends ('layouts.admin')
@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
		    <div class="panel panel-default">
		      <div style="text-align:center; font-size:20px" class="panel-heading">
		      	<br>
		        <b>CLIENTES</b>
		      </div>
		    	<div class="panel-body">
		    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    	<a href="{{ url('cliente/create') }}" class="btn btn-success btn-sm">
		        <i class="fa fa-plus" aria-hidden="true"></i> Agregar
		      </a>
			  	<div class="table-responsive">
			  	<br>
					<table class="table table-striped table-bordered table-condensed table-hover">
					  <thead>
						<th>Ci</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Nit</th>
						<th>Telefono</th>
						<th>Correo</th>
					  </thead>
					  @foreach ($clientes as $cliente)
						<tr>
						  <td>{{ $cliente->ci}}</td>
						  <td>{{ $cliente->nombre}}</td>
						  <td>{{ $cliente->direccion}}</td>
						  <td>{{ $cliente->nit}}</td>
						  <td>{{ $cliente->telefono}}</td>
						  <td>
						    <a href="cliente/{{ $cliente->id }}/edit">
						    	<button class="btn btn-info btn-xs">
						    		Editar <i class="fa-pencil-square-o" aria-hidden="true"></i>
						    	</button>
						    </a>
						    <a href="" data-target="#modal-delete-{{$cliente->id}}"data-toggle="modal">
						    	<button class="btn btn-danger btn-xs">
						    		Eliminar <i class="fa fa-trash-o" aria-hidden="true"></i>
						    	</button>
						    </a>
						  </td>
						</tr>
						@include('cliente.modal')
					  @endforeach
					</table>	
				  </div>
				{{$clientes->render()}}
			  </div>           
		    </div>
		  </div>
		 </div>
		</div>
	</div>
</div>
@endsection