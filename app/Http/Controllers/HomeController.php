<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Answer;
use App\Models\Message;
use App\Models\Question;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ReminderMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questionsPerDay = Question::select(DB::raw('COUNT(*) as count'), DB::raw('DAYNAME(created_at) as day'))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('day')
            ->orderBy('day', 'ASC')
            ->pluck('count', 'day')->toArray();

        $answersPerDay = Answer::select(DB::raw('COUNT(*) as count'), DB::raw('DAYNAME(created_at) as day'))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('day')
            ->orderBy('day', 'ASC')
            ->pluck('count', 'day')->toArray();

        return view('admin.home', [
            'notifications'     => Notification::orderBy('id', 'DESC')
                ->orderBy('id', 'DESC')
                ->paginate(10),
            'reminderMessages'  => ReminderMessage::where('teacher_id', auth()->user()->id)
                ->orderBy('id', 'DESC')
                ->paginate(10),

            //Admin 
            'questionsAll'      => Question::count(),
            'todayQuestions'    => Question::whereDate('created_at', Carbon::today())->count(),
            'teachers'          => User::where('role_id', '2')->count(),
            'students'          => User::where('role_id', '3')->count(),
            'answersAll'        => Answer::count(),
            'questionsPerDay'   => $questionsPerDay,
            'answersPerDay'     => $answersPerDay,

            //Student
            'studentQuestion'     => Question::where('user_id', auth()->user()->id)->count(),
            'answerYourQuestion'  => Answer::whereHas('question', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->count(),

            // Teacher
            'teacherAnswer'     => Answer::where('user_id', auth()->user()->id)->count(),
            'questionPending'   => Question::where('teacher_id', auth()->user()->id)
                ->doesntHave('answers')
                ->count(),
            'studentMentored'   => User::whereHas('questions', function ($query) {
                $query->where('teacher_id', auth()->user()->id);
            })->count(),
        ]);
    }
}
