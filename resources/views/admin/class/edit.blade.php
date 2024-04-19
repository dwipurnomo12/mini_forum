@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-10 d-flex align-items-strech mx-auto">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Add New class</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/class/" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/admin/class/{{ $class->id }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="class" class="form-label">Class <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="class" id="class"
                                value="{{ old('class', $class->class) }}">
                            @error('class')
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
