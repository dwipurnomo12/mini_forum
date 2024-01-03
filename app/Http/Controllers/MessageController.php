<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('teacher')
            ->where('student_id', auth()->user()->id)
            ->get();

        foreach ($messages as $message) {
            $message->update(['is_read' => true]);
        }

        return view('admin.message.index', [
            'messages' => $messages,
        ]);
    }
}
