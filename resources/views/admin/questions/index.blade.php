@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Questions Lists</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="table-responsive">
                            <table id="table_id" class="table display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Form Students</th>
                                        <th>To the Teacher</th>
                                        <th>Question Date</th>
                                        <th>Answered</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $question->title }}</td>
                                            <td>{{ $question->user->name }}</td>
                                            <td>{{ $question->teacher->name }}</td>
                                            <td>{{ $question->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($question->answers->count() > 0)
                                                    <span class="badge bg-success rounded-3 fw-semibold">YES</span>
                                                @else
                                                    <span class="badge bg-danger rounded-3 fw-semibold">NO</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/admin/questions/send-message/{{ $question->id }}" type="button"
                                                    class="btn btn-success mb-1"><i class="ti ti-message"></i> Send
                                                    Message</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection
