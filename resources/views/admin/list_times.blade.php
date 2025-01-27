@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12" style="margin-left:150px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                    Time Table List
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
                                                <th>Class</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($timeData as $key => $item)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{$item->title }}</td>
                                                <td>{{ $item->class }}</td>
                                          

                                                <td>
                                                    <a href="{{route('admin.time.print',['printId'=>$item->id])}}"
                                                        class="btn btn-primary btn-sm">Print</a>
                                                    @if(Auth::user()->role == 'admin')
                                                    <a href="{{ Route('admin.time.edit', ['timeId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <a onclick="confirmDelete({{ $item->id }})" href="javascript:void(0)"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    {{-- @elseif(Auth::user()->role == 'accountant')
                                                    <a href="{{ Route('accountant.time.edit', ['timeId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Accountant Edit</a>
                                                    <a href="{{Route('accountant.time.delete',['deleteId'=>$item->id])}}"
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
            text: "You want to delete this Time Table?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('admin.time.delete', ':deleteId') }}".replace(':deleteId',
                        deleteId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        Swal.fire(
                            'deleted!',
                            'Time Table has been deleted.',
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
