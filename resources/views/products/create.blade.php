@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card ">
                    <div class="card-header">
                        <strong>Nuevo Producto</strong>
                    </div>
                    <div class="card-body">
                      {{ Form::open(['route' => 'products.store']) }}

                          @include('products.partials.form')

                      {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
