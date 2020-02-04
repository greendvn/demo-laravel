<?php


namespace App\Http\Repositories\CategoryRepo;


use App\Category;

class CategoryRepo implements CategoryRepoInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function findById($id)
    {
        return $this->category->findOrFail($id);
    }

    public function create($obj)
    {
        $obj->save();
    }

    public function update($obj, $id)
    {
        $obj->save();
    }

    public function delete($obj)
    {
        $obj->delete();
    }
}
