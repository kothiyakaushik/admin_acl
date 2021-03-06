@extends('layouts.app')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Country</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('state.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $state->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Country Name:</strong>

                {{ $state->stateCountry->name }}

            </div>

        </div>
        

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Permissions:</strong>

                @if(!empty($rolePermissions))

                    @foreach($rolePermissions as $v)

                        <label class="label label-success">{{ $v->display_name }}</label>

                    @endforeach

                @endif

            </div>

        </div>

    </div>

@endsection