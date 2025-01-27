@extends('layouts.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <h1>Activities List</h1>
            <div class="row">
                @foreach ($activityData as $key => $item)
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card  shadow rounded" style="height: 100%">
                        <div class="row">
                          <div class="col-md-6" style="height: 200px; width: 100%">
                            @php
                            $files = json_decode($item->file, true);
                            @endphp
                            @if ($files && is_array($files))
                                @php
                                    $firstFile = $files[0];
                                    $fileExtension = pathinfo($firstFile, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                    <a href="{{ asset('storage/' . $firstFile) }}" target="_blank">
                                        <img class="img-fluid w-100 h-100 rounded-start" src="{{ asset('storage/' . $firstFile) }}" alt="Image">
                                    </a>
                                @elseif (in_array(strtolower($fileExtension), ['mp4', 'avi', 'mov', 'webm']))
                                    <video class="img-fluid w-100 h-100 rounded-start" controls>
                                        <source src="{{ asset('storage/' . $firstFile) }}" type="video/{{ $fileExtension }}">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <p>No valid files available to display.</p>
                                @endif
                            @else
                                <p>No files uploaded.</p>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <div class="card-body">
                              <h5 class="card-title">{{ $item->title }}</h5>
                              <p class="card-text">{{ $item->description }}</p>
                              <p class="card-text text-muted">{{ $item->activity }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
