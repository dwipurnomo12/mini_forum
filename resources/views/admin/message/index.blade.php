@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <h5 class="card-title fw-semibold text-white">Message</h5>
                    </div>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="alert alert-secondary" role="alert">
                        Message from your mentor teacher
                    </div>

                    @foreach ($messages as $message)
                        <div class="card my-3">
                            <div class="card-body chat-box">
                                <div class="message">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="user-info">
                                                <img src="{{ $message->teacher->photo ? asset('storage/' . $message->teacher->photo) : asset('/admin/assets/images/profile/user-1.jpg') }}"
                                                    alt="User Photo" class="img-fluid rounded me-2 mb-3" width="50"
                                                    height="50">
                                                <span class="user-name">{{ $message->teacher->name }} -
                                                    {{ $message->teacher->role->role }}</span> <br>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <span
                                                class="message-time float-end">{{ $message->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                    <div class="message-content">
                                        <span class="message-body">{{ $message->message }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
