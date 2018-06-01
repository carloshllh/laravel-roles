<div class="form-group">
	{{ Form::label('name', 'Nombre de la etiqueta') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción') }}
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<hr>
<h3>Permiso especial</h3>
<div class="form-group">
	<label>{{ Form::radio('special', 'all-access') }} Acceso total</label>
	<label>{{ Form::radio('special', 'no-access') }} Ningún acceso</label>
</div>
<hr>
<h3>Lista de permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($categories as $category)
		<strong> {{ $category->name }} </strong>
		@foreach($permissions as $permission)
		@if($permission->category_id == $category->id )
		<li>
			<label>
				{{ Form::checkbox('permissions[]', $permission->id, null) }}
				{{ $permission->name }}
				<em>({{ $permission->description }})</em>
			</label>
		</li>
		@endif
		@endforeach
		<hr>
		@endforeach
	</ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
	<a class="btn btn-sm btn-secondary" href="{{ route('roles.index') }}">Cancelar</a>
</div>
