<?php


namespace App\Http\Repositories\ProductRepo;


use App\Product;

class ProductRepo implements ProductRepoInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
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
        return Product::where('name','LIKE','%'.$keyword.'%')->orWhere('price','LIKE','%'.$keyword.'%')->get();
    }
}
