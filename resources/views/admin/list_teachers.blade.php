@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="margin-left:120px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                    List Teachers
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
                                                <th>Status</th>

                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teacherData as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if($item->status == 'yes')
                                                    <span class="badge badge-success">Yes</span>
                                                    @else
                                                    <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>

                                                <td>{{ $item->phone }}</td>
                                                <td>
                                                    @if(Auth::user()->role == 'admin')
                                                    <a href="{{ Route('admin.teacher.edit', ['teacherId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <a onclick="confirmDelete({{ $item->id }})" href="javascript:void(0)"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    {{-- @elseif(Auth::user()->role == 'accountant')
                                                    <a href="{{ Route('accountant.teacher.edit', ['teacherId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Accountant Edit</a>
                                                    <a href="{{Route('accountant.teacher.delete',['deleteId'=>$item->id])}}"
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
            text: "You want to delete this Teacher?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('admin.teacher.delete', ':deleteId') }}".replace(':deleteId',
                        deleteId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        Swal.fire(
                            'deleted!',
                            'Teacher has been deleted.',
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
