@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-10 d-flex align-items-strech mx-auto">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Add New Teacher</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/teachers" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/admin/teachers">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span style="color: red">*</span></label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_number" class="form-label">Id Number Teacher<span
                                    style="color: red">*</span></label>
                            <input type="number" class="form-control" name="id_number" id="id_number"
                                value="{{ old('id_number') }}">
                            @error('id_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="major" class="form-label">Teacher Major<span style="color: red">*</span></label>
                            <input type="major" class="form-control" name="major" id="major"
                                value="{{ old('major') }}">
                            @error('major')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span style="color: red">*</span></label>
                            <input type="password" class="form-control" name="password" id="password"
                                value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" value="2" name="role_id">
                        <button type="submit" class="btn btn-primary m-1 float-end">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
