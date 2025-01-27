@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1>ATTENDANCE RECORD</h1>
        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="month">Date</label>
                    <form id="filterForm" method="GET" action="">

                        <input type="month" value="{{ (request('month'))?request('month'):date('Y-m') }}" class="form-control" id="month" name="month" onchange="this.form.submit()">
                    </form>

                </div>
            </div>
            <div class="col-sm-12">
            @if ($AttendanceData->isEmpty())
                <p class="bg-primary text-white w-100 p-3">No attendance records found for this user.</p>
            @else

                        <div class="row">
                            @foreach ($AttendanceData as $record)
                                <div class="col-md-3">
                                    <div class="card shadow rounded">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$record->date}}</h4>
                                            <p class="card-text">
                                            <p class="card-text">

                                                <strong>CheckIn:</strong> {{ \Carbon\Carbon::parse($record->first_checkin)->format('H:i:s') }}
                                                <strong>CheckOut:</strong> {{ \Carbon\Carbon::parse($record->last_checkin)->format('H:i:s') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

            @endif
        </div>
        </div>
    </div>
</div>
@endsection
