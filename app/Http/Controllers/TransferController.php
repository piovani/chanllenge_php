<?php

namespace App\Http\Controllers;

use App\Domain\User\Services\TransferBetweenUsers;
use App\Http\Requests\TransferRequest;

class TransferController extends Controller
{
    public function transfer(TransferRequest $request)
    {
        $data = $request->validated();

        [$res, $message] = call_user_func(new TransferBetweenUsers(), $data);

        $code = $res ? 200 : 404;

        return response()->json(['operation' => $res, 'message' => $message], $code);
    }
}
