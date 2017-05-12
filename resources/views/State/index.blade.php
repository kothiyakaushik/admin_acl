@extends('layouts.app')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>state Management</h2>

            </div>

            <div class="pull-right">

                @permission('state-create')

                <a class="btn btn-success" href="{{ route('state.create') }}"> Create New State</a>

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
            <th>country</th>
            <th width="280px">Action</th>

        </tr>

    @foreach ($state as $key => $states)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $states->name }}</td>

        <td>{{ $states->stateCountry->name }}</td>

        <td>

            <a class="btn btn-info" href="{{ route('state.show',$states->id) }}">Show</a>

            @permission('state-edit')

            <a class="btn btn-primary" href="{{ route('state.edit',$states->id) }}">Edit</a>

            @endpermission

            @permission('state-delete')

            {!! Form::open(['method' => 'DELETE','route' => ['state.destroy', $states->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

            @endpermission

        </td>       

    </tr>

    @endforeach


    </table>

{!! $state->render() !!}

@endsection