@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header h3 bg-white">
                         Date Sheet List
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datesheet as $sheet)
                                <tr>
                                    <td>{{ $sheet->title }}</td>
                                    <td>{{ $sheet->user->name }}</td>
                                    <td>{{ $sheet->class->class_name }}</td>
                                    <td><a href="{{ route('student.sheet.view',[$sheet->id]) }}" class="btn btn-primary">View</a></td>
                                    {{-- <td>
                                        @php
                                            $subjects = json_decode($sheet->subjects, true);
                                        @endphp
                                        @if($subjects && is_array($subjects))
                                            <ul>
                                                @foreach($subjects as $key=> $subject)


                                                @php
                                                    $subject_name=DB::table('subjects')->where('id',$key)->first()->subject_name;
                                                @endphp
                                                    <li>{{ $subject_name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            No subjects available
                                        @endif
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
