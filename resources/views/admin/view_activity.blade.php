@extends('layouts.index')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <section class="submit">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="margin-left:200px; margin-top: 40px;">
                            <div class="card shadow">
                                <div class="card-header text-center bg-dark h2" style="color: rgb(243, 237, 237)">
                                    View Activities Detail
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-primary" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Activity</th>
                                                <th>Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->activity }}</td>
                                                <td>
                                                    @php
                                                        $files = json_decode($data->file, true);
                                                    @endphp
                                                    @if($files && is_array($files))
                                                        @foreach($files as $file)
                                                            <a href="{{ asset('storage/' . $file) }}" target="_blank">
                                                                <img src="{{ asset('storage/' . $file) }}" alt="Image" style="max-width: 100px; max-height: 100px; display: inline; margin-bottom: 5px;">
                                                            </a>
                                                        @endforeach
                                                    @else
                                                        No files uploaded.
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
