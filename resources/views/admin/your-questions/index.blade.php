@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Your Questions</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/your-questions/create" type="button" class="btn btn-warning float-end">Add New
                                Question</a>
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
                                        <th>File Question</th>
                                        <th>Question Date</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $question->title }}</td>
                                            <td>{{ $question->created_at->diffForHumans() }}</td>
                                            <td><a href="{{ asset('storage/' . $question->file) }}">
                                                    <i class="ti ti-book-download"></i> Download File
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/admin/your-questions/{{ $question->id }}" type="button"
                                                    class="btn btn-success mb-1"><i class="ti ti-eye"></i> View</a>
                                            </td>
                                            <td>
                                                <a href="/admin/your-questions/{{ $question->id }}/edit" type="button"
                                                    class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                                <form id="{{ $question->id }}"
                                                    action="/admin/your-questions/{{ $question->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger swal-confirm mb-1"
                                                        data-form="{{ $question->id }}"><i class="ti ti-trash"></i></button>
                                                </form>
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
