<?php


namespace App\Http\Services\ProductService;


use App\Http\Services\ServiceInterface;

interface ProductServiceInterface extends ServiceInterface
{
    public function latestProduct();
    public function paginate();
    public function searchCategory($categoryId);


}
