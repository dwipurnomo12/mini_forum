@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Your Profile</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/profile" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <form method="POST" action="/admin/profile" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $profile->name) }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email<span
                                                style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email', $profile->email) }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_number" class="form-label">Id Number<span
                                                style="color: red">*</span></label>
                                        <input type="id_number" class="form-control" name="id_number" id="id_number"
                                            value="{{ old('id_number', $profile->id_number) }}">
                                        @error('id_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="major" class="form-label">Major<span
                                                style="color: red">*</span></label>
                                        <input type="major" class="form-control" name="major" id="major"
                                            value="{{ old('major', $profile->major) }}">
                                        @error('major')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <span style="color: red"><i>
                                                    (Leave
                                                    the
                                                    password
                                                    blank if you don't want to change it)</i></span></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        @if ($profile->photo)
                                            <img src="{{ asset('storage/' . $profile->photo) }}" alt="Photo Profile"
                                                id="preview" class="img-fluid rounded mb-5" width="100%" height="100%">
                                        @else
                                            <img src="/admin/assets/images/profile/user-1.jpg" alt="Photo Profile"
                                                id="preview" class="img-fluid rounded mb-5" width="100%" height="100%">
                                        @endif
                                        <input type="file" class="form-control" name="photo" onchange="previewImage()">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-1 float-end">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            preview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
