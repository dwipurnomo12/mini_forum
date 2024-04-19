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
                            <a href="/admin/your-questions" type="button" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td><strong>Title</strong></td>
                                <td>:</td>
                                <td>{{ $question->title }}</td>
                            </tr>
                            <tr>
                                <td><strong>Topic</strong></td>
                                <td>:</td>
                                <td>{{ $question->topic->topic }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>:</td>
                                <td>
                                    @if ($question->status == 'revision')
                                        <span class="badge text-bg-warning p-2">{{ $question->status }}</span>
                                    @else
                                        <span class="badge text-bg-success p-2">{{ $question->status }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Teacher / Mentor</strong></td>
                                <td>:</td>
                                <td>{{ $question->teacher->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>:</td>
                                <td>{!! $question->body !!}</td>
                            </tr>
                            <tr>
                                <td><strong>File</strong></td>
                                <td>:</td>
                                <td>
                                    @if ($question->file)
                                        <a href="{{ asset('storage/' . $question->file) }}">
                                            <i class="ti ti-book-download"></i> Download File
                                        </a>
                                    @else
                                        No file attached
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Student</strong></td>
                                <td>:</td>
                                <td>{{ $question->user->name }}</td>
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
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Answer</h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="/admin/questions-to-answer" type="button" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Chat Box for Answers -->
                    @if ($question->answers->count() > 0)
                        @foreach ($question->answers as $answer)
                            @if ($answer->user->role->role === 'teacher')
                                <div class="card my-3">
                                    <div class="card-body chat-box bg-primary text-white">
                                        <div class="message">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="user-info">
                                                        <img src="{{ $answer->user->photo ? asset('storage/' . $answer->user->photo) : asset('/admin/assets/images/profile/user-1.jpg') }}"
                                                            alt="User Photo" class="img-fluid rounded me-2 mb-3"
                                                            width="50" height="50">
                                                        <span class="user-name">{{ $answer->user->name }} -
                                                            {{ $answer->user->role->role }}</span> <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <span
                                                        class="message-time float-end">{{ $answer->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>

                                            <div class="message-content">
                                                <span class="message-body">{{ $answer->body }}</span> <br>
                                                @if ($answer->file)
                                                    <a href="{{ asset('storage/' . $answer->file) }}">
                                                        <i class="ti ti-book-download"></i> Download File
                                                    </a>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card my-3">
                                    <div class="card-body chat-box">
                                        <div class="message">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="user-info">
                                                        <img src="{{ $answer->user->photo ? asset('storage/' . $answer->user->photo) : asset('/admin/assets/images/profile/user-1.jpg') }}"
                                                            alt="User Photo" class="img-fluid rounded me-2 mb-3"
                                                            width="50" height="50">
                                                        <span class="user-name">{{ $answer->user->name }} -
                                                            {{ $answer->user->role->role }}</span> <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <span
                                                        class="message-time float-end">{{ $answer->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>

                                            <div class="message-content">
                                                <span class="message-body">{{ $answer->body }}</span> <br>
                                                @if ($answer->file)
                                                    <a href="{{ asset('storage/' . $answer->file) }}">
                                                        <i class="ti ti-book-download"></i> Download File
                                                    </a>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="card">
                            <div class="card-body chat-box">
                                <div class="message">
                                    <span class="message-body">No answer yet</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>


                <div class="card">
                    <div class="card-body">
                        <form action="/admin/your-questions/{{ $question->id }}/answer" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $question->id }}" name="question_id">
                            <div class="mb-3">
                                <label for="body" class="form-label">Your Answer : <span
                                        style="color: red">*</span></label>
                                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                                @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Your File : <span
                                        style="color: red"><i>Optional</i></span></label>
                                <input type="file" class="form-control" name="file" id="file"
                                    value="{{ old('file') }}">
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Send Answer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
