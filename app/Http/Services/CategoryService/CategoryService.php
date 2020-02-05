<?php


namespace App\Http\Services\CategoryService;


use App\Category;
use App\Http\Repositories\CategoryRepo\CategoryRepo;
use App\Http\Repositories\CategoryRepo\CategoryRepoInterface;
use Illuminate\Support\Str;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepo;

    public function __construct(CategoryRepoInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAll()
    {
        return $this->categoryRepo->getAll();
    }

    public function findById($id)
    {
        return $this->categoryRepo->findById($id);
    }

    public function create($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($category->name);
        $this->categoryRepo->create($category);
    }

    public function update($request, $id)
    {
        $category = $this->categoryRepo->findById($id);
        $category->name = $request->name;
        $category->slug = Str::slug($category->name);
        $this->categoryRepo->update($category,$id);
    }

    public function delete($id)
    {
        $category = $this->categoryRepo->findById($id);
        $this->categoryRepo->delete($category);
    }

    public function search($keyword)
    {
        return $this->categoryRepo->search($keyword);
    }
}
