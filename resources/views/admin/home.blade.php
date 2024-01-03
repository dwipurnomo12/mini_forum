@extends('admin.layouts.main')

@section('content')
    @if (auth()->user()->role->role == 'admin')
        <div class="row">
            <div class="col-lg-3">
                <div class="card overflow-hidden bg-danger text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">All Question</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $questionsAll }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-messages" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card overflow-hidden bg-success text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">Today Questions</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $todayQuestions }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-edit" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card overflow-hidden bg-primary text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">Teachers</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $teachers }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-users" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card overflow-hidden bg-warning text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">Students</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $students }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-school" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif (auth()->user()->role->role == 'student')
        <div class="row">
            <div class="col-lg-6">
                <div class="card overflow-hidden bg-danger text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">Your Question</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $studentQuestion }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-messages" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card overflow-hidden bg-success text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">Answer To Your Question</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $answerYourQuestion }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-message-share" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif (auth()->user()->role->role == 'teacher')
        <div class="row">
            <div class="col-lg-4">
                <div class="card overflow-hidden bg-primary text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">Your Answer</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $teacherAnswer }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-messages" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card overflow-hidden bg-danger text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">Questions waiting</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $questionPending }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-message-share" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card overflow-hidden bg-warning text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold text-white">The students you mentor</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3 text-white">{{ $studentMentored }}</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <i class="ti ti-school" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->role->role == 'student')
        <div class="row">
            <div class="col">
                <div class="card w-100">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <h5 class="card-title fw-semibold">Notification from admin</h5>
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
                                <div class="table-responsive">
                                    <table id="table_id" class="table display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Notification</th>
                                                <th>Sent on</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notifications as $notification)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $notification->title }}</td>
                                                    <td>{{ $notification->notification }}</td>
                                                    <td>{{ $notification->created_at->diffForHumans() }}</td>
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
        </div>
    @elseif (auth()->user()->role->role == 'teacher')
        <div class="row">
            <div class="col-lg-6">
                <div class="card w-100">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <h5 class="card-title fw-semibold">Notification from admin</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="table_id" class="table display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Notification</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notifications as $notification)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $notification->title }}</td>
                                                    <td>{{ $notification->notification }}</td>
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
            <div class="col-lg-6">
                <div class="card w-100">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <h5 class="card-title fw-semibold">Reminder Message from admin</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="table_id" class="table display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Reminder Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reminderMessages as $reminderMessage)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $reminderMessage->reminder }}</td>
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
        </div>
    @elseif (auth()->user()->role->role == 'admin')
        <div class="row">
            <div class="col">
                <div id="chart-container">
                    <canvas id="question-answer-chart"></canvas>
                </div>
            </div>
        </div>
    @endif

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('question-answer-chart');

                if (ctx) {
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
                                'Saturday'
                            ],
                            datasets: [{
                                label: 'Questions',
                                data: {!! json_encode($questionsPerDay) !!}, // Ganti dengan data pertanyaan per hari
                                backgroundColor: '#3490dc',
                            }, {
                                label: 'Answers',
                                data: {!! json_encode($answersPerDay) !!}, // Ganti dengan data jawaban per hari
                                backgroundColor: '#9561e2',
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    precision: 0,
                                    stepSize: 1,
                                    ticks: {
                                        callback: function(value) {
                                            if (value % 1 === 0) {
                                                return value;
                                            }
                                        }
                                    }
                                }
                            },
                               maintainAspectRatio: false, 
                               responsive: true 
                        }
                    });
                } else {
                    console.error('Canvas element not found.');
                }
            });
        </script>
    @endpush
@endsection
