<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MassMessagingController extends Controller
{
    public function index()
    {
        $teacherId = auth()->user()->id;
        $students = User::whereHas('questions', function ($query) use ($teacherId) {
            $query->where('teacher_id', $teacherId);
        })->get();

        return view('admin.mass-mesagging.index', [
            'students'  => $students
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'student_id' => 'required|array',
        ]);

        $selectedStudents = $request->input('student_id');
        $message = $request->input('message');

        foreach ($selectedStudents as $studentId) {
            Message::create([
                'student_id'    => $studentId,
                'message'       => $message,
                'teacher_id'    => auth()->user()->id
            ]);
        }

        return redirect('/admin/mass-messaging')->with('success', 'Successfully sent messages');
    }
}
