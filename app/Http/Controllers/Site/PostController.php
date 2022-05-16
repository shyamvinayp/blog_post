<?php

namespace App\Http\Controllers\Site;

use App\Post;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index', 'show']]);
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Post::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($post){
                    return view('posts.partials.action-index', [
                        'post' => $post,
                    ])->render();
                })
                ->editColumn('created_at', function ($contact) {
                    return date('Y-m-d', strtotime($contact->created_at));
                })
                ->rawColumns(['action', 'serial_no'])
                ->make(true);
        }

        return view('posts.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
	public function show($id)
    {
        $data['post'] = Post::query()->where('id', $id)->first();
        return view('posts.view', $data);
    }

}
