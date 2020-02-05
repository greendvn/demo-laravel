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

    public function create($obj)
    {
        $obj->save();
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
