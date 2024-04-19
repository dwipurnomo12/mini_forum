@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="card-title fw-semibold text-white">Topics List</h5>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="table_id" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Topic Name</th>
                                    <th>Description</th>
                                    <th>Tacher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $topic->topic }}</td>
                                        <td>{{ $topic->description }}</td>
                                        <td>{{ $topic->teacher->name }}</td>
                                        <td>
                                            <button class="btn btn-link btn-sm"
                                                onclick="selectTopic({{ $topic->id }})">Select Topic</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- @foreach ($topicsByTeacher as $teacherId => $topics)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">{{ $topics->first()->teacher->name }}'s Topics</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($topics as $topic)
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $topic->topic }}</h5>
                                        <p>Desc : {{ $topic->description }}</p>
                                    </div>
                                    <div class="card-body">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <button class="btn btn-link btn-sm"
                                                onclick="selectTopic({{ $topic->id }})">Select Topic</button>
                                        </li>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

    <script>
        function selectTopic(topicId) {
            Swal.fire({
                    title: "Choose this topic?",
                    text: "You won't be able to change it later!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                })
                .then((willSelect) => {
                    if (willSelect.isConfirmed) {
                        window.location.href = "/registration/" + topicId + "/confirm";
                    }
                });
        }
    </script>
@endsection
