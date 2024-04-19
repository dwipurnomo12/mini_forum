<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        // $topicsByTeacher = Topic::with('teacher')->get()->groupBy('teacher_id');

        return view('admin.registration.index', [
            'topics' => Topic::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function confirmRegistration($topicId)
    {
        $topic = TOpic::findOrFail($topicId);

        $registration = new Registration();
        $registration->student_id   = auth()->user()->id;
        $registration->topic_id     = $topicId;
        $registration->teacher_id   = $topic->teacher_id;
        $registration->save();
        return redirect()->back()->with('success', 'Registration Tesis Successfully !');
    }
}
