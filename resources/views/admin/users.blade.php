@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="content-wrapper">
                <div class="row">
                    <div class=" mx-auto col-md-8 grid-margin stretch-card">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-center mb-5">{{$data?"Update":"Create"}} Users</h1>
                                <form method="POST" action="{{ $data ? route('admin.user.update'): route('admin.user.create')}}"
                                    class="forms-sample">
                                    @csrf
                                    <input type="text" name="users_id" value="{{$data?$data->id:"" }}" hidden>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name"> Name </label>
                                            <input value="{{$data? $data->name:''}}" type="text" class="form-control"
                                                name="name" id="name" placeholder="Name Here">
                                            @error('name')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">User Email</label>
                                            <input value="{{$data? $data->email:''}}" type="text" class="form-control"
                                                name="email" id="email" placeholder="Email">
                                            @error('email')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="phone">Phone Number</label>
                                            <input value="{{$data? $data->phone:''}}" type="number" class="form-control"
                                                name="phone" id="phone" placeholder="Phone Number ">
                                            @error('phone')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="address">Address</label>
                                            <input value="{{$data? $data->address:''}}" type="text" class="form-control"
                                                name="address" id="address" placeholder="Address">
                                            @error('address')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-6">
                                            <label for="role">Role</label>
                                            <select class="form-control form-select " id="role" name="role">
                                                <option {{($data && $data->role="admin")?"selected":''}}
                                                    value="admin">Admin</option>
                                                <option {{($data && $data->role="accountant")?"selected":''}}
                                                    value="accountant">Accountant</option>

                                                <option {{($data && $data->role="teacher")?"selected":''}}
                                                            value="teacher">Teacher</option>
                                            </select>
                                            @error('role')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">Password</label>
                                            <input value="{{$data? $data->password:''}}" type="text" class="form-control"
                                                name="password" id="password" placeholder="password">
                                            @error('password')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-dark mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
