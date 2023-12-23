<?php


namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tymon\JWTAuth\Contracts\JWTSubject;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->withTrashed()->get();
        $userRole = auth('web')->user()->roles->name;
        return view('backoffice.users.user_show', compact('users', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->hasRole('admin')) {
            $roles = Role::where('name', '!=', 'admin')->get();
        } else {
            $roles = Role::get()->all();
        }

        return view('backoffice.users.user_create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => $request->input('role_id'),
        ]);

        return redirect()->route('users.index')->with('success', "The User with <strong>$user->email</strong> email has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $user = User::findOrFail($id);
            $params = [
                'user' => $user,
            ];
            return view('backoffice.users.user_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            if (!auth()->user()->hasRole('admin')) {
                $roles = Role::where('name', '!=', 'admin')->get();
            } else {
                $roles = Role::get()->all();
            }
            $params = [
                'user' => $user,
            ]; 
            return view('backoffice.users.user_edit', compact('roles'))->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'username' => 'required|unique:users,username,' . $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'role_id' => 'required',
            ]);

            $user = User::findOrFail($id);
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->role_id = $request->input('role_id');
            $user->save();

            return redirect()->route('users.index')->with('success', "The User with username: <strong>$user->username</strong> has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->forceDelete();
            return redirect()->route('users.index')->with('success', "A User with the username <strong>$user->username</strong> and email <strong>$user->email</strong> has successfully been deleted from the database.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }


    /**
     * Soft Delete a specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', "The User with email: <strong>$user->email</strong> has successfully been deactivated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Restore a soft deleted item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softUndelete($id)
    {
        try {
            $user = User::withTrashed()->findOrFail($id);
            $user->restore();
            return redirect()->route('users.index')->with('success', "The User with the email: <strong>$user->email</strong> has successfully been reactivated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }

    }
}
