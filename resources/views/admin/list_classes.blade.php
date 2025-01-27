@extends('layouts.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <section class="submit">
                    <div class="container">
                        <div class="row">
                            <div class="col-12" style="margin-left:180px; margin-top: 40px;">
                                <div class="card shadow">
                                    <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                        List Classes
                                    </div>
                                    <div class="card-body">
                                        @if (session('success'))
                                            <div class="alert alert-primary" role="alert"">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <table class=" table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($classsData as $key => $item)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $item->class_name }}</td>

                                                        <td>
                                                            @if ($item->class_status == 'enable')
                                                                <span class="badge badge-success">Enable</span>
                                                            @else
                                                                <span class="badge badge-danger">Disable</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (Auth::user()->role == 'admin')
                                                                <a href="{{ Route('admin.class.edit', ['classId' => $item->id]) }}"
                                                                    class="btn btn-success btn-sm"> Edit</a>
                                                                <a onclick="confirmDelete({{ $item->id }})"
                                                                    href="javascript:void(0)"
                                                                    class="btn btn-danger btn-sm">Delete</a>
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
                text: "You want to delete this class?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.class.delete', ':deleteId') }}".replace(':deleteId',
                            deleteId),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'deleted!',
                                'Class has been deleted.',
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
