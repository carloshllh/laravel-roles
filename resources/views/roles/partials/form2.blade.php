<div class="form-group">
	<label for="name">Nombre</label>
	<input class="form-control" type="text" name="name" id="name" placeholder="Nombre del rol" value="{{ old('name') }}">
	@if ($errors->has('name'))
	<div class="text-danger">
		<i class="icon fa fa-exclamation-circle"></i> {{ $errors->first('name') }}
	</div>
	@endif
</div>

<div class="form-group ">
	<label for="name">URL amigable</label>
	<input class="form-control" type="text" name="slug" id="slug" placeholder="Nombre del rol" value="{{ old('slug') }}">
	@if ($errors->has('slug'))
	<div class="text-danger">
		<i class="icon fa fa-exclamation-circle"></i> {{ $errors->first('slug') }}
	</div>
	@endif
</div>
<div class="form-group">
	<label for="details">Descripción</label>
	<textarea class="form-control" id="description" name="description" rows="4" placeholder="Descripción">{{ old('description') }}</textarea>
	@if ($errors->has('description'))
	<div class="text-danger">
		<i class="icon fa fa-exclamation-circle"></i> {{ $errors->first('description') }}
	</div>
	@endif
</div>

<hr>
<h3>Permiso especial</h3>
<div class="form-group">
	<label><input name="special" id="special" type="radio" value="all-access"> Acceso total</label>
	<label><input name="special" id="special" type="radio" value="no-access"> Ningún acceso</label>
</div>

<hr>
<h3>Lista de permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permission)
		<li>

			<div class="checkbox">
				<label>
					<input name="permissions[]" id="permissions[]" type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}
					<em>({{ $permission->description }})</em>
				</label>
			</div>	        	        
		</li>
		@endforeach
	</ul>
</div>

<div class="form-group">
	<button type="submit" class="btn btn-sm btn-primary">Submit</button>
</div>

