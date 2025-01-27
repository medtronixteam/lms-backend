@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="content-wrapper">
                <div class="row">
                    <div class="mx-auto col-md-8 grid-margin stretch-card">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-center">{{$data?"Update":"Create"}} Class</h1>
                                <form method="POST"
                                    action="{{ $data ? route('admin.class.update') :  route('admin.class.create') }}"
                                    class="forms-sample">
                                    @csrf
                                    <input type="text" name="class_id" value="{{$data?$data->id:"" }}" hidden>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name </label>
                                        <input value="{{$data? $data->class_name:''}}" type="text" class="form-control"
                                            name="class_name" id="exampleInputUsername1" placeholder="Name Here">

                                        @error('class_name')
                                        <span class="text-warning">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control form-select" id="status" name="class_status">
                                            <option {{ ($data && $data->class_status == 'enable') ? 'selected' : '' }} value="enable">Enable</option>
                                            <option {{ ($data && $data->class_status == 'disable') ? 'selected' : '' }} value="disable">Disable</option>
                                        </select>
                                        @error('class_status')
                                            <span class="text-warning">{{ $message }}</span>
                                        @enderror
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
