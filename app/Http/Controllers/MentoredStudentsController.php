<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class MentoredStudentsController extends Controller
{
    public function index()
    {
        $teacherId = auth()->user()->id;

        $students = User::whereHas('questions', function ($query) use ($teacherId) {
            $query->where('teacher_id', $teacherId);
        })->get();

        return view('admin.mentored-students.index', [
            'students' => $students,
        ]);
    }

    public function show($id)
    {
        $student    = User::where('role_id', '3')->find($id);
        $questions  = Question::where('user_id', $student->id)->get();

        return view('admin.mentored-students.show', [
            'student'           => $student,
            'questions'         => $questions,
            'questionsCount'    => $questions->count()
        ]);
    }
}
