<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\HomePage;
use App\Models\Interest;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialAccount;
use App\Models\Summary;
use App\Models\Testimonial;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->first();
        $about = About::first();
        $home = HomePage::first();
        $skill = Skill::all();
        $interest = Interest::orderBy('id', 'desc')->get();
        $testimonial = Testimonial::orderBy('id', 'desc')->get();
        $summary = Summary::first();
        $education = Education::orderBy('id', 'desc')->get();
        $experience = Experience::all();
        $training = Training::all();
        $service = Service::all();
        $socialaccount = SocialAccount::all();
        $portfolio = Portfolio::all();
        $app = Portfolio::where('category', 'App')->get();
        $web = Portfolio::where('category', 'Web')->get();
        $other = Portfolio::where('category', 'Others')->get();
        // dd($app);
        return view('Frontend.Layout.master', compact(
            'user',
            'about',
            'home',
            'skill',
            'interest',
            'testimonial',
            'summary',
            'education',
            'experience',
            'training',
            'service',
            'socialaccount',
            'portfolio',
            'app',
            'web',
            'other',
        ));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credential = $request->only('email', 'password');
            // dd($credential);
            if (Auth::attempt($credential)) {
                // return 'done';
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withErrors('Invalid Credentials !!!');
            }
        }
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged Out !!!');
    }

    public function portfolioDetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('Frontend.details', compact('portfolio'));
    }
}
