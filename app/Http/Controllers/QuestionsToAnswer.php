<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionsToAnswer extends Controller
{
    public function index()
    {
        return view('admin.questions-to-answer.index', [
            'questions' => Question::with('user')
                ->where('teacher_id', auth()->user()->id)
                ->orderBy('updated_at', 'DESC')
                ->get()
        ]);
    }

    public function show($id)
    {
        $question = Question::with('answers')->find($id);
        return view('admin.questions-to-answer.show', [
            'question'  => $question
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body'          => 'required',
            'file'          => 'nullable|mimes:doc,docx,pdf',
            'question_id'   => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $filePath = null;

        if ($request->hasFile('file')) {
            $file       = $request->file('file');
            $filePath   = $file->store('file-answer', 'public');
        }

        Answer::create([
            'body'          => $request->body,
            'file'          => $filePath,
            'question_id'   => $request->question_id,
            'user_id'       => auth()->user()->id
        ]);

        return redirect()->back()->with('success', 'Successfully send your answer !');
    }
}
