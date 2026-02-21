<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->store($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'User Created Successfully');
    }

    public function index()
    {
        $users = \App\Models\User::latest()->get();

        return view('users.index', compact('users'));
    }
}
