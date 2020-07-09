@extends('layouts.app')

@section('content')
    <div class='container'> 
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    Create Companies
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
                    <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">    
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}"/>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email :</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"/>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="logo">Logo :</label>
                            <input type="file" class="form-control" name="logo" placeholder="Logo"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="website">Website :</label>
                            <input type="text" class="form-control" name="website" placeholder="Website" value="{{ old('website') }}"/>
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <a href="{{ route('companies.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
@endsection