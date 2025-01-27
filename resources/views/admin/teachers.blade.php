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
                                <h1 class="text-center mb-5">{{$data?"update":"Register"}} Teacher</h1>
                                <form method="POST"
                                action="{{ $data ?  route('admin.teacher.update') : route('admin.teacher.create') }}"
                                class="forms-sample">
                                    @csrf
                                    <input type="text" name="teachers_id" value="{{$data?$data->id:"" }}" hidden>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Teacher Name </label>
                                            <input value="{{$data? $data->name:''}}" type="text"
                                                class="form-control" name="name" id="exampleInputUsername1"
                                                placeholder="Name Here">
                                            @error('name')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Email</label>
                                            <input value="{{$data? $data->email:''}}" type="email" class="form-control"
                                                name="email" id="exampleInputUsername1" placeholder="Email">
                                            @error('email')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Phone</label>
                                            <input value="{{$data? $data->phone:''}}" type="number" class="form-control"
                                                name="phone" id="exampleInputUsername1" placeholder="Phone Number ">
                                            @error('phone')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Qualification</label>
                                            <input value="{{$data? $data->qualification:''}}" type="text"
                                                class="form-control" name="qualification" id="exampleInputUsername1"
                                                placeholder="Qualification">
                                            @error('qualification')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Address</label>
                                            <input value="{{$data? $data->address:''}}" type="text" class="form-control"
                                                name="address" id="exampleInputUsername1" placeholder="Address">
                                            @error('address')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select class="form-control form-select " id="status"
                                                name="status">
                                                <option {{($data && $data->status=="yes")?"selected":''}}
                                                    value="yes">Yes</option>
                                                <option {{($data && $data->status=="no")?"selected":''}}
                                                    value="no">No</option>
                                            </select>
                                            @error('status')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Teacher Salery</label>
                                            <input value="{{$data? $data->salery:'1000'}}" type="number"
                                                class="form-control" name="salery" id="salery"
                                                placeholder="fee">
                                            @error('salery')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div class="form-group col-6">
                                            <label for="comeIn">Joining Date</label>
                                            <input value="{{$data? $data->comeIn:''}}" type="date"
                                                class="form-control" name="comeIn" id="comeIn"
                                                placeholder="Joining Date">
                                            @error('comeIn')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div> --}}
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
