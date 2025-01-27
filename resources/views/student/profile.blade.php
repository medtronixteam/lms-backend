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
                                    Profile Details
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Father Name</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Fee Structure</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $studentData->name }}</td>
                                                <td>{{ $studentData->email }}</td>
                                                <td>{{ $studentData->phone }}</td>
                                                <td>{{ $studentData->father_name }}</td>
                                                <td>{{ $studentData->class }}</td>
                                                <td>{{ $studentData->section }}</td>
                                                <td>{{ $studentData->fee_plan }}</td>
                                            </tr>
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
