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
        return view('admin.users.list', compact('users'));

    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $this->userService->create($request);
        Session::flash('succes', 'Create account thành công');
        return redirect()->route('login');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = $this->userService->findById($id);
        return view('admin.users.update', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $this->userService->update($request,$id);
        Session::flash('succes', 'edit account thành công');
        return redirect()->route('users.index');

    }


    public function destroy($id)
    {
        $this->userService->delete($id);
        Session::flash('succes', 'delete account thành công');
        return redirect()->route('users.index');
    }
}
