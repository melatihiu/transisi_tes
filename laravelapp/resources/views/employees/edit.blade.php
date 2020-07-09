@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Create Employees
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                    @endif
                    <form action="{{ route('employees.update', $employees->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-md-6">    
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $employees->nama }}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_companies">Companies :</label>
                            <select class="form-control" name="id_companies">
                                <option value="">Pilih Companies</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" {{ $company->id == $employees->id_companies ? 'selected' : '' }}> 
                                            {{ $company->nama }} 
                                        </option>
                                    @endforeach    
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email :</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $employees->email }}"/>
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <a href="{{ route('employees.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
@endsection