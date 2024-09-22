<?php

use App\Models\Product;

function getProductById($id) {
    return Product::where('id', $id)->first();
}
