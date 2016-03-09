<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Display a single User
     *
     * @param $id
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', array('user' => $user));
    }

    /**
     * GET
     * creating a user
     *
     * @return Response
     */
    public function create()
    {
        $users = [];
        return view('users.create', ['users' => $users]);
    }

    /**
     * POST
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code'          => 'required|between:5,7',
            'firstname'     => 'required|max:50',
            'name_prefix'   => '',
            'lastname'      => 'required|max:50',
            'email'         => 'required|unique:users', //(users is the table to check)
            'password'      => 'required|confirmed|min:6|max:60',

        ]);

        $user = User::create($request->all());
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('/users');
    }

    public function roles(User $user) {
        $roles = Roles::all();
        return view('users.roles', compact('user', 'roles'));
    }

    public function storeRoles(Request $request, User $user) {
        $user->syncRole($request->get('roles'));

        return redirect('users/'.$user->id);
    }
}
