<?php


namespace App\Http\Services\ProductService;


use App\Http\Repositories\ProductRepo\ProductRepo;
use App\Http\Repositories\ProductRepo\ProductRepoInterface;
use App\Product;

class ProductService implements ProductServiceInterface
{

    protected $productRepo;

    public function __construct(ProductRepoInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAll()
    {
        return $this->productRepo->getAll();
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function create($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->content = $request->content;
        $product->category_id = $request->category;

        if(!$request->hasFile('image')){
            $product->image= $request->image;
        } else {
            $image = $request->image;
            $imageName = date('Y-m-d H:i:s').$image->getClientOriginalName();
            $request->image->storeAs('public/images/products',$imageName);
            $product->image = $imageName;
        }

        $this->productRepo->create($product);

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
        return $this->productRepo->search($keyword);
    }
}
