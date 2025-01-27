@extends('layouts.index')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="margin-left:20px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                    List Students
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                    <div class="alert alert-primary" role="alert"">
                                    {{session('success')}}
                                </div>

                     @endif
                        <table class=" table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Father Name</th>
                                        <th>class</th>
                                        <th>Section</th>
                                        <th>Fee Structure</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentData as $key => $item)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->father_name }}</td>
                                    <td>{{ $item->class }}</td>
                                    <td>{{ $item->section }}</td>
                                    <td>{{ $item->fee_plan }}</td>
                                    <td>
                                        @if(Auth::user()->role == 'admin')
                                        <a href="{{ Route('admin.student.edit', ['studentId' => $item->id]) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a  onclick="confirmDelete({{ $item->id }})" href="javascript:void(0)"
                                            class="btn btn-danger btn-sm">Delete</a>
                                            
                                        @livewire('student-fee', ['studentId' => $item->id,'fee_type'=>$item->fee_plan], key($item->id))
                                        <a  href="{{ Route('admin.student.attendance', ['attendanceId' => $item->id]) }}"
                                            class="btn btn-danger btn-sm">Attendance</a>
                                        @endif
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
        </div>
        <!-- Button trigger modal -->

    </div>

    <script>
        function confirmDelete(deleteId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this student?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.student.delete', ':deleteId') }}".replace(':deleteId',
                            deleteId),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'deleted!',
                                'Student has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        }
    </script>
@endsection
