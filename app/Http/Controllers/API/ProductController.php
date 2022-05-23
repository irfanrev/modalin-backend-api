<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request) {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $desc = $request->input('desc');
        $tags = $request->input('tags');
        $categories = $request->input('categories');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $product = Product::with(['galleries', 'spec', 'category', 'comments'])->find($id);

            if($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data produk berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak berhasil diambil',
                    404
                );
            }
        }

        $product = Product::with(['galleries', 'spec', 'category', 'comments']);

        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }
        if ($desc) {
            $product->where('desc', 'like', '%' . $desc . '%');
        }
        if ($tags) {
            $product->where('tags', 'like', '%' . $tags . '%');
        }
        if ($price_from) {
            $product->where('price_from', '>=', $price_from);
        }
        if ($price_to) {
            $product->where('price_to', '<=', $price_to);
        }
        if ($categories) {
            $product->where('catego$categories', $categories);
        }


        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data produk berhasil diambil'
        );
    }
}
