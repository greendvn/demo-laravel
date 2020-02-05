<?php


namespace App\Http\Services;


interface ServiceInterface
{
    public function getAll();
    public function findById($id);
    public function create($obj);
    public function update($obj,$id);
    public function delete($id);
    public function search($keyword);

}
