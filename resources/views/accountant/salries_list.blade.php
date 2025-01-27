@extends('layouts.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="mx-auto col-md-8 grid-margin stretch-card">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Salries Detail</h1>
                        <form method="POST" class="forms-sample" id="salary-form">
                            @csrf

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="teacher_id">Teachers</label>
                                    <select class="form-control" name="teacher_id" id="teacher_id">
                                        @foreach($teacherData as $teacher)
                                            <option value="{{ $teacher->teacher_name }}">
                                                {{ $teacher->teacher_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="salery_month">Month</label>
                                    <input class="form-control" type="month" name="salery_month" id="salery_month">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <h3>Total Salary: <span id="total_salery"></span></h3>
                                </div>
                                <div class="col-4">
                                    <h3>Paid Salary: <span id="paid_salery"></span></h3>
                                </div>
                                <div class="col-4">
                                    <h3>Remaining Salary: <span id="remaining_salery"></span></h3>
                                </div>
                            </div>

                            <button id="submit_button" type="submit" class="btn btn-dark mr-2" disabled>Check</button>
                        </form>
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
        $('#teacher_id, #salery_month').on('change', function () {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "{{ route('accountant.list.pay.salries') }}",
                data: {
                    teacher_id: $('#teacher_id').val(),
                    salery_month: $('#salery_month').val(),
                    _token: csrfToken,
                },
                success: function (response) {
                    $('#total_salery').text(response.total_salery);
                    $('#paid_salery').text(response.paid_salery);
                    $('#remaining_salery').text(response.remaining_salery);

                    if (response.paid_salery > 0) {
                        $('#submit_button').prop('disabled', false);
                    } else {
                        $('#submit_button').prop('disabled', true);
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
