<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="content-wrapper">
                <div class="row">
                    <div class="mx-auto col-md-8 grid-margin stretch-card">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between bg-white">
                                <h3 class="text-center mt-2">Manage Expense</h3>
                                <a href="{{ route('admin.expense.list') }}" wire:navigate class="btn btn-primary" >Expense List</a>

                            </div>
                            <div class="card-body">
                                   <div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-4">
                                        <div>
                                            <label for="date" class="mt-2">Date</label>
                                            <input type="date" id="date" wire:model="date" class="mt-1 form-control" />
                                            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label for="note" class="mt-2">Note *</label>
                                            <input type="text" id="note" wire:model="note" class="mt-1 form-control" />
                                            @error('note') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label for="amount" class="mt-2">Amount *   </label>
                                            <input type="number" id="amount" wire:model="amount" step="0.01" class="mt-1 form-control" />
                                            @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>


                                        <div>
                                            <label for="image" class="mt-2">Proof Image (optional)</label>
                                            <input type="file" id="image" wire:model="image" class="mt-1 form-control" />
                                            @if ($image)
                                                <img style="width: 200px;height: 200px" src="{{ $image->temporaryUrl() }}" alt="Preview" class="mt-2 max-h-32" />
                                            @endif
                                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2 float-end">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

