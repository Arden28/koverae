<?php

namespace Modules\Inventory\Traits;

use Modules\Inventory\Entities\Product;

trait ProductTrait{
    public function storeProduct($data)
    {
        $product = Product::create($data);
        $product->save();

        return $product;
    }

    public function updateProduct($data, $product)
    {
        $product->update($data);
        $product->save();

        return $product;
    }
}
