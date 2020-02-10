<?php


namespace App\Http\Repositories;


interface RepoInterface
{
    public function getAll();
    public function findById($id);
    public function createOrUpdate($obj);
    public function delete($id);
    public function search($keyword);

}
