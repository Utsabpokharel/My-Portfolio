<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::orderBy('id', 'desc')->get();
        return view('Backend.Feedback.view', compact('feedback'));
    }
    public function store(Request $request)
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
        if ($data) {
            return redirect()->back()->with('success', 'Your message has been sent. Thank You !!!');
        } else {
            return redirect()->back()->with('error', 'Opps !!!, Please try again.');
        }
    }
}
