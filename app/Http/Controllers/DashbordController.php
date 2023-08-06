<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use DateTime;

class DashbordController extends Controller
{
    public function show()
    {
        $categories = Category::has('product')->get();
        $discountedProducts = [];

        foreach ($categories as $category) {
            $products = Product::where('category_id', $category->id)->get();

            foreach ($products as $product) {
                $productId = $product->id;
                $discountInfo = $this->calculateComplexDiscountBasedOnExpiry($productId);

                // Add the calculated discount information to the product
                $product->discount_info = $discountInfo;

                $discountedProducts[] = $product;
                // dd($discountedProducts);
            }
        }

        return view('index', compact('discountedProducts', 'categories'));
    }

    public function index()
    {
        $categories = Category::has('product')->get();
        $discountedProducts = [];

        foreach ($categories as $category) {
            $products = Product::where('category_id', $category->id)->get();

            foreach ($products as $product) {
                $productId = $product->id;
                $discountInfo = $this->calculateComplexDiscountBasedOnExpiry($productId);

                // Add the calculated discount information to the product
                $product->discount_info = $discountInfo;

                $discountedProducts[] = $product;
                // dd($discountedProducts);
            }
        }

        return view('dash', compact('discountedProducts', 'categories'));
    }


    private function calculateComplexDiscountBasedOnExpiry($productId)
    {
        $product = Product::find($productId);
    
        if (!$product) {
            return null; 
        }
    
        $originalPrice = $product->price;
        $expiryDate = $product->discount->expiry_date ?? null;
    
        if ($expiryDate) {
            $expiryDateTime = new DateTime($expiryDate);
            $currentDate = new DateTime();
    
            $totalDays = $currentDate->diff($expiryDateTime)->days;
    
            $additionalDiscount = 0;
    
            if ($totalDays <= 3) {
                if ($totalDays === 3) {
                    $additionalDiscount = 3;
                } elseif ($totalDays === 2) {
                    $additionalDiscount = 6;
                } elseif ($totalDays === 1) {
                    $additionalDiscount = 10;
                }
            }

            $totalDiscount = ($product->discount->percentage + $additionalDiscount) / 100;

            $discountedPrice = max($originalPrice - ($originalPrice * $totalDiscount), 0);
    
            return [
                'discount_percent' => $product->discount->percentage + $additionalDiscount,
                'discounted_price' => $discountedPrice
            ];
        } else {
            $additionalDiscount = $product->discount->percentage ?? 0;
            $discountedPrice = max($originalPrice - ($originalPrice * ($additionalDiscount / 100)), 0);
    
            return [
                'discount_percent' => $additionalDiscount,
                'discounted_price' => $discountedPrice
            ];
        }
    }
}
?>
