@extends('layout.master')
@section('title', 'Manage Company')
@section('main-content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Manage Company</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ url('/addCompany') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                        <span style="color:red">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="abc@gmail.com" value="{{ old('email') }}">
                        <span style="color:red">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" id="website" class="form-control" placeholder="www.abc.com">
                        <span style="color:red">@error('website') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Upload Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</main>
@endsection