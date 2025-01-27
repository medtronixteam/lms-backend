@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1>Teacher Dashboard</h1>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h4 class="card-title">Total Students</h4>
                        <p class="card-text">{{$totalStudent}}</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card shadow rounded">
                    <div class="card-body ">
                        <h4 class="card-title">Total Classes</h4>
                        <p class="card-text">{{$totalclasses}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
