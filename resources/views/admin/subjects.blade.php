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
                                <h1 class="text-center">{{$data?"Update":"Create"}} Subject</h1>
                                <form method="POST"
                                action="{{ $data ?  route('admin.subject.update') : route('admin.subject.create') }}"
                                    class="forms-sample">
                                    @csrf
                                    <input type="text" name="subjects_id" value="{{$data?$data->id:"" }}" hidden>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name </label>
                                        <input value="{{$data? $data->subject_name:''}}" type="text"
                                            class="form-control" name="subject_name" id="exampleInputUsername1"
                                            placeholder="Name Here">
                                        @error('subject_name')
                                        <span class="text-warning">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Class </label>
                                        <select class="form-control" name="subject_class" id="exampleInputUsername1">
                                            @foreach($classData as $key => $item)
                                                <option  value="{{ $item->id}} " {{($data && $data->subject_class ="class_name")?"selected":''}} >
                                                    {{ $item->class_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subject_class')
                                            <span class="text-warning">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control form-select " id="status" name="subject_status">
                                            <option {{($data && $data->subject_status="yes")?"selected":''}}
                                                value="yes">Yes</option>
                                            <option {{($data && $data->subject_status="no")?"selected":''}}
                                                value="no">No</option>
                                        </select>
                                        @error('subject_status')
                                        <span class="text-warning">{{$message}}</span>
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
