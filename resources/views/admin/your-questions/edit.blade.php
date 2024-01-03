@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech mx-auto">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit Questions</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/your-questions" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <form method="POST" action="/admin/your-questions/{{ $question->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="body" class="form-label">Question Description <span
                                            style="color: red">*</span></label>
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="10" value="{{ old('body') }}">{{ $question->body }}</textarea>
                                    @error('body')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="teacher_id" class="form-label">Choose a Teacher / Mentor <span
                                            style="color: red">*</span></label>
                                    <select id="teacher_id" class="select-teacher" name="teacher_id" style="width: 100%;">
                                        <option value="" selected>-- Choose a teacher --</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $teacher->id == $question->teacher_id ? 'selected' : '' }}>
                                                {{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Question Title <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ old('title', $question->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload Your File<span
                                            style="color: red">*</span></label> <br>
                                    <a href="{{ asset('storage/' . $question->file) }}">
                                        <i class="ti ti-book-download"></i> Your FIle File
                                    </a>
                                    <input type="file" class="form-control" name="file" id="file"
                                        value="{{ old('file', $question->file) }}">
                                    @error('file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
        $(document).ready(function() {
            $('.select-teacher').select2({
                templateResult: formatTeacher,
                templateSelection: formatTeacherSelection,
            });

            function formatTeacher(teacher) {
                if (!teacher.id) {
                    return teacher.text;
                }

                var photo = teacher.element.dataset.photo;
                var defaultPhoto = '{{ asset('/admin/assets/images/profile/user-1.jpg') }}';

                var $teacher = $('<span><img src="' + (photo ? asset('storage/' + photo) : defaultPhoto) +
                    '" class="img-fluid rounded me-2" width="30" height="30"/> ' + teacher.text + '</span>');

                return $teacher;
            }

            function formatTeacherSelection(teacher) {
                return teacher.text;
            }
        });
    </script>
@endsection
