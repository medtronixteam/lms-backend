@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style=margin-left:140px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header bg-dark " style="color: rgb(243, 237, 237)">
                                 
                                    <form action="{{route('admin.report.salary')}}" method="get">
                                        <div class="row">
                                            <div class="col-sm-4    ">
                                                <h3 class="text-start mt-2">Salary List</h3>
                
                                            </div>
                                            <div class="col-sm-4  ">
                                                <input type="month" value="{{date('Y-m')}}" name="month" class="form-control" id="">
                                          </div>
                                          <div class="col-sm-4">
                                              <button class="btn btn-success " type="submit" >Generate Report</button>
                                             
                                            </div>
                                        </div>
                                       </form>

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
                                                <th> Name</th>
                                                <th>Month</th>
                                                <th>Paid Salery</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($saleryData as $key => $item)
                                            <tr>
                                                <td>{{$loop->iteration }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->month }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>
                                                    @if(Auth::user()->role == 'admin')
                                                    <a href="{{ Route('admin.salery.edit', ['salId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <a href="{{Route('admin.salery.delete',['deleteId'=>$item->id])}}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    {{-- @elseif(Auth::user()->role == 'accountant')
                                                    <a href="{{ Route('accountant.salery.edit', ['salId' => $item->id]) }}"
                                                        class="btn btn-success btn-sm">Accountant Edit</a>
                                                    <a href="{{Route('accountant.salery.delete',['deleteId'=>$item->id])}}"
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
