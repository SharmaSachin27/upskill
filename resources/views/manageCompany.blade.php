@extends('layout.master')
@section('title', 'Manage Company')
@section('main-content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Manage Company</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(isset($company))
                    <form action="{{ route('companies.update',$company->id) }}" method="put" enctype="multipart/form-data">
                        @method("put")
                @else
                    <form action="{{ url('companies') }}" method="post" enctype="multipart/form-data">
                @endif 
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ $company->name ?? '' }}">
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="abc@gmail.com" value="{{ $company->email ?? '' }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" id="website" class="form-control" placeholder="www.abc.com" value="{{ $company->name ?? '' }}">
                        <span class="text-danger">@error('website') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-1">Upload Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control col-md-3">
                            @if (isset($company))
                                <img src="{{ asset('public/company_logos/' . $company->logo) }}" id="preview" alt="img" height="100px" width="40px" class="col-sm-1 border border-dark ml-4">
                            @else
                                <img src="{{ asset('public/nopreview.png') }}" alt="img" id="preview" height="100px" width="40px" class="col-sm-1 border border-dark ml-4">
                            @endif
                        </div>
                        <span class="text-danger">@error('logo') {{ $message }} @enderror</span>
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</main>
@endsection