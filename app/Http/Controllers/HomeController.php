<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Users;
use App\Resumes;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUser()
    {
        $user = Auth::user();

        if ($user) {
            $resumes = Resumes::where('resumes_users_id', $user->id)->get();
            return view('auth.edit', compact('user', 'resumes'));
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $data)
    {
        $user = Auth::user();

        if ($user) {
            $user->name_kana = $data->name_kana;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->birthday = $data->birthday;
            $user->gender = $data->gender;
            $user->zip = $data->zip;
            $user->address_kana = $data->address_kana;
            $user->address = $data->address;
            $user->tel1 = $data->tel1;
            $user->tel2 = $data->tel2;
            $user->fax = $data->fax;
            $user->save();
        }

        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editCareers()
    {
        $user = Auth::user();

        if ($user) {
            return view('editCareers', compact('user'));
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function previewResume()
    {
        $user = Auth::user();

        if ($user) {
            $resumes = Resumes::where('resumes_users_id', $user->id)->get();
            return view('resume', compact('user', 'resumes'));
        }
    }
}
