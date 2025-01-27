
@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="margin-left:80px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                    Student List
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Father Name</th>
                                                <th>Guardian Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studentList as $studentData)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{ $studentData->name }}</td>
                                                <td>{{ $studentData->email }}</td>
                                                <td>{{ $studentData->phone }}</td>
                                                <td>{{ $studentData->father_name }}</td>
                                                <td>{{ $studentData->guardian_number }}</td>

                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
