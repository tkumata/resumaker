<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use File;
use Users;
use App\Resumes;
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
            $resumes = Resumes::where('resumes_users_id', $user->id)
                ->where('resumes_organization_name', 'LIKE', '%入社%')
                ->orderby('resumes_date')
                ->get();

            return view('auth.editCareers', compact('user', 'resumes'));
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data)
    {
        $user = Auth::user();

        if ($user) {
            /**
             * Resumes
             *
             * @var $d->{'resumes_detail_'.$i}
             */
            foreach ($data->request as $k => $v) {
                if (preg_match("/resumes_detail_/", $k)) {
                    $resumes_id = preg_replace("/resumes_detail_/", "", $k);
                    // dd($resumes_id, $v);
                    // Update.
                    Resumes::where('id', $resumes_id)->update([
                        'resumes_detail' => $v
                    ]);
                }
            }

            return view('home');
        }
    }
}
