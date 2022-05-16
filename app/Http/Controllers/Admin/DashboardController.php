<?php

namespace App\Http\Controllers\Admin;

use App\AttendanceMain;
use App\Report;
use App\SearchParam;
use App\Upload;
use App\TempReport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['create','home']]);
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function index()
	{

        $data = [];
        if(!empty(Auth::user())) {
            /*$data['userCount'] = User::where('id', Auth::user()->id)->orWhere('parent_user_id', Auth::user()->id)->count();

            $data['reports'] = Report::Where('parent_user_id', Auth::user()->id)->count();

            $data['attendance'] = AttendanceMain::Where('parent_user_id', Auth::user()->id)->count();

            $data['upload'] = Upload::where('user_id', Auth::user()->id)->count();

            $data['customreport'] = SearchParam::where('parent_user_id', Auth::user()->id)->count();*/
        }

		return view('admin.dashboard', $data);
	}

}
