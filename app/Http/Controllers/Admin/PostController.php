<?php

namespace App\Http\Controllers\Admin;

use App\Post;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\View\View;

class PostController extends Controller
{

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

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) {

        $this->validateCreate($request->all())->validate();

        $post = new Post();
        $post->title = $request->get('title');
        $post->description = $request->get('description');

        if($post->save()) {
            if(Auth::user()){
                return redirect()->route("admin.post.index")->with("success", "Post saved successfully!");
            } else {
               dd('some problem in post saving!');
            }
        }
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['post'] = Post::query()->findOrFail($id);
        return view('posts.edit', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $post = Post::query()->findOrFail($id);
        $this->validateCreate($request->all(), $id)->validate();
        $post->title = $request->get('title');
        $post->description = $request->get('description');

        $post->update();

        return redirect()->route("admin.post.index")->with("success", "Post updated successfully!");
    }


    /**
     * @param array $data
     * @param null $updateId
     * @return \Illuminate\Contracts\Validation\Validator
     */
	public function validateCreate(array $data, $updateId = null) {
        if(empty($updateId)) {
            $rules = [
                'title' => 'required',
                'description' => 'required',

            ];
        } else {
            $rules = [
                'title' => 'required',
                'description' => 'required',
            ];
        }

        return Validator::make($data, $rules);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws \Exception
     */
	public function destroy($id)
    {
        $post = Post::query()->findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success','Post deleted successfully!');;
    }

}
