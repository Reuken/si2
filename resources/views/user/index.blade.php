@extends ('layouts.admin')
@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
		    <div class="panel panel-default">
		      <div style="text-align:center; font-size:20px" class="panel-heading">
		      	<br>
		        <b>USUARIOS</b>
		      </div>
		    	<div class="panel-body">
		    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    	<a href="{{ url('user/create') }}" class="btn btn-success btn-sm">
		        <i class="fa fa-plus" aria-hidden="true"></i> Agregar
		      </a>
			  	<div class="table-responsive">
			  	<br>
					<table class="table table-striped table-bordered table-condensed table-hover">
					  <thead>
						<th>Ci</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Opciones</th>
					  </thead>
					  <?php $i = 0; ?>
					  @foreach ($personas as $persona)
						<tr>
						  <td>{{ $persona->id}}</td>
						  <td>{{ $users[$i]->name}}</td>
						  <td>{{ $persona->direccion}}</td>
						  <td>{{ $persona->telefono}}</td>
						  <td>{{ $users[$i]->email}}</td>
						  <td>
						    <a href="user/{{ $persona->id }}/edit">
						    	<button class="btn btn-info btn-xs">
						    		Editar <i class="fa-pencil-square-o" aria-hidden="true"></i>
						    	</button>
						    </a>
						  </td>
						</tr>
						<?php $i++; ?>
					  @endforeach
					</table>	
				  </div>
				{{$users->render()}}
				{{$personas->render()}}
			  </div>           
		    </div>
		  </div>
		 </div>
		</div>
	</div>
</div>
@endsection