<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product();
        $product->name = 'Laptop Asus';
        $product->desc = 'Laptop Asus 2019';
        $product->image = 'images/products/laptop-asus.pnp';
        $product->price = '2000000';
        $product->content = 'Laptop Asus 2019 moi nhat';
        $product->category_id = 2;
        $product->save();

        $product = new \App\Product();
        $product->name = 'Laptop Dell';
        $product->desc = 'Laptop Dell 2020';
        $product->image = 'images/products/laptop-Dell.pnp';
        $product->price = '2500000';
        $product->content = 'Laptop Dell 2019 moi nhat';
        $product->category_id = 2;
        $product->save();

        $product = new \App\Product();
        $product->name = 'Laptop Hp';
        $product->desc = 'Laptop Hp 2019';
        $product->image = 'images/products/laptop-Hp.pnp';
        $product->price = '3000000';
        $product->content = 'Laptop Hp 2019 moi nhat';
        $product->category_id = 4;
        $product->save();
    }
}
