@extends('layouts.app')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Country Management</h2>

            </div>

            <div class="pull-right">

                @permission('country-create')

                <a class="btn btn-success" href="{{ route('country.create') }}"> Create New Country</a>

                @endpermission

            </div>

        </div>

    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th width="280px">Action</th>

        </tr>

    @foreach ($country as $key => $countries)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $countries->name }}</td>

        <td>

            <a class="btn btn-info" href="{{ route('country.show',$countries->id) }}">Show</a>

            @permission('country-edit')

            <a class="btn btn-primary" href="{{ route('country.edit',$countries->id) }}">Edit</a>

            @endpermission

            @permission('country-delete')

            {!! Form::open(['method' => 'DELETE','route' => ['country.destroy', $countries->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

            @endpermission

        </td>       

    </tr>

    @endforeach


    </table>

{!! $country->render() !!}

@endsection