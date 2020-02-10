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
        $this->userRepo->createOrUpdate($user);

    }

    public function update($request, $id)
    {
        $user = $this->userRepo->findById($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->pass) {
            $user->password = Hash::make($request->pass);
        }
        $this->userRepo->createOrUpdate($user);
    }

    public function delete($id)
    {
        $user = $this->userRepo->findById($id);
        $this->userRepo->delete($user);

    }

    public function search($keyword)
    {
        // TODO: Implement search() method.
    }
}
