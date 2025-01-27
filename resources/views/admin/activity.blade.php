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
                                    <h1 class="text-center mb-5">{{ $data ? 'Update' : 'Create' }} Activity</h1>
                                    <form method="POST"
                                        action="{{ $data ? route('admin.activity.update') : route('admin.activity.create') }}"
                                        class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="activity_id" value="{{ $data ? $data->id : '' }}" hidden>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="exampleInputUsername1">Title</label>
                                                <input value="{{ $data ? $data->title : '' }}" type="text"
                                                    class="form-control" name="title" id="exampleInputUsername1"
                                                    placeholder="Title Here">
                                                @error('title')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="exampleInputUsername1">Description</label>
                                                <input value="{{ $data ? $data->description : '' }}" type="text"
                                                    class="form-control" name="description" id="exampleInputUsername1"
                                                    placeholder="Description Here">
                                                @error('description')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="exampleInputUsername1">Activity</label>
                                                <input value="{{ $data ? $data->activity : '' }}" type="text"
                                                    class="form-control" name="activity" id="exampleInputUsername1"
                                                    placeholder="about activity">
                                                @error('activity')
                                                    <span class="text-warning">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="exampleInputUsername1">File</label>
                                                <input type="file" name="file[]" class="form-control" multiple>
                                                @error('file')
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
