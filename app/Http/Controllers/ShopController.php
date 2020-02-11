<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Services\CartService\CartService;
use App\Http\Services\CartService\CartServiceInterface;
use App\Http\Services\CategoryService\CategoryServiceInterface;
use App\Http\Services\ProductService\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $cartService;

    public function __construct(ProductServiceInterface $productService, CategoryServiceInterface $categoryService, CartServiceInterface $cartService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->cartService = $cartService;
    }

    public function index()
    {
        $products = $this->productService->latestProduct();
        return view('shop.index', compact('products'));
    }

    public function category()
    {
        $products = $this->productService->paginate();
        $categories = $this->categoryService->getAll();
        return view('shop.category', compact('products', 'categories'));

    }

    public function cart()
    {
        $cart = Session::get('cart');
        return view('shop.cart',compact('cart'));
    }

    public function addToCart(Request $request, $productId)
    {
        $this->cartService->addToCart($request,$productId);
        Session::flash('success', 'Thêm sản phẩm vào giỏ hàng thành công');
        return redirect()->back();
    }

    public function removeProductIntoCart($productId)
    {
        $this->cartService->delete($productId);
        return redirect()->back();
    }

    public function updateProductIntoCart(Request $request, $productId)
    {
        $this->cartService->update($request,$productId);
        Session::flash('success', 'Cập nhật sản phẩm vào giỏ hàng thành công');
        return redirect()->back();
    }
    public function filterCategory($categoryId){
        $products = $this->productService->searchCategory($categoryId);
        $categories = $this->categoryService->getAll();
        return view('shop.category', compact('products', 'categories'));
    }
}
