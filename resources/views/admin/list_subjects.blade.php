@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="margin-left:150px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                    List Subjects
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
                                                <th>Class</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjectData as $key => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->subject_name }}</td>
                                                <td>{{ $item->class->class_name }}</td>
                                                <td>
                                                    @if($item->subject_status == 'yes')
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(Auth::user()->role == 'admin')
                                                <a href="{{ Route('admin.subject.edit', ['subjectId' => $item->id]) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <a onclick="confirmDelete({{ $item->id }})" href="javascript:void(0)"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                                {{-- @elseif(Auth::user()->role == 'accountant')
                                                <a href="{{ Route('accountant.subject.edit', ['subjectId' => $item->id]) }}"
                                                    class="btn btn-success btn-sm">Accountant Edit</a>
                                                <a href="{{Route('accountant.subject.delete',['deleteId'=>$item->id])}}"
                                                    class="btn btn-danger btn-sm">Delete</a> --}}
                                                @endif
                                            </td>
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

    <script>
        function confirmDelete(deleteId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this Subject?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.subject.delete', ':deleteId') }}".replace(':deleteId',
                            deleteId),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'deleted!',
                                'Subject has been deleted.',
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
