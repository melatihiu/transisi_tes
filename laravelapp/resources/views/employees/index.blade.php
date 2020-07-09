@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Employees
                    <a class="pull-right btn btn-primary btn-sm" href="{!! route('employees.create') !!}"><i class="fa fa-plus"></i> Create</a>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class='text-center'>No</td>
                                <td>Nama</td>
                                <td>Company</td>
                                <td>Email</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td class='text-center'>{{ ++$i }}</td>
                                    <td>{{$employee->nama}}</td>
                                    <td>{{$employee->companies->nama}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td class='text-center'>
                                        <div class='btn-group'>
                                            <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                            
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure to delete this data ?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $employees->links() !!}
                </div>
            </div>
@endsection