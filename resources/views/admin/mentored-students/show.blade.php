@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Detail Question</h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="/admin/mentored-students" type="button" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td><strong>Name </strong></td>
                                        <td>:</td>
                                        <td>{{ $student->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>:</td>
                                        <td>{{ $student->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Questions</strong></td>
                                        <td>:</td>
                                        <td>{{ $questionsCount }} Question</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    @if ($student->photo)
                                        <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo student"
                                            id="preview" class="img-fluid rounded mb-5" width="100%" height="100%">
                                    @else
                                        <img src="/admin/assets/images/profile/user-1.jpg" alt="Photo Profile"
                                            id="preview" class="img-fluid rounded mb-5" width="100%" height="100%">
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">List Questions</h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="/admin/mentored-students" type="button" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="card-my-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><strong>Title</strong></td>
                                            <td>:</td>
                                            <td>{{ $question->title }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Description</strong></td>
                                            <td>:</td>
                                            <td>{!! $question->body !!}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Question Date</strong></td>
                                            <td>:</td>
                                            <td>{{ $question->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
