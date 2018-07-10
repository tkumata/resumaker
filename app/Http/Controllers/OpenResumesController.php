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
                $resumes_schools = Resumes::where('resumes_users_id', $user->id)
                    ->where(function ($query) {
                        // A and (B or C) の (B or C) 部分
                        $query->where('resumes_organization_name', 'LIKE', '%学校%')
                            ->orWhere('resumes_organization_name', 'LIKE', '%高校%')
                            ->orWhere('resumes_organization_name', 'LIKE', '%大学%');
                    })
                    ->orderby('resumes_date')->get();

                $resumes_companies = Resumes::where('resumes_users_id', $user->id)
                    ->where('resumes_organization_name', 'NOT LIKE', '%学校%')
                    ->where('resumes_organization_name', 'NOT LIKE', '%高校%')
                    ->where('resumes_organization_name', 'NOT LIKE', '%大学%')
                    ->orderby('resumes_date')->get();

                $licenses = License::where('license_users_id', $user->id)->orderby('license_date')->get();

                $others = Others::where('others_users_id', $user->id)->first();

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
                $resumes = Resumes::where('resumes_users_id', $user->id)
                    ->where('resumes_organization_name', 'LIKE', '%入社%')
                    ->orderby('resumes_date')
                    ->get();

                $notes = Careers::where('careers_users_id', $user->id)->get();

                return view('career', compact('user', 'resumes', 'notes'));
            }
        }
    }
}
