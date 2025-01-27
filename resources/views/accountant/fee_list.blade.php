@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="content-wrapper">
                <div class="row">
                    <div class="mx-auto col-md-8 grid-margin stretch-card">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-center mb-5">Fees Detail</h1>
                                <form method="POST" class="forms-sample">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Student</label>
                                            <select class="form-control" name="check_fee" id="student_id">
                                                @foreach($studentData as $key => $student)
                                                    <option value="{{ $student->id }}" {{($data && $data->check_fee=="student_name")?"selected":''}}>
                                                        {{ $student->student_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Month</label>
                                           <input class="form-control date" type="month" name="fee_month" id="fee_month">
                                        </div>

                                        <div class="col-6">
                                            <h3 id="fee_status"></h3>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputUsername1">Total Fee</label>
                                            <select class="form-control" name="total" id="total_fee">
                                                @foreach($studentData as $key => $item)
                                                    <option value="{{ $item->fee }}" {{($data && $data->total=="fee")?"selected":''}}>
                                                        {{ $item->fee }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <h3 id="remaining_fee"></h3>
                                        </div>
                                    </div>

                                    <button id="submit_button" name="submit" type="submit" class="btn btn-dark mr-2" disabled>Check</button>
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

@push('js')

<script>
    $(document).ready(function () {
        $('#fee_month').on('change', function () {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log('month_input changed');
            $.ajax({
                type: "POST",
                url: "{{ route('accountant.list.check.fee') }}",
                data: {
                    student_id: $('#student_id').val(),
                    fee_month: $('#fee_month').val(),
                    _token: csrfToken,
                },
                success: function (response) {

                    var totalFee = parseFloat($('#total_fee').val());
                    var paidFee = parseFloat(response.paid);

                    if (response.paid) {
                        $('#fee_status').text('Fee Paid');
                        $('#submit_button').prop('disabled', false);

                        if (paidFee == totalFee) {
                            $('#remaining_fee').text('Remaining Fee: 0');
                        } else {
                            $('#remaining_fee').text('Remaining Fee: ' + (totalFee - paidFee));
                        }
                    } else {
                        $('#fee_status').text('Fee Unpaid');
                        $('#submit_button').prop('disabled', true);
                        $('#remaining_fee').text('Remaining Fee: ' + totalFee);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        });
    });
</script>

@endpush
