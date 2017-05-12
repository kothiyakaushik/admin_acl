@extends('layouts.app')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>city Management</h2>

            </div>

            <div class="pull-right">

                @permission('city-create')

                <a class="btn btn-success" href="{{ route('city.create') }}"> Create New City</a>

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
            <th>State</th>
            <th width="280px">Action</th>

        </tr>

    @foreach ($city as $key => $cities)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $cities->name }}</td>

        <td>{{$cities->cityState->name}}</td>

        <td>

            <a class="btn btn-info" href="{{ route('city.show',$cities->id) }}">Show</a>

            @permission('city-edit')

            <a class="btn btn-primary" href="{{ route('city.edit',$cities->id) }}">Edit</a>

            @endpermission

            @permission('city-delete')

            {!! Form::open(['method' => 'DELETE','route' => ['city.destroy', $cities->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

            @endpermission

        </td>       

    </tr>

    @endforeach


    </table>

{!! $city->render() !!}

@endsection