<?php
/**
 * ひらがな入れないと、VSCode が何が何でも Windows 1252 にするから何かひらがな入れとく。
 * Fucki'n VSCode!!!!!
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image as Image;
use File;
use User;
use App\Resumes;
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
            $resumes = Resumes::where('resumes_users_id', $user->id)
                ->where('resumes_organization_name', 'LIKE', '%入社%')
                ->orderby('resumes_date')
                ->get();

            $notes = Careers::where('careers_users_id', $user->id)->get();

            return view('auth.editCareers', compact('user', 'resumes', 'notes'));
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
             */
            foreach ($data->request as $k => $v) {
                if (preg_match("/resumes_detail_/", $k)) {
                    $resumes_id = preg_replace("/resumes_detail_/", "", $k);

                    // Update.
                    Resumes::where('id', $resumes_id)->update([
                        'resumes_detail' => $v
                    ]);
                }
            }

            /**
             * Careers notes
             */
            if (empty($data->notes_id)) {
                $careers = new Careers;
                $careers->careers_users_id = $user->id;
                $careers->careers_notes = $data->careers_notes;
                $careers->save();
            } else {
                if ($data->careers_notes) {
                    Careers::where('careers_users_id', $user->id)->update([
                        'careers_notes' => $data->careers_notes
                    ]);
                }
            }

            return redirect('home');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function preview()
    {
        $user = Auth::user();

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
