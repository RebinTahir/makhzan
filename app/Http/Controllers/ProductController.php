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
        
        $sellkartonprice = request()->has('sellkartonprice') ? request()->sellkartonprice : '';
        $selldarzanprice = request()->has('selldarzanprice') ? request()->selldarzanprice : '';
        $sellnewdarzanprice = request()->has('sellnewdarzanprice') ? request()->sellnewdarzanprice : '';
        $selldanaprice = request()->has('selldanaprice') ? request()->selldanaprice : '';
       

        if (strlen($name) < 0 || strlen($name) > 75 || strlen($note) > 100) {
            return false;
        }
        $product->name = $name;
        $product->note = $note;

        $product->sellkartonprice = $sellkartonprice;
        $product->selldarzanprice = $selldarzanprice;
        $product->sellnewdarzanprice = $sellnewdarzanprice;
        $product->selldanaprice = $selldanaprice;
        $product->user_id = Auth::user()->id;
        $product->save();
        return true;
    }

    public function sellupdate()
    {
        $pid = request()->has('pid') ? request()->has('pid') : '0';
        $type = request()->has('type') ? request()->has('type') : '0';
        $amount = request()->has('amount') ? request()->has('amount') : '0';
        if ($pid == '0' || $type == '0' || $amount <=0 || $amount == "") {
            return false;
        }

        $product = Product::find($pid);

        switch ($type) {
            case "karton":if($product->sellkarton > 0){$product->sellkarton = $product->sellkarton  +$amount;} ;break;
            case "darzan":if($product->sellkarton > 0){ $product->selldarzan = $product->selldarzan  + $amount; };break;
            case "newdarzan":if($product->sellnewdarzan > 0){ $product->sellnewdarzan = $product->sellnewdarzan  + $amount;} ;break;
            default: if($product->selldana > 0){$product->selldana = $product->selldana  + $amount;} ;break;
        }
$product->save();
return true;
    }

    public function buyupdate()
    {
        $pid = request()->has('pid') ? request()->has('pid') : '0';
        $type = request()->has('type') ? request()->has('type') : '0';
        $amount = request()->has('amount') ? request()->has('amount') : '0';

        if ($pid == '0' || $type == '0' || $amount <=0 || $amount == "") {
            return false;
        }

        $product = Product::find($pid);

        switch ($type) {
            case "karton":if($product->buykarton > 0){ $product->buykarton = $product->buykarton  + $amount ;};break;
            case "darzan":if($product->buykarton > 0){ $product->buydarzan12 = $product->buydarzan  + $amount;} ;break;
            case "newdarzan": if($product->buykarton > 0){$product->buynewdarzan = $product->buynewdarzan  + $amount;} ;break;
            default: if($product->buykarton > 0){$product->buydana = $product->buydana  + $amount ;};break;
        }
        $product->save();
return true;
    }
}
