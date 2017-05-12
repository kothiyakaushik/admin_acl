@extends('layouts.app')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Pincode Management</h2>

            </div>

            <div class="pull-right">

                @permission('pincode-create')

                <a class="btn btn-success" href="{{ route('pincode.create') }}"> Create New Pincode</a>

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

    @foreach ($pincode as $key => $pincodes)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $pincodes->name }}</td>

        <td></td>

        <td>

            <a class="btn btn-info" href="{{ route('pincode.show',$pincodes->id) }}">Show</a>

            @permission('pincode-edit')

            <a class="btn btn-primary" href="{{ route('pincode.edit',$pincodes->id) }}">Edit</a>

            @endpermission

            @permission('pincode-delete')

            {!! Form::open(['method' => 'DELETE','route' => ['pincode.destroy', $pincodes->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

            @endpermission

        </td>       

    </tr>

    @endforeach


    </table>

{!! $pincode->render() !!}

@endsection