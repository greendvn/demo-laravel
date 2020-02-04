<?php


namespace App\Http\Services\ProductService;


use App\Http\Repositories\ProductRepo\ProductRepo;
use App\Http\Repositories\ProductRepo\ProductRepoInterface;

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

    public function create($obj)
    {
        // TODO: Implement create() method.
    }

    public function update($obj, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
