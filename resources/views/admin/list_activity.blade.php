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
                                    List Activities
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
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Activity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activityData as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->activity }}</td>

                                            <td>
                                                @if(Auth::user()->role == 'admin')
                                                <a href="{{ Route('admin.activity.edit', ['activityId' => $item->id]) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ Route('admin.activity.view', ['viewId' => $item->id]) }}"
                                                    class="btn btn-info btn-sm">view</a>
                                                <a  onclick="confirmDelete({{ $item->id }})" href="javascript:void(0)"
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
                text: "You want to delete this Activity?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.activity.delete', ':deleteId') }}".replace(':deleteId',
                            deleteId),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'deleted!',
                                'Activity has been deleted.',
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
