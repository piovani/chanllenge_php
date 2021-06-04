<?php

namespace App\Http\Controllers;

use App\Domain\User\Services\CreateUser;
use App\Domain\User\Services\DeleteUser;
use App\Domain\User\Services\UpdateUser;
use App\Domain\User\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = call_user_func(new CreateUser(), $data);

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user = call_user_func(new UpdateUser(), $user, $data);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        call_user_func(new DeleteUser(), $user);
        return response()->json([], 204);
    }
}
