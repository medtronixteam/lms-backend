
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12" >
                <div class="card shadow">

                    <div class="card-header  bg-white">

                       <form action="{{route('admin.report.expense')}}" method="get">
                        <div class="row">
                            <div class="col-sm-4">
                                <h3 class="text-start mt-2">Expense List</h3>

                            </div>
                            <div class="col-sm-4  ">
                                <input type="month" value="{{date('Y-m')}}" name="month" class="form-control" id="">
                          </div>
                          <div class="col-sm-4">
                              <button class="btn btn-success " type="submit" >Generate Report</button>
                              <a href="{{ route('admin.expense') }}" wire:navigate class="btn btn-primary" >+</a>
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
                                    <th>Note</th>
                                    <th>Amount</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenseData as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>{{ $item->amount }}</td>

                                    <td>


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
    </div>
</div>


