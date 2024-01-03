@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-10 d-flex align-items-strech mx-auto">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit Notification</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/notification" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/admin/notification/{{ $notification->id }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ old('title', $notification->title) }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notification" class="form-label">Notification<span
                                    style="color: red">*</span></label>
                            <textarea class="form-control" name="notification" id="notification" cols="30" rows="10">{{ $notification->notification }}</textarea>
                            @error('notification')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary m-1 float-end">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
