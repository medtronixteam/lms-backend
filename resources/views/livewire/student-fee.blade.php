<div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark m-1 btn-sm">
        Plan
    </button>

    @if($showModal)
    <div class="shadow "
        style="background-color: aliceblue;width:70%;height: 60vh;position: fixed;left: 12%;top: 70px;z-index:+99999; ">

        <div class="card ">
            <div class="card-header bg-dark h2 text-white">
                Student Fee
            </div>
            <div class="card-body p-2" style="overflow-y: scroll; max-height: 400px;  overflow-x:hidden;">

                <div class="row form-group">
                    <div class="col-sm-12">
                        <select wire:change='getFeeType' wire:model='fee_type' class="form-control" name=""
                            id="">
                            <option value="monthly">Monthly</option>
                            <option value="installment">Installment</option>
                        </select>
                    </div>
                </div>
                <div wire:loading>
                    Wait......................
                </div>
                <div class="container-fluid">
                    <div wire:loading.remove>
                        @if ($fee_type == 'monthly')
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="">Time Period From </label>
                                    <input type="month" class="form-control" wire:model='time_period_from'>
                                    @error('time_period_from')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Time Period To </label>
                                    <input type="month" class="form-control" wire:model='time_period_to'>
                                    @error('time_period_to')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    <label for="">Per Month Fee </label>
                                    <input type="number" min="0" placeholder="Enter amounts into numbers"
                                        class="form-control" wire:model='fee'>
                                    @error('fee')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @else
                            {{-- installments --}}
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="">Annual Fee </label>
                                    <input type="number" min="0" wire:change='getInstallments'
                                        class="form-control" wire:model='fee'>
                                    @error('time_period_from')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Total Installments </label>
                                    <input type="total_installment" wire:change='getInstallments' class="form-control"
                                        wire:model='total_installment'>
                                    @error('total_installment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @for ($i = 0; $i < $total_installment; $i++)
                                @php
                                    $average_installment = $fee / $total_installment;
                                    $currentAmount = $fee - $average_installment;
                                @endphp
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="">Installment Month</label>
                                        <input type="month" class="form-control" wire:model='installments_month'>
                                        @error('installments_month')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Installment Amount</label>
                                        <input type="number" min="0" class="form-control"
                                            value="{{ $currentAmount }}">
                                        @error('installments_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                dda
            </div>
        </div>



    </div>
    @endif
    {{-- end of --}}

</div>
