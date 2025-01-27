<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">

                    <div class="card-header  bg-white">
                        Create Result Card

                    </div>
                    <div class="card-body">
                        @session('success')
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endsession
                        <form wire:submit.prevent="saveResultCard">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label for="">Title</label>
                                            <input wire:model='title' type="text" class="form-control">
                                            @error("title") <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="">Class</label>
                                          <select wire:model='class' wire:change='getClass' name="class" class="form-control" id="">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $item)

                                            <option value="{{$item->id}}">{{$item->class_name}}</option>
                                            @endforeach
                                          </select>
                                          @error("class") <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Section</label>
                                          <select wire:model='section' wire:change='getClass' name="class" class="form-control" id="">

                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>

                                          </select>
                                          @error("section") <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="student">Students</label>
                                            <select wire:model='student' wire:change='getStudent' name="student" class="form-control" id="student">
                                                <option value="">Select Student</option>
                                                @forelse ($classStudents as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @empty
                                                    <option value="">No Student Found</option>
                                                @endforelse
                                            </select>
                                            @error('student') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                      </div>
                                </div>
                                {{-- end of col-6 --}}
                                <div class="col-sm-6">
                                    @if ($studentData)

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="{{url($studentData->photo)}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-sm-6">
                                            Father Name : {{$studentData->father_name}}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                          {{-- end of row --}}
                          <hr>
                          @if ($class)
                          @foreach ($classSubjects as $item)
                              <div class="row form-group">
                                  <div class="col-sm-3">
                                      <label>{{ $item->subject_name }}</label>
                                  </div>
                                  <div class="col-sm-2">
                                      <label>Obtained Marks</label>
                                      <input type="number" wire:model="marks.{{ $item->id }}.obtained" class="form-control">
                                      @error("marks.{$item->id}.obtained") <span class="text-danger">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="col-sm-2">
                                      <label>Total Marks</label>
                                      <input type="number" wire:model="marks.{{ $item->id }}.total" class="form-control">
                                      @error("marks.{$item->id}.total") <span class="text-danger">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="col-sm-2">
                                      <label>Grade</label>
                                      <select wire:model="marks.{{ $item->id }}.grade" class="form-control">
                                          <option value="">Select Grade</option>
                                          <option value="A+">A+</option>
                                          <option value="A">A</option>
                                          <option value="B">B</option>
                                          <option value="C">C</option>
                                          <option value="D">D</option>
                                          <option value="Pass">Pass</option>
                                          <option value="Fail">Fail</option>
                                      </select>
                                      @error("marks.{$item->id}.grade") <span class="text-danger">{{ $message }}</span> @enderror
                                  </div>
                              </div>
                          @endforeach
                      @endif
                        <hr>
                        <button type="submit" class="btn btn-dark">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
