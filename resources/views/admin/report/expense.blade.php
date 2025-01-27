<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Report</title>
    @include('partials.admin.head')
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" >
                <div class="col-sm-12 my-3 text-center boder-bottom border-dark">
                    <h2>Expense Report {{$month}} </h2>
                </div>
                <table class=" table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Note</th>
                            <th>Amount</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expense as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->note}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>


            </div>
        </div>
    </div>
</body>
</html>
