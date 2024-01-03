@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <h5 class="card-title fw-semibold text-white">Mass Messaging</h5>
                    </div>
                </div>

                <form method="POST" action="/admin/mass-messaging" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="alert alert-secondary" role="alert">
                            Send mass messages to students you mentor
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="mb-2">
                                            <input type="checkbox" id="select-all"> Select All Students
                                        </label>
                                        <ul>
                                            @foreach ($students as $student)
                                                <li><img src="{{ $student->photo ? asset('storage/' . $student->photo) : asset('/admin/assets/images/profile/user-1.jpg') }}"
                                                        alt="User Photo" class="img-fluid rounded me-2 mb-3" width="30"
                                                        height="30">
                                                    <input type="checkbox" name="student_id[]" value="{{ $student->id }}">
                                                    {{ $student->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message <span
                                                style="color: red">*</span></label>
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                                        @error('message')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary m-1 float-end">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#select-all').change(function() {
                $('input[name="student_id[]"]').prop('checked', $(this).prop('checked'));
            });

            $('input[name="student_id[]"]').change(function() {
                var allChecked = $('input[name="student_id[]"]:checked').length === $(
                    'input[name="student_id[]"]').length;
                $('#select-all').prop('checked', allChecked);
            });
        });
    </script>
@endsection
