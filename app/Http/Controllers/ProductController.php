<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use App\Http\Services\CategoryService\CategoryService;
use App\Http\Services\ProductService\ProductService;
use App\Http\Services\ProductService\ProductServiceInterface;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    protected $productService;
    protected $categoryService;

    public function __construct(ProductServiceInterface $productService,CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.products.list',compact('products'));

    }


    public function search(Request $request){
        $keyword = $request->search;
        $products = $this->productService->search($keyword);
        return view('admin.products.list',compact('products'));

    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.products.create',compact('categories'));

    }

    public function store(ProductRequest $request)
    {
        $this->productService->create($request);
        Session::flash('succes','Add thành công');
        return redirect()->route('products.index');

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $product = $this->productService->findById($id);
        $categories = $this->categoryService->getAll();
        return view('admin.products.update',compact('product','categories'));
    }


    public function update(Request $request, $id)
    {
        $this->productService->update($request,$id);
        Session::flash('succes','edit thành công');
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $this->productService->delete($id);
        Session::flash('succes','delete thành công');
        return redirect()->route('products.index');

    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request)
    {
        $import = Excel::import(new ProductsImport, $request->productsFile);
        return redirect()->back();
    }
}
