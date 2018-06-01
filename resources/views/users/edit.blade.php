@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card ">
                    <div class="card-header">
                        <strong>Editar Usuario: {{ $user->id }}</strong>
                    </div>
                    <div class="card-body">

                        {!! Form::model($user, ['route' => ['users.update', $user->id],
                        'method' => 'PUT']) !!}

                        @include('users.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
