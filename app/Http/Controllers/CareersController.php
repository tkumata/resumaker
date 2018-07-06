<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use File;
use Users;
use App\Careers;
use Auth;

class CareersController extends Controller
{
    //
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
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        if ($user) {
            $careers = Careers::where('careers_users_id', $user->id)->orderby('careers_date')->get();

            return view('auth.editCareers', compact('user', 'careers'));
        }
    }
}
