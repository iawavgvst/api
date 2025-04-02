<?php

namespace App\Http\Controllers;

use app\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        $param = $request->input('param', 'iPhone');

        $url = "https://dummyjson.com/products/search?q=$param";

        $data = @file_get_contents($url);
        if ($data === false) {
            return response()->json([
                'error' => 'Unable to fetch data from external source'
            ], 500);
        }

        $jsonProducts = json_decode($data, true);

        if (empty($jsonProducts['products'])) {
            return response()->json([
                'message' => 'No products found'
            ], 404);
        }

        $products = [];

        foreach ($jsonProducts['products'] as $productData) {
            $products[] = $productData;
        }

        foreach ($products as $product) {
            $newProduct = [
                'title' => $product['title'],
                'description' => $product['description'],
                'price' => (float)($product['price']),
            ];

            Product::firstOrCreate($newProduct);
        }

        $productsFromDb = Product::query()
            ->where('title', 'LIKE', '%' . $param . '%')
            ->get();

        return ProductResource::collection($productsFromDb);
    }

    public function addNewProducts(Request $request)
    {
        $type = $request->input('type');

        if ($type == 'product') {
            $data = $request->validate([
                'title' => 'required|string|unique:products,title',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
            ],
                [
                'title.unique' => 'The title has already been taken',
                'title.required' => 'The title is missing',
                'price.required' => 'The price is missing',
            ]);

            $product = Product::firstOrCreate($data);

            return response()->json([
                'message' => 'Product created successfully.',
                'data' => ProductResource::make($product),
            ], 201);
        } else {
            return response()->json([
                'message' => 'Sorry, try again'
            ], 400);
        }
    }
}
