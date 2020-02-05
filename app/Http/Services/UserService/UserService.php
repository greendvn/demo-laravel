<?php


namespace App\Http\Services\UserService;


use App\Http\Repositories\UserRepo\UserRepo;
use App\Http\Repositories\UserRepo\UserRepoInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected $userRepo;

    public function __construct(UserRepoInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    public function findById($id)
    {
        return $this->userRepo->findById($id);
    }

    public function create($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $this->userRepo->create($user);

    }

    public function update($obj, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function search($keyword)
    {
        // TODO: Implement search() method.
    }
}
