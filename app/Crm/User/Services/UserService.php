<?php

namespace App\Crm\User\Services;

use App\Crm\User\Events\UserCreation;
use App\Crm\User\Models\User;
use App\Crm\User\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data ['password']= Hash::make($request->password);
        $user = User::create($data);

        event(new UserCreation($user));
        return $user;
//            response()->json([$user, 'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

    }
}
