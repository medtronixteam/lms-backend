@extends('layouts.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="content-wrapper">
                    <div class="row">
                        <div class=" mx-auto col-md-10 grid-margin stretch-card ">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h1 class="text-center mb-5">{{ $data ? 'Update' : 'Register' }} Student</h1>
                                    <form method="POST"
                                        action="{{ $data ? route('admin.student.update') : route('admin.student.create') }}"
                                        class="forms-sample">
                                        @csrf
                                        <input type="text" name="students_id" value="{{ $data ? $data->id : '' }}" hidden>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Student Name </label>
                                                <input value="{{ $data ? $data->name : '' }}" type="text"
                                                    class="form-control" name="name" id="exampleInputUsername1"
                                                    placeholder="Name Here">
                                                @error('name')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Father Name </label>
                                                <input value="{{ $data ? $data->father_name : '' }}" type="text"
                                                    class="form-control" name="father_name" id="exampleInputUsername1"
                                                    placeholder="Father Name Here">
                                                @error('father_name')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">CNIC/B-Form #</label>
                                                <input value="{{ $data ? $data->cnic : '' }}" type="text"
                                                    class="form-control"  name="cnic" id="exampleInputUsername1"
                                                    placeholder="Enter without - ">
                                                @error('cnic')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">DOB</label>
                                                <input value="{{ $data ? $data->dob : '2000-01-01' }}" type="date"
                                                    class="form-control" name="dob" id="exampleInputUsername1"
                                                    placeholder="Date of birth">
                                                @error('dob')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Religion</label>
                                                <input value="{{ $data ? $data->religion : '' }}" type="text"
                                                    class="form-control" name="religion" id="exampleInputUsername1"
                                                    placeholder="Religion">
                                                @error('religion')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Nationality</label>
                                                <input value="{{ $data ? $data->nationality : '' }}" type="text"
                                                    class="form-control" name="nationality" id="exampleInputUsername1"
                                                    placeholder="nationality">
                                                @error('nationality')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Domicile</label>
                                                <input value="{{ $data ? $data->domicile : '' }}" type="text"
                                                    class="form-control" name="domicile" id="exampleInputUsername1"
                                                    placeholder="domicile no. #">
                                                @error('domicile')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Blood Group</label>
                                                <input value="{{ $data ? $data->blood_group : '' }}" type="text"
                                                    class="form-control" name="blood_group" id="exampleInputUsername1"
                                                    placeholder="blood group">
                                                @error('blood_group')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Gender</label>
                                                <select class="form-control" name="gender"
                                                id="exampleInputUsername1">
                                               <option {{($data && $data->section="male")?"selected":''}} value="male">Male</option>
                                               <option {{($data && $data->section="female")?"selected":''}} value="female">Female</option>
                                               <option {{($data && $data->section="others")?"selected":''}} value="others">Others</option>
                                            </select>
                                                @error('gender')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                                <h5>Account Details</h5> <br>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Email</label>
                                                <input value="{{ $data ? $data->email : '' }}" type="email"
                                                    class="form-control" name="email" id="exampleInputUsername1"
                                                    placeholder="Email">
                                                @error('email')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Password</label>
                                                <input value="{{ $data ? $data->password : '' }}" type="number"
                                                    class="form-control" name="password" id="exampleInputUsername1"
                                                    placeholder="password">
                                                @error('password')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <h5>Guardian Details</h5> <br>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Guardian Name</label>
                                                <input value="{{ $data ? $data->guardian_name : '' }}" type="text"
                                                    class="form-control" name="guardian_name" id="exampleInputUsername1"
                                                    placeholder="Guardian Name Here">
                                                @error('guardian_name')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Guardian Number</label>
                                                <input value="{{ $data ? $data->guardian_number : '' }}" type="text"
                                                    class="form-control" name="guardian_number" id="exampleInputUsername1"
                                                    placeholder="Guardian Phone number">
                                                @error('guardian_number')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Phone Number</label>
                                                <input value="{{ $data ? $data->phone : '' }}" type="number"
                                                    class="form-control" name="phone" id="exampleInputUsername1"
                                                    placeholder="Student Phone Number ">
                                                @error('phone')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Father CNIC #</label>
                                                <input value="{{ $data ? $data->father_cnic : '' }}" type="number"
                                                    class="form-control" name="father_cnic" id="exampleInputUsername1"
                                                    placeholder="Father Cnic No.">
                                                @error('father_cnic')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Class</label>
                                                <select class="form-control" name="class"
                                                    id="exampleInputUsername1">
                                                    @foreach ($classData as $key => $item)
                                                        <option value="{{ $item->id }} "
                                                            {{ $data && ($data->class =$item->id) ? 'selected' : '' }}>
                                                            {{ $item->class_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Section</label>
                                                <select class="form-control" name="section"
                                                    id="exampleInputUsername1">
                                                   <option {{($data && $data->section="A")?"selected":''}} value="A">A</option>
                                                   <option {{($data && $data->section="B")?"selected":''}} value="B">B</option>
                                                   <option {{($data && $data->section="C")?"selected":''}} value="C">C</option>
                                                   <option {{($data && $data->section="D")?"selected":''}} value="D">D</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="exampleInputUsername1">Address</label>
                                                <input value="{{ $data ? $data->address : '' }}" type="text"
                                                    class="form-control" name="address"
                                                    id="exampleInputUsername1" placeholder="Address">
                                                @error('address')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                                <h5>Fee Structure</h5> <br>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInputUsername1">Fee Plan</label>
                                                <select class="form-control" name="fee_plan"
                                                    id="exampleInputUsername1">
                                                   <option {{($data && $data->fee_plan="monthly")?"selected":''}} value="monthly">Monthly</option>
                                                   <option {{($data && $data->fee_plan="installment")?"selected":''}} value="installment">Installment</option>
                                                </select>
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
