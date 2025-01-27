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
                                    <h1 class="text-center mb-5"> Attendance Setting</h1>
                                    <form method="POST"
                                        action="{{ route('admin.settings.updateIp') }}"
                                        class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="    exampleInputUsername1">IP Address</label>
                                                <input value="{{ $Setting ? $Setting->ip_address : '' }}" type="text"
                                                    class="form-control" name="ip_address" id="exampleInputUsername1"
                                                    placeholder="Ip Address">
                                                @error('ip_address')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="exampleInputUsername1">Port</label>
                                                <input value="{{ $Setting ? $Setting->port : '' }}" type="text"
                                                    class="form-control" name="port" id="exampleInputUsername1"
                                                    placeholder="port Here">
                                                @error('port')
                                                    <span class="text-warning">{{ $message }}</span>
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
