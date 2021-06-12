<?php

namespace App\Http\Controllers;

use App\Mail\PasswordChange;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\Interest;
use App\Models\Portfolio;
use App\Models\Role;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialAccount;
use App\Models\Testimonial;
use App\Models\Training;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = User::count();
        $skill = Skill::count();
        $interest = Interest::count();
        $testimonial = Testimonial::count();
        $service = Service::count();
        $feedback = Feedback::count();
        $experience = Experience::count();
        $training = Training::count();
        $project = Portfolio::count();
        $social = SocialAccount::count();
        $education = Education::count();
        $role = Role::count();
        $notify = DB::table('notifications')->get();
        return view('Backend.Admin.dashboard', compact(
            'user',
            'skill',
            'interest',
            'testimonial',
            'service',
            'feedback',
            'experience',
            'training',
            'project',
            'social',
            'education',
            'role',
            'notify'
        ));
    }
    public function changepassword()
    {
        return view('Backend.Admin.changepassword');
    }
    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
        Mail::to(Auth::user()->email)->send(new PasswordChange);
        Auth::logout();

        return redirect()->route('login')->with('success', 'Your Password has been changed,Please Login again.');
        Auth::logoutOtherDevices(request('password'));
    }
    public function notifications()
    {
        $notify = DB::table('notifications')->get();
        return view('Backend.Layout.master', compact('notify'));
    }
}
