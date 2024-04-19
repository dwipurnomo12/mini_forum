@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-10 d-flex align-items-strech mx-auto">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit topic</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/topics" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/admin/topics/{{ $topic->id }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="topic" class="form-label">Topic Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="topic" id="topic"
                                value="{{ old('topic', $topic->topic) }}">
                            @error('topic')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span
                                    style="color: red">*</span></label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $topic->description }}</textarea>
                            @error('description')
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
