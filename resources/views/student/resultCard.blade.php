@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @foreach($result->groupBy('class.class_name') as $className => $classResults)
                <div class="card shadow my-3">
                    <div class="card-header h3 bg-white">
                        Result Card
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Obtained Marks</th>
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classResults as $result)
                                <tr>
                                    <td>{{ $result->title }}</td>
                                    <td>{{ $result->user->name }}</td>
                                    <td>{{ $result->class->class_name }}</td>
                                    <td>{{ $result->marks_obtained }}</td>
                                    <td>{{ $result->total_marks }}</td>
                                    <td>{{ $result->grade }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
