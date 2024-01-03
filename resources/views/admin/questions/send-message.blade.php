@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-10 d-flex align-items-strech mx-auto">
            <div class="card w-100">
                <div class="card-header bg-primary">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Remind Teacher</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/questions" type="button" class="btn btn-warning float-end">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/admin/questions">
                        @csrf
                        <input type="hidden" value="{{ $question->teacher_id }}" name="teacher_id">
                        <div class="mb-3">
                            <label for="reminder" class="form-label">Remind teachers to answer questions<span
                                    style="color: red">*</span></label>
                            <textarea class="form-control" name="reminder" id="reminder" cols="30" rows="10"></textarea>
                            @error('reminder')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary m-1 float-end">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
