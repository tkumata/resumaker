<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Hash;
use File;
use App\User;
use App\Resumes;
use App\License;
use App\Careers;
use App\Others;
use App\Classes\MyClass;

class OpenResumesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function openResume($code)
    {
        if ($code) {
            $user = User::where('public', $code)->first();

            if ($user) {
                $my = new MyClass;
                list($resumes_schools, $resumes_companies, $licenses, $others) = $my->previewResume($user);

                return view('resume', compact(
                    'user',
                    'resumes_schools',
                    'resumes_companies',
                    'licenses',
                    'others'
                ));
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function openCareer($code)
    {
        if ($code) {
            $user = User::where('public', $code)->first();

            if ($user) {
                $my = new MyClass;
                list($resumes, $notes) = $my->previewCareer($user);
    
                return view('career', compact('user', 'resumes', 'notes'));
            }
        }
    }
}
