<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">

                    <div class="card-header h4 bg-white">
                        Create Date Sheet

                    </div>
                    <div class="card-body">
                        @session('success')
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endsession
                        <form wire:submit.prevent="saveDateSheet">
                            <div class="row form-group">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input wire:model='title' type="text" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select wire:model='class' wire:change='getClass' name="class"
                                            class="form-control" id="">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    @error('section')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Year</label>
                                    <input wire:model='academic_year' type="number" min="2014"
                                        placeholder="academic year" class="form-control">
                                    @error('academic_year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Section</label>
                                    <select wire:model='class_section'  name="class_section"
                                        class="form-control" id="">

                                        <option value="all">All</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>

                                    </select>

                                </div>
                            </div>
                        </div>
                            {{-- end of row --}}
                            <hr>
                            @if ($class)

                                @foreach ($classSubjects as $item)
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="mt-4">{{ $item->subject_name }}</label>

                                        </div>
                                        <div class="col-sm-4">
                                            <label>Paper Date</label>
                                            <input type="date" wire:model="marks.{{ $item->id }}.date"
                                                class="form-control">
                                            @error("marks.{$item->id}.date")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Start Time</label>
                                            <input type="time" wire:model="marks.{{ $item->id }}.start_time"
                                                class="form-control">
                                            @error("marks.{$item->id}.start_time")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>
                                @endforeach
                            @endif
                            @if ($marks)

                            @foreach ($marks as $key=> $item)
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        @php
                                            $subject=DB::table('subjects')->where('id','=',$key)->value('subject_name');
                                        @endphp
                                        <label class="mt-4">{{ $subject }}</label>

                                    </div>
                                    <div class="col-sm-4">
                                        <label>Paper Date</label>
                                        <input type="date" wire:model="marks.{{ $key }}.date"
                                            class="form-control">
                                        @error("marks.{$key}.date")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Start Time</label>
                                        <input type="time" wire:model="marks.{{ $key }}.start_time"
                                            class="form-control">
                                        @error("marks.{$key}.start_time")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </div>
                            @endforeach
                        @endif
                            <button type="submit" class="btn btn-dark">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
