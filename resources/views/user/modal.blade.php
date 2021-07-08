<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$user->id}}">
@if($user->id!=Auth::user()->id)
<form class="form-horizontal" method="POST" action=" {{ route('user.destroy', ['id' => $user->id]) }} ">
 @csrf
 @method('DELETE')
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Usuario</h4>
			</div>
			<div class="modal-body">
				<p>¿Desea elimar el usuario "{{$user->name}}" de la base de datos? </p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
</form>
@else
<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Usuario</h4>
			</div>
			<div class="modal-body">
				<p>No se puede eliminar el usuario logueado</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
@endif