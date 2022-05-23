<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Municipality;
use App\Services\UserService;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->middleware(['permission:user.*']);
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'प्रयोगकर्ताहरू';
        Gate::authorize('user.*');
        $users = $this->userService->all();

        return view('user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('user.create');
        $title = 'नयाँ प्रयोगकर्ता दर्ता';
        $user = new User();
        $roles = Role::latest()->get();
        $municipalities = Municipality::all();
        $wards = Ward::all();
        return view('user.form', compact('user', 'roles', 'municipalities', 'wards', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('user.create');
        // $attributes = $request->has('is_ward_login') ? $request->all() : $request->except('ward_id');
        $user = $this->userService->create($request);
        if ($user) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('user.index')->with('success', 'User has been added with username ' . $user->username);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('user.edit');
        $title = 'प्रयोगकर्ता';
        $user = $this->userService->find($id);
        // $user->load(['municipality', 'ward']);
        // return $user->getRoleNames();
        $roles = Role::latest()->get();
        $municipalities = Municipality::all();
        $wards = Ward::all();

        return view('user.form', compact('user', 'roles', 'municipalities', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('user.edit');

        if ($this->userService->update($user, $request)) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('user.index')->with('success', 'Account has been updated for  ' . $user->username);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('user.delete');
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User has been deleted');
    }
}
