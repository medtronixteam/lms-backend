<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-white">Attendance Record </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Record Of</label>
                                        <select wire:change='getResult' wire:model="record"
                                            class="form-control form-select" id="record" name="record">
                                            <option value="">Select Records</option>
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                        </select>
                                    </div>
                                </div>
                                @if ($record === 'student')
                                    <div class="col-4">
                                        <label for="class">Class</label>
                                        <select wire:model="class" wire:change="getClass" name="class"
                                            class="form-control" id="class">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($class)
                                        <div class="col-4">
                                            <label for="student">Students</label>
                                            <select wire:model="student" wire:change="getResult" name="student"
                                                class="form-control" id="student">
                                                <option value="">Select Student</option>
                                                @foreach ($classStudents as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                @endif
                                @if ($record === 'teacher')
                                    <div class="col-4">
                                        <label for="teacher">Teachers</label>
                                        <select wire:model="teacher" wire:change="getResult" name="teacher"
                                            class="form-control" id="teacher">
                                            <option value="">Select Teacher</option>
                                            @foreach ($teacherData as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                @if (!empty($attendanceData))
                                <div class="row mt-4 ml-5">
                                    <h3>Attendance Records</h3>
                                    <div class="form-group ml-4 mb-4">
                                        <form id="filterForm" wire:submit.prevent="getResult">
                                            <input type="month" wire:model.lazy="month" class="form-control">
                                        </form>

                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($attendanceData as $record)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($record->date)->format('d-m-Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($record->first_checkin)->format('H:i:s') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($record->last_checkin)->format('H:i:s') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No records available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            @else
                                <p class="bg-primary text-white w-100 p-3">No attendance records found for this
                                    user.</p>
                            @endif

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
