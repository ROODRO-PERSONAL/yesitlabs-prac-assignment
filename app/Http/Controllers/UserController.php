<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;


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


    // export users to csv
    public function export()
    {
        $fileName = 'users.csv';

        $users = User::all();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($users) {

            $file = fopen('php://output', 'w');

            // CSV Header Row
            fputcsv($file, [
                'ID',
                'Name',
                'Email',
                'Mobile',
                'Created At',
                'Updated At'
            ]);

            // Data rows
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->mobile,
                    $user->created_at,
                    $user->updated_at
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
