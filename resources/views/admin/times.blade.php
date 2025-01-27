@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="content-wrapper">
                <div class="row">
                    <div class=" mx-auto col-12 grid-margin stretch-card">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-center">{{$data?"Update":"Create"}} Time Table</h1>
                                <form method="POST"action="{{ $data ? route('admin.time.update') : route('admin.time.create')}}"

                                    class="forms-sample">
                                    @csrf
                                    <input type="text" name="times_id" value="{{$data?$data->id:"" }}" hidden>
                                    <div class="form-group col-12">
                                        <label for="exampleInputUsername1">Title</label>
                                        <input value="{{$data? $data->title:''}}" type="text" class="form-control"
                                            name="title" id="exampleInputUsername1" placeholder="Title">
                                        @error('title')
                                        <span class="text-warning">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Class </label>
                                                <select class="form-control" name="class" id="exampleInputUsername1">
                                                    @foreach($classData as $key => $item)
                                                    <option value="{{ $item->class_name}} " {{($data && $data->class
                                                        ="class_name")?"selected":''}} >
                                                        {{ $item->class_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('class')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Section</label>
                                                <select class="form-control form-select " id="section" name="section">
                                                    <option {{($data && $data->section="a")?"selected":''}} value="a">A
                                                    </option>
                                                    <option {{($data && $data->section="b")?"selected":''}} value="b">B
                                                    </option>
                                                    <option {{($data && $data->section="c")?"selected":''}} value="c">C
                                                    </option>
                                                </select>
                                                @error('section')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="data_insert">
                                        <div class="row" id="data" name="data">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Teacher Name</label>
                                                    <select class="form-control" name="teacher[]" id="teacher">
                                                        @foreach($teacherData as $key => $item)
                                                        <option value="{{ $item->id}} " {{($data && $data->
                                                            teacher
                                                            ="teacher_name")?"selected":''}} >
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('teacher')
                                                    <span class="text-warning">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Subject </label>
                                                    <select class="form-control" name="subject[]" id="subject">
                                                        @foreach($subjectData as $key => $item)
                                                        <option value="{{ $item->subject_name}} " {{($data && $data->
                                                            subject
                                                            ="subject_name")?"selected":''}} >
                                                            {{ $item->subject_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subject_class')
                                                    <span class="text-warning">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="exampleInputUsername1">From</label>
                                                <input value="{{$data? $data->from:''}}" type="time"
                                                    class="form-control" name="from[]" id="from" placeholder="8:00 am">
                                                @error('from')
                                                <span class="text-warning">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="exampleInputUsername1">To</label>
                                                <input value="{{$data? $data->to:''}}" type="time"
                                                    class="form-control" name="to[]" id="to" placeholder="2:00 pm">
                                                @error('to')
                                                <span class="text-warning">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-2">
                                                <button type="button" onclick="showrow()"
                                                    class="float-right btn-success btn-sm mt-4 h2">+</button>
                                            </div>

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
@push('js')
<script>
    function showrow() {
        let Data=`<div class="row" id="data" name="data">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Teacher Name</label>
                                                <select class="form-control" name="teacher[]" id="teacher">
                                                    @foreach($teacherData as $key => $item)
                                                    <option value="{{ $item->id}} " {{($data && $data->teacher
                                                        ="id")?"selected":''}} >
                                                        {{ $item->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('teacher')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Subject </label>
                                                <select class="form-control" name="subject[]" id="subject">
                                                    @foreach($subjectData as $key => $item)
                                                    <option value="{{ $item->subject_name}} " {{($data && $data->subject
                                                        ="subject_name")?"selected":''}} >
                                                        {{ $item->subject_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('subject_class')
                                                <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="exampleInputUsername1">From</label>
                                            <input value="{{$data? $data->from:''}}" type="time" class="form-control"
                                                name="from[]" id="from" placeholder="8:00 am">
                                            @error('from')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="exampleInputUsername1">To</label>
                                            <input value="{{$data? $data->to:''}}" type="time" class="form-control"
                                                name="to[]" id="to" placeholder="2:00 pm">
                                            @error('to')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-2">
                                            <button type="button" onclick="$(this).closest('.row').remove()"
                                                class="float-right btn-danger btn-sm mt-4 h2">X</button>
                                        </div>

                                    </div>`;
        $('#data_insert').append(Data);
    }
</script>
@endpush
