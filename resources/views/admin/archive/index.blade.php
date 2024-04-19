@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Approved Report</h5>
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
                        <div class="form-group my-3">
                            <form action="/admin/archive/filter-data" method="GET">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="text">Filter By Class</label>
                                            <div class="input-group">
                                                <select class="form-control" name="class_id"
                                                    aria-label="Default select example">
                                                    <option value="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}"
                                                            {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                                            {{ $class->class }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <div class="ml-2 mt-1">
                                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                                            class="fa-solid fa-magnifying-glass"></i> Filter</button>

                                                    <a href="/admin/archive/" class="btn btn-sm btn-danger ml-1"
                                                        id="refresh_btn"><i class="fa fa-solid fa-rotate-right"></i>
                                                        Refresh</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table id="table_id" class="table display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Date Approved</th>
                                        <th>Status</th>
                                        <th>File Question</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $question->title }}</td>
                                            <td>{{ $question->updated_at }}</td>
                                            <td>
                                                @if ($question->status == 'revision')
                                                    <span class="badge text-bg-warning p-2">{{ $question->status }}</span>
                                                @else
                                                    <span class="badge text-bg-success p-2">{{ $question->status }}</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ asset('storage/' . $question->file) }}">
                                                    <i class="ti ti-book-download"></i> Download File
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/admin/archive/{{ $question->id }}" type="button"
                                                    class="btn btn-success mb-1"><i class="ti ti-eye"></i> Show Detail</a>
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
