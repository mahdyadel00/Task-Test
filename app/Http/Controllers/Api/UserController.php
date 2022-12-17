<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Requests\Api\StoreUserType;
use App\Http\Requests\Api\StoreUser;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(StoreUser $request)
    {
        //validation
        $request->validated();
        if ($request->type == "user") {
            // dd("user");
            $user = User::create([
                "username"  => $request->username,
                "email"  => $request->email,
                "bio"  => $request->bio,
                "type_id"  => $request->type_id,
                "type"  => $request->type,
            ]);
            if ($user != null) {
                return $this->success(["data" => $user, "message" => "this is the user data"]);
            } else {

                return $this->error("User Type Not Found");
            }
        } elseif ($request->type == "admin") {
            // dd("admin");
            //save image in folder
            if ($request->file('file')) {
                $file = $request->file('file');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/User'), $filename);
                $data['file'] = $filename;
            }
            $user = User::create([
                "username"  => $request->username,
                "email"  => $request->email,
                "bio"  => $request->bio,
                "type_id"  => $request->type_id,
                "type"  => $request->type,
                "title"  => $request->title,
                "file"  => $filename,
            ]);
            if ($user != null) {
                return $this->success(["data" => $user, "message" => "this is the user Admin data"]);
            } else {

                return $this->error("User Type Not Found");
            }
        } elseif($request->type == "super_admin") {
            // dd("super admin");
            $user = User::create([
                "username"  => $request->username,
                "email"  => $request->email,
                "bio"  => $request->bio,
                "type_id"  => $request->type_id,
                "type"  => $request->type,
                "birthdate"  => $request->birthdate,
                "location"  => $request->location,
            ]);
            if ($user != null) {
                return $this->success(["data" => $user, "message" => "this is the user Super Admin data"]);
            } else {

                return $this->error("User Type Not Found");
            }
        }
    }

    public function typeStore(StoreUserType $request)
    {
        //validation
        $request->validated();

        $user_type = UserType::query()->create([

            "user_type" => $request->user_type

        ]);
        //check user Not Null
        if ($user_type != null) {
            return $this->success(["data" => $user_type, "message" => "this is the user type data"]);
        } else {

            return $this->error("User Type Not Found");
        }
    }
}
