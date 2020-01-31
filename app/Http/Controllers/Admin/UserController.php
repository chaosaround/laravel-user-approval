<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    return view('admin.users', ['users' => User::paginate(15)]);
    }

    /**
     * Approve user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, User $user)
    {
        $user->approve();
        return redirect(route('admin.users.index', ['page' => $request->page]));
    }

	/**
	 * Unapprove user
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function unapprove(Request $request, User $user)
	{
		$user->unapprove();
		return redirect(route('admin.users.index', ['page' => $request->page]));
	}
}
