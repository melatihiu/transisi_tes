@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Show Companies
                </div>
                <div class="card-body">
                    <div class="form-group col-md-6">    
                        <label for="nama">Nama :</label>
                        <label>{{$companies->nama}}</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email :</label>
                        <label>{{$companies->email}}</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="logo">Logo :</label>
                        <img src="{{asset($url)}}" style="width: 100px; height:100px; margin-right: 10px; margin-left: 10px;">
                        <label>{{$companies->logo}}</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="website">Website :</label>
                        <label>{{$companies->website}}</label>
                    </div>
                    <br>
                    <div class="form-group col-md-6">
                        <a href="{{ route('companies.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
@endsection