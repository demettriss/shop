<?php

namespace Jerex\Shop\Http\Controllers;

use Jerex\Shop\Models\Cart;

class ShopController
{
    public function index()
    {
        return response()->json(
            [
                'status' => true,
            ]
        );
    }
}