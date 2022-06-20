@extends('layout.master')
@section('title', 'Manage Company')
@section('main-content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Manage Employee</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if(isset($employee))
                    <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                @else
                    <form action="{{ url('employees') }}" method="post" enctype="multipart/form-data">
                @endif 
                    @csrf
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name" value="{{ $employee->firstname ?? '' }}">
                        <span class="text-danger">@error('firstname') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last Name" value="{{ $employee->lastname ?? '' }}">
                        <span class="text-danger">@error('lastname') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="www.abc.com" value="{{ $employee->email ?? '' }}">
                        <span class="text-danger">@error('website') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <select class="browser-default custom-select" name="company" id="company">
                            <option selected>Select company</option>
                            @foreach ($company as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('company') {{ $message }} @enderror</span>
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
            </div>
        </div>
    </div>
</main>
@endsection