<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Question;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $authUser = auth()->user()->role_id;

        if ($authUser == 2) {
            $questions = Question::with('user')
                ->where('teacher_id', auth()->user()->id)
                ->where('status', 'accepted')
                ->orderBy('updated_at', 'DESC')
                ->get();
        } else {
            $questions = Question::with('user')
                ->where('status', 'accepted')
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        return view('admin.archive.index', [
            'questions' => $questions,
            'classes'   => ClassRoom::all()
        ]);
    }

    public function show($id)
    {
        $question = Question::with('answers')->find($id);
        return view('admin.archive.show', [
            'question'  => $question
        ]);
    }

    public function filterData(Request $request)
    {
        $classId    = $request->input('class_id');
        $users      = User::where('class_id', $classId)->pluck('id');
        $questions  = Question::whereIn('user_id', $users)->get();
        $classes    = ClassRoom::all();

        return view('admin.archive.index', compact('questions', 'classes'));
    }
}
