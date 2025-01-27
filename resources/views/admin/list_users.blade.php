@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style=margin-left:90px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                    List Users
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
                                                <th>Address</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userData as $key => $item)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>
                                                    @if($item->role == 'admin')
                                                    <span class="badge badge-success">Admin</span>
                                                    @else
                                                    <span class="badge badge-danger">{{ $item->role }}</span>
                                                    @endif
                                                </td>
                                               <td>
                                                    @if(Auth::user()->role == 'admin')
                                                    <a href="{{ Route('admin.user.edit', ['userId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <a href="{{Route('admin.user.delete',['deleteId'=>$item->id])}}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    {{-- @elseif(Auth::user()->role == 'accountant')
                                                    <a href="{{ Route('accountant.user.edit', ['userId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Accountant Edit</a>
                                                    <a href="{{Route('accountant.user.delete',['deleteId'=>$item->id])}}"
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


@endsection
