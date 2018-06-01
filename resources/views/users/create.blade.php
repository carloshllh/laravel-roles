@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card ">
                <div class="card-header">
                    <strong>Nuevo Usuario</strong>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'users.store']) }}

                        @include('users.partials.form')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
