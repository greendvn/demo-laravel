<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.categories.list',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');

    }


    public function store(Request $request)
    {
        $this->categoryService->create($request);
        Session::flash('succes','Add thành công');
        return redirect()->route('categories.index');
    }




    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('admin.categories.update',compact('category'));

    }


    public function update(Request $request, $id)
    {
        $this->categoryService->update($request,$id);
        Session::flash('succes','Edit thành công');
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        $this->categoryService->delete($id);
        Session::flash('succes','Delete thành công');
        return redirect()->route('categories.index');

    }
}
