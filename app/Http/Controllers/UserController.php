<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $userService;

    // Dependency Injection
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // LIST PAGE
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    // CREATE PAGE
    public function create()
    {
        return view('users.create');
    }

    // STORE USER
    public function store(StoreUserRequest $request)
    {
        $this->userService->store($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'User Created Successfully');
    }

    // EDIT PAGE
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    // THIS IS WHERE YOU ADD IT
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $this->userService->update(
            $user,
            $request->validated()
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'User Updated Successfully');
    }

    // delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $this->userService->delete($user);

        return redirect()->route('users.index')
            ->with('success', 'User Deleted Successfully');
    }
}
