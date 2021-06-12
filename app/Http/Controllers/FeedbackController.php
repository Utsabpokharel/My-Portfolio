<?php

namespace App\Http\Controllers;

use App\Mail\Feedbacks;
use App\Models\Feedback;
use App\Models\User;
use App\Notifications\FeedbackNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::orderBy('id', 'desc')->get();
        return view('Backend.Feedback.view', compact('feedback'));
    }
    public function store(Request $request, Feedback $thread)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $feedback = new Feedback([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        $data = $feedback->save();
        $usr = User::where('role', '1')->get();
        $thread = ['feedback_by' => $request->name];
        foreach ($usr as $user) {
            $user->notify(new FeedbackNotification($thread));
        }
        $email = User::where('role', '1')->get('email');
        Mail::to($email)->send(new Feedbacks($feedback));
        if ($data) {
            return redirect()->back()->with('success', 'Your message has been sent. Thank You !!!');
        } else {
            return redirect()->back()->with('error', 'Opps !!!, Please try again.');
        }
    }
}
