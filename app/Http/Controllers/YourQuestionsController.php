<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class YourQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.your-questions.index', [
            'questions' => Question::with(['user', 'teacher'])
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.your-questions.create', [
            'teachers'  => User::with('role')
                ->where('role_id', '2')
                ->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id'    => 'required',
            'title'         => 'required',
            'body'          => 'required',
            'file'          => 'required|mimes:docx,doc,pdf'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $file       = $request->file('file');
        $filePath   = $file->store('file-questions', 'public');

        Question::create([
            'teacher_id'    => $request->input('teacher_id'),
            'title'         => $request->input('title'),
            'body'          => $request->input('body'),
            'file'          => $filePath,
            'user_id'       => auth()->user()->id
        ]);

        return redirect('/admin/your-questions')->with('success', 'Successfully added new data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::with('answers')->find($id);
        return view('admin.your-questions.show', [
            'question'  => $question,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        $teacher  = user::where('role_id', '2')->get();
        return view('admin.your-questions.edit', [
            'teachers'  => $teacher,
            'question'  => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::find($id);
        $validator = Validator::make($request->all(), [
            'teacher_id'    => 'required',
            'title'         => 'required',
            'body'          => 'required',
            'file'          => 'mimes:docx,doc,pdf'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file')) {
            $file       = $request->file('file');
            $filePath   = $file->store('file-questions', 'public');

            if ($question->file) {
                Storage::delete($question->file);
            }

            $question->update([
                'teacher_id'    => $request->input('teacher_id'),
                'title'         => $request->input('title'),
                'body'          => $request->input('body'),
                'file'          => $filePath,
            ]);
        } else {
            $question->update([
                'teacher_id'    => $request->input('teacher_id'),
                'title'         => $request->input('title'),
                'body'          => $request->input('body'),
            ]);
        }

        return redirect('/admin/your-questions')->with('success', 'Successfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->back()->with('success', 'Successfully deleted data!');
    }

    /**
     * Store a answer to storage.
     */
    public function answer(Request $request)
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

        return redirect()->back()->with('success', 'Successfully send your answer');
    }
}
