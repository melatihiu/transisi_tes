@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Companies
                    <a class="pull-right btn btn-primary btn-sm" href="{!! route('companies.create') !!}"><i class="fa fa-plus"></i> Create</a>
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
                                <td class='text-center'>Logo</td>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>Website</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td class='text-center'>{{ ++$i }}</td>
                                    <td class='text-center'><img src="{{asset(Storage::url($company->logo))}}" style="width: 30px; height:30px;"></td>
                                    <td>{{$company->nama}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->website}}</td>
                                    <td class='text-center'>
                                        <div class='btn-group'>
                                            <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                            
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

                    {!! $companies->links() !!}
                </div>
            </div>
@endsection