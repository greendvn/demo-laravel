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
        return $this->product->findOrFail($id);
    }


    public function delete($data)
    {
        $data->delete();
    }

    public function search($keyword)
    {
        return Product::where('name','LIKE','%'.$keyword.'%')->orWhere('price','LIKE','%'.$keyword.'%')->get();
    }

    public function createOrUpdate($obj)
    {
        $obj->save();
    }

    public function latestProduct()
    {
        return $this->product->take(8)->get()->sortByDesc('updated_at');
    }

    public function paginate()
    {
        return $this->product->paginate(6);
    }

    public function searchCategory($categoryId)
    {
        return Product::where('category_id','LIKE',$categoryId)->paginate(6);
    }
}
