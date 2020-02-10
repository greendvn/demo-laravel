<?php


namespace App\Http\Services\CartService;


use App\Http\Services\ServiceInterface;

interface CartServiceInterface extends ServiceInterface
{
    public function addToCart($request,$id);

}
