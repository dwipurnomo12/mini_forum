@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Detail Student</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/students" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <form method="POST" action="/admin/students/{{ $student->id }}">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name', $student->name) }}" disabled>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span style="color: red">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', $student->email) }}" disabled>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="id_number" class="form-label">Id Number Student<span
                                            style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="id_number" id="id_number"
                                        value="{{ old('id_number', $student->id_number) }}" disabled>
                                    @error('id_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="major" class="form-label">Major Student<span
                                            style="color: red">*</span></label>
                                    <input type="major" class="form-control" name="major" id="major"
                                        value="{{ old('major', $student->major) }}" disabled>
                                    @error('major')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body">
                                @if ($student->photo)
                                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo Profile" id="preview"
                                        class="img-fluid rounded mb-5" width="100%" height="100%">
                                @else
                                    <img src="/admin/assets/images/profile/user-1.jpg" alt="Photo Profile" id="preview"
                                        class="img-fluid rounded mb-5" width="100%" height="100%">
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
