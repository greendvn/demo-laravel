<?php


namespace App\Http\Repositories;


interface RepoInterface
{
    public function getAll();
    public function findById($id);
    public function create($obj);
    public function update($obj,$id);
    public function delete($id);

}
