<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create()
    {
        $product = new Product();
        $name = request()->has('name') ? request()->name : '';
        $note = request()->has('note') ? request()->note : '';

        if (count($name) < 0 || count($name) > 75 || count($note) > 100) {
            return false;
        }
        $product->name = $name;
        $product->note = $note;
        $product->user_id = Auth::user()->id;
        $product->save();
        return true;
    }

    public function sellupdate()
    {
        $pid = request()->has('pid') ? request()->has('pid') : '0';
        $type = request()->has('type') ? request()->has('type') : '0';
        if ($pid == '0' || $type == '0') {
            return false;
        }

        $product = Product::find($pid);

        switch ($type) {
            case "karton": $product->sellkarton = $product->sellkarton  + 1 ;break;
            case "darzan12": $product->selldarzan12 = $product->selldarzan12  + 1 ;break;
            case "darzan10": $product->selldarzan10 = $product->selldarzan10  + 1 ;break;
            case "newdarzan": $product->sellnewdarzan = $product->sellnewdarzan  + 1 ;break;
            case "default": $product->selldana = $product->selldana  + 1 ;break;
        }
$product->save();
return true;
    }

    public function buyupdate()
    {
        $pid = request()->has('pid') ? request()->has('pid') : '0';
        $type = request()->has('type') ? request()->has('type') : '0';
        if ($pid == '0' || $type == '0') {
            return false;
        }

        $product = Product::find($pid);

        switch ($type) {
            case "karton": $product->sellkarton = $product->sellkarton  + 1 ;break;
            case "darzan12": $product->selldarzan12 = $product->selldarzan12  + 1 ;break;
            case "darzan10": $product->selldarzan10 = $product->selldarzan10  + 1 ;break;
            case "newdarzan": $product->sellnewdarzan = $product->sellnewdarzan  + 1 ;break;
            case "default": $product->selldana = $product->selldana  + 1 ;break;
        }
        $product->save();
return true;
    }
}
