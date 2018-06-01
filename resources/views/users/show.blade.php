@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Usuario</div>

                    <div class="card-body">
                        <p><strong>Nombre: </strong>     {{ $user->name }}</p>
                        <p><strong>Email: </strong>       {{ $user->email }}</p>
                        <p><strong>Rol: </strong>
                            @if($user->roles->isEmpty())
                                no asignado
                            @else
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            @endif
                        </p>
                        <p>
                          <a class="btn btn-secondary" href="{{ route('users.index') }}" role="button">Regresar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>


@endsection
