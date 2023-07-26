<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use DateTime;

class DashbordController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::has('product')->get();
    //     return view('dash', compact('categories'));
    // }

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

        return view('dash', compact('discountedProducts'));
    }

    private function calculateComplexDiscountBasedOnExpiry($productId)
    {
        // Retrieve product details from the 'products' table
        $product = Product::find($productId);

        if (!$product) {
            return null; // Product not found
        }

        // Get the original price and expiry date from the product
        $originalPrice = $product->price;
        $expiryDate = $product->discount->expiry_date ?? null;
        $maxDiscountPercent = 30;

        if ($expiryDate) {
            $expiryDateTime = new DateTime($expiryDate);
            $currentDate = new DateTime();

            // Calculate the total days until expiry
            $totalDays = $currentDate->diff($expiryDateTime)->days;

            $discountFactor = 1 - ($totalDays / ($totalDays + 10));

            $discountPercent = $maxDiscountPercent * $discountFactor;
            $discountPercent = min($discountPercent, $maxDiscountPercent);

            // Calculate the expiry-based discount
            $expiryBasedDiscount = $originalPrice * ($discountPercent / 100);

            // Retrieve the additional discount percentage from the 'discounts' table
            $additionalDiscount = $product->discount->percentage ?? 0;

            // Calculate the additional discount
            $additionalDiscountAmount = $originalPrice * ($additionalDiscount / 100);

            // Calculate the combined discount
            $totalDiscount = $expiryBasedDiscount + $additionalDiscountAmount;

            // Calculate the final discounted price
            $discountedPrice = $originalPrice - $totalDiscount;

            return [
                'discount_percent' => $discountPercent + $additionalDiscount,
                'discounted_price' => $discountedPrice
            ];
        } else {
            // No expiry date, only apply the additional discount if available
            $additionalDiscount = $product->discount->percentage ?? 0;
            $discountedPrice = $originalPrice - ($originalPrice * ($additionalDiscount / 100));

            return [
                'discount_percent' => $additionalDiscount,
                'discounted_price' => $discountedPrice
            ];
        }
    }
}
?>
