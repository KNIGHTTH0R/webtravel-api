<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Address;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getUser()
    {
        $user = User::select('*')->get();
        echo $user;
        $response = [
            'user' => $user
        ];
        //return $response()->json($response, 200);
    }

    public function deleteUser(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        echo $user;
        $response = [
            'user' => $user
        ];
        //return $response()->json($response, 200);
    }

    public function updateUser(Request $request)
    {
        $user = User::where('id', 49)->update(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ]
        );
        return response()->json([
            'massege' => "success"
        ], 200);
        //echo $request->name;
    }

    public function addUser(Request $request)
    {
        $body = $request->all();
        unset($body['_token']);
        $user = new User($body);
        $user->save();
    }
}
