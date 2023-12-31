<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() 
    {
        return view('home.index.index');
    }
    
    public function categories($type)
    {
        return view('home.product.categories');
    }

    public function cart()
    {
        return view('home.cart.cart');
    }

    public function checkoutSuccess()
    {

        return view('home.checkout.check-out-success');
    }

    public function orderHistory()
    {
        return view('home.order history.order-histories');
    }



    public function services()
    {
        return view('home.service.service');
    }

    public function redirect()
    {
        if (Auth::user() != null)
        {
            $usertype = Auth::user()->usertype;
        if ($usertype == '1')
        {
            return view('admin.home');
        }
        else
        {
            $productsSale = Product::where('showHome', 'Yes')
            ->where('is_featured', 1)
            ->whereNotNull('promotion_id')
            ->with('promotion')
            ->with('images')
            ->get();                   

            return view('home.index.index', compact('productsSale'));
            
        }
     }
    }
}
