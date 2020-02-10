<?php


namespace App\Http\Repositories\ProductRepo;


use App\Http\Repositories\RepoInterface;

interface ProductRepoInterface extends RepoInterface
{
    public function latestProduct();
    public function paginate();
    public function searchCategory($categoryId);


}
