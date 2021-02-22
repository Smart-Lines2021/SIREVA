@if(session('mensaje'))
<div class="alert alert-info" role="alert">
	{{session('mensaje')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif 