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
use App\Others;
use Auth;
use App\Classes\MyClass;

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
        $user = Auth::user();
        if ($user) {
            $public = $user->public;
        }
        return view('home', compact('public'));
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
            $resumes = Resumes::where('resumes_users_id', $user->id)->get();
            $licenses = License::where('license_users_id', $user->id)->get();
            $others = Others::where('others_users_id', $user->id)->first();
            // dd($others);

            return view('auth.edit', compact('user', 'resumes', 'licenses', 'others'));
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

        $validator = \Validator::make($data->all(), [
            'file' => 'max:5120', //5MB
        ]);

        if ($user) {
            /**
             * Users
             */
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
            // Public
            if ($data->public == "share") {
                if (!$user->public) {
                    $str = $token = bin2hex(random_bytes(64));
                    $user->public = $str;
                }
            } else {
                $user->public = null;
            }
            $public = $user->public;
            // Image
            if (Input::file('image')) {
                // Delete old image at first.
                if ($user->img_path) {
                    $oldpath = public_path('profilepics/' . $user->img_path);
                    File::delete($oldpath);
                }

                // Next, save new image.
                $image = Input::file('image');
                $filename  = $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('profilepics/' . $filename);
                Image::make($image->getRealPath())->fit(300, 400)->save($path);
                // Image::make($image->getRealPath())->resize(
                //     300,
                //     null,
                //     function ($constraint) {
                //         $constraint->aspectRatio();
                //     }
                // )->save($path);
                $user->img_path = $filename;
            }
            // Save
            $user->save();

            /**
             * Resumes
             *
             * @var $data->{'resume_id_'.$i}
             * @var $data->{'resume_org_'.$i}
             */
            for ($i = 1; $i < 12; $i++) {
                // Make time string. e.f. 1991-04-01 00:00:00
                if ($data->{'resume_year_'.$i} && $data->{'resume_month_'.$i}) {
                    $dateTimeString = $data->{'resume_year_'.$i} . '-' .
                        sprintf('%02d', $data->{'resume_month_'.$i}) . '-' .
                        '01 00:00:00';
                } else {
                    $dateTimeString = null;
                }

                // Insert or Update.
                if (empty($data->{'resume_id_'.$i})) {
                    if ($data->{'resume_org_'.$i}) {
                        $resumes = new Resumes;
                        $resumes->resumes_users_id = $user->id;
                        $resumes->resumes_date = $dateTimeString;
                        $resumes->resumes_organization_name = $data->{'resume_org_'.$i};
                        $resumes->save();
                    }
                } else {
                    if ($data->{'resume_org_'.$i}) {
                        Resumes::where('id', $data->{'resume_id_'.$i})->update([
                            'resumes_date' => $dateTimeString,
                            'resumes_organization_name' => $data->{'resume_org_'.$i}
                        ]);
                    } else {
                        Resumes::where('id', $data->{'resume_id_'.$i})->delete();
                    }
                }
            }

            /**
             * Licenses
             */
            for ($i = 1; $i < 7; $i++) {
                if ($data->{'license_year_'.$i} && $data->{'license_month_'.$i}) {
                    $dateTimeString = $data->{'license_year_'.$i} . '-' .
                        sprintf('%02d', $data->{'license_month_'.$i}) . '-' .
                        '01 00:00:00';
                } else {
                    $dateTimeString = null;
                }

                if (empty($data->{'license_id_'.$i})) {
                    if ($data->{'license_detail_'.$i}) {
                        $licenses = new License;
                        $licenses->license_users_id = $user->id;
                        $licenses->license_date = $dateTimeString;
                        $licenses->license_detail = $data->{'license_detail_'.$i};
                        $licenses->save();
                    }
                } else {
                    if ($data->{'license_detail_'.$i}) {
                        License::where('id', $data->{'license_id_'.$i})->update([
                            'license_date' => $dateTimeString,
                            'license_detail' => $data->{'license_detail_'.$i}
                        ]);
                    } else {
                        License::where('id', $data->{'license_id_'.$i})->delete();
                    }
                }
            }

            /**
             * Others
             */
            if ($data->others_id) {
                Others::where('id', $data->others_id)->update([
                    'others_hobby' => $data->hobby,
                    'others_special' => $data->special,
                    'others_reason' => $data->reason,
                    'others_pr' => $data->pr,
                    'others_expectation' => $data->expectation
                ]);
            } else {
                $others = new Others;
                $others->others_users_id = $user->id;
                if ($data->hobby) {
                    $others->others_hobby = $data->hobby;
                }
                if ($data->special) {
                    $others->others_special = $data->special;
                }
                if ($data->reason) {
                    $others->others_reason = $data->reason;
                }
                if ($data->pr) {
                    $others->others_pr = $data->pr;
                }
                if ($data->expectation) {
                    $others->others_expectation = $data->expectation;
                }
                $others->save();
            }
        }

        return redirect('home');
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
