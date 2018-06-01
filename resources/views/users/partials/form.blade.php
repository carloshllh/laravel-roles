<div class="form-group">
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('email', 'Correo electrónico') }}
	{{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>
<div class="form-group">
	{{ Form::label('password', 'Contraseña') }}
	{{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
</div>
{{--
<div class="form-group">
    {!! Form::Label('role_id', 'Rol:') !!}
    {!! Form::select('role_id', $roles, null,['class' => 'form-control','placeholder' => 'Seleccionar...']) !!}
</div>
--}}

<div class="form-group">
    {!! Form::Label('roles', 'Rol:') !!}
    {!! Form::select('roles', $roles, null,['class' => 'form-control','placeholder' => 'Seleccionar...']) !!}
</div>
{{--
<h3>Roles</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach ($roles as $role)
			<li>
				<label>
					{{ Form::checkbox('roles[]', $role->id, null) }}
					{{ $role->name }}
					<em>({{ $role->description }})</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>
--}}
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
	<a class="btn btn-sm btn-secondary" href="{{ route('users.index') }}">Cancelar</a>
</div>
