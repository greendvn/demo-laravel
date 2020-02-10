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


    public function delete($category)
    {
        $category->products()->delete();
        $category->delete();
    }

    public function search($keyword)
    {
        return Category::where('name','LIKE','%'.$keyword.'%')->get();
    }

    public function createOrUpdate($obj)
    {
        $obj->save();
    }
}
