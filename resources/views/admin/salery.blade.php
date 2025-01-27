@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="content-wrapper">
                <div class="row">
                    <div class=" mx-auto col-md-8 grid-margin stretch-card">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-center mb-5">{{$data?"Update":"Create"}} Salary</h1>
                                <form method="POST" action="{{ $data ? (Auth::user()->role=='admin'? route('admin.salery.update'): route('accountant.salery.update')):(Auth::user()->role=='admin'? route('admin.salery.create'): route('accountant.salery.create'))}}"
                                    class="forms-sample">
                                    @csrf
                                    <input type="text" name="salery_id" value="{{$data?$data->id:"" }}" hidden>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="teacher">User Name</label>
                                            <select class="form-control" name="user_id" id="exampleInputUsername1">
                                                @foreach($allUSers as $key => $item)
                                                    <option  value="{{ $item->id}} " {{($data && $data->user_id==$item->id)?"selected":''}} >
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="month">Month</label>
                                            <input value="{{$data? $data->month:''}}" type="month" class="form-control"
                                                name="month" id="month" placeholder="month">
                                            @error('month')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="paid">Amount</label>
                                            <input value="{{$data? $data->amount:''}}" type="number" class="form-control"
                                                name="paid_salery" id="paid_salery" placeholder="Salary ">
                                            @error('paid_salery')
                                            <span class="text-warning">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-dark mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
