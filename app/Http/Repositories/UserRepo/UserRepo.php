<?php


namespace App\Http\Repositories\UserRepo;


use App\User;

class UserRepo implements UserRepoInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function findById($id)
    {
        return $this->user->findOrFail($id);
    }


    public function delete($user)
    {
        $user->delete();
    }

    public function search($keyword)
    {
        // TODO: Implement search() method.
    }

    public function createOrUpdate($obj)
    {
        $obj->save();
    }
}
