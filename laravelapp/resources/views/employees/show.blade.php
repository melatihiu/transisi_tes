@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Show Employees
                </div>
                <div class="card-body">
                    <div class="form-group col-md-6">    
                        <label for="nama">Nama :</label>
                        <label>{{$employees->nama}}</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_companies">Companies :</label>
                        <label>{{$employees->companies->nama}}</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email :</label>
                        <label>{{$employees->email}}</label>
                    </div>
                    <br>
                    <div class="form-group col-md-6">
                        <a href="{{ route('employees.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
@endsection