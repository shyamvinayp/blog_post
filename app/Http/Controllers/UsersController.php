<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\User;
use App\Connection;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['create','home', 'store','index']]);
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

            $userTypes = User::getUserType();

            $data = User::query()
                //->where('id',  Auth::user()->id)
                //->orWhere('parent_user_id',  Auth::user()->id)
                //->orWhere('parent_user_id', '<>', Auth::user()->id)
                ->get();

            $i = 0;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($user){
                    return view('users.partials.action-index', [
                        'user' => $user,
                    ])->render();
                })
                ->addColumn('status', function($user){
                return view('users.partials.status-link', [
                    'user' => $user,
                ])->render();
                })
                ->editColumn('type', function ($user) use ($userTypes) {
                    return $userTypes[$user->type];
                })
                ->editColumn('created_at', function ($user) {
                    return date('Y-m-d', strtotime($user->created_at));
                })
                ->rawColumns(['action','status', 'serial_no'])
                ->make(true);
        }

        return view('users.index');
    }

    /**
     * @return Application|Factory|View
     */
	public function create()
    {
		$data['userType'] = User::getUserType();

        return view('users.create', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function home() {
        return view('users.home');
    }

    /**
     * @param null $id
     * @return Application|Factory|View
     */
    public function profile($id = null) {
	    $data['user'] = User::query()->findOrFail(Auth::user()->id);
        return view('users.profile', $data);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
	public function edit($id)
    {
        $data['user'] = User::query()->findOrFail($id);
        $data['userType'] = User::getUserType();

        return view('users.edit', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) {
        $this->validateCreate($request->all())->validate();

        $user = $this->saveCust00omer($request, User::class);
        if($user->save()) {
            if(Auth::user()){
                return redirect()->route("users.index")->with("success", "User saved successfully!");
            } else {
                return redirect()->route("login")->with("success", "User registerd successfully, Login to access the application!");
            }
        } else {
            return redirect()->back()->with('error', 'Registration failed! Try again');
        }
    }



    /**
     * @param Request $request
     * @param $user
     * @param string $page
     * @return User
     */
    public function saveCustomer(Request $request, $user, $page = 'edit') {
        $user = new User();
        $user->parent_user_id = isset(Auth::user()->id) ? Auth::user()->id : null;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->city = $request->get('city');
        $user->state = $request->get('state');
        $user->status = 1;
        $user->type = ($request->get('type')) ? $request->get('type') : 3;
        return $user;
    }


    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $this->validateCreate($request->all(), $id)->validate();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->city = $request->get('city');
        $user->state = $request->get('state');
        $user->type = (int)($request->get('type')) ? $request->get('type') : $user->type;

		$user->update();

        return redirect()->route("users.index")->with("success", "User updated successfully!");
    }

	protected function saveUser(Request $request, $user) {
        $user = $this->requestToFillable($request, City::class);
        $user->save();
        return $user;
    }

    /**
     * @param array $data
     * @param null $updateId
     * @return \Illuminate\Contracts\Validation\Validator
     */
	public function validateCreate(array $data, $updateId = null) {
	    //TODO-commented code for future use
        if(empty($updateId)) {
            $rules = [
                'name' => 'required',
                /*'emp_id' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password' => 'required|same:password_confirmation',
                'password_confirmation' => 'required',*/
            ];
        } else {
            $rules = [
                'name' => 'required',
                /*'emp_id' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',*/
            ];
        }

        /*if($updateId) {
            $rules['email'] = [
                Rule::unique('users', 'email')->ignore($updateId)
            ];
            $rules['emp_id'] = [
                Rule::unique('users', 'emp_id')->ignore($updateId)
            ];
        }*/

        return Validator::make($data, $rules);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws \Exception
     */
	public function destroy($id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','User deleted successfully!');;
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function view($id)
    {
        $userTypes = User::getUserType();
        $data['user'] = User::query()->where('users.id', $id)->first()->toArray();
        $data['user']['country'] = null;
        $data['user']['type'] = $userTypes[$data['user']['type']];

        return view('users.view', $data);
    }

    /**
     * @param null $id
     * @return Application|RedirectResponse|Redirector
     */
    public function changeStatus($id = null)
    {
        $user = User::query()->findOrFail($id);
        $user->status = ($user->status == 1) ? 0 : 1;
        $user->save();

        return redirect('users');
    }

    /**
     * @param Request $request
     * @return Request
     */
    public function upload(Request $request){
       /* $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);*/
        if(!empty($request->file())) {
            foreach($request->file() as $key => $value) {
                $fieldName = str_replace('tbl_user_', "",$key);
                $request->file = $request->file($key);
                $destinationPath = public_path('upload/customers'); // upload path
                $fileName = time() . '_'.$fieldName . '.'. $request->file->extension();
                $request->file->move($destinationPath, $fileName);
                $request[$key] = $fileName;
            }
        }

        return $request;
    }

    /**
     * this function is used to export User.
     *
     * @param Request $request
     * @return mixed
     */
    public function exportUser(Request $request){
        $formData = $request->input();
        $filename = time()."_user.xlsx";

        return Excel::download(new UserExport($formData), $filename);
    }

    /**
     * @return Application|Factory|View
     */
    public function print()
    {
        $data['users'] = User::query()->where('id', Auth::user()->id)->orWhere('parent_user_id', Auth::user()->id)->get();
        return view('users.printuser', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function printPriview()
    {
        $data['users'] = User::latest()->get();
        return view('users.users', $data);
    }

}
