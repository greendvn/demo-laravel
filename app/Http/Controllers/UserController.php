<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService\UserService;
use App\Http\Services\UserService\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view('admin.users.list',compact('users'));

    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $this->userService->create($request);
        Session::flash('succes','Create account thành công');
        return redirect()->route('login');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
