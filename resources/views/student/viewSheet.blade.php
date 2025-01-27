@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card shadow my-3">
                    <div class="card-header h2 bg-white">
                        Date Sheet Details
                    </div>
                    <div class="card-body pt-3">
                        <h4><strong >CLASS :</strong> {{ $sheet->class->class_name }}</h4>
                    <h4><strong >TITLE : </strong> {{ $sheet->title }}</h4>
                    </div>
                    @if($subjects && is_array($subjects))
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject Name</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $key => $subject)
                        @php
                            $subject_name = DB::table('subjects')->where('id', $key)->first()->subject_name;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subject_name }}</td>
                            <td>{{ $subject['date'] }}</td>
                            <td>{{ $subject['start_time'] }}</td>
                        </tr>
                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No subjects available</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
