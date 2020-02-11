<?php


namespace App\Http\Services\CartService;


use App\Cart;
use App\Http\Repositories\ProductRepo\ProductRepoInterface;
use App\Http\Services\CategoryService\CategoryServiceInterface;
use App\Http\Services\ProductService\ProductService;
use App\Http\Services\ProductService\ProductServiceInterface;
use App\Product;
use Illuminate\Support\Facades\Session;

class CartService implements CartServiceInterface
{
    protected $product;

    public function __construct(ProductRepoInterface $product)
    {
        $this->product = $product;
    }


    public function addToCart($request,$productId)
    {
        $product = $this->product->findById($productId);

        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
        } else {
            $oldCart = null;
        }
        //khoi tao gio hang
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        //luu du lieu gio hang vao session
        Session::put('cart', $cart);
    }

    public function update($request, $productId)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->update($request, $productId);
                Session::put('cart', $cart);
            } else {
                Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
            }
        } else {
            Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
        }
    }

    public function delete($productId)
    {

        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->remove($productId);
                Session::put('cart', $cart);
                Session::flash('success', 'Xóa sản phẩm khỏi giỏ hàng thành công');
            } else {
                Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
            }
        } else {
            Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
        }
    }

    public function search($keyword)
    {
        // TODO: Implement search() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function create($obj)
    {
        // TODO: Implement create() method.
    }
}
