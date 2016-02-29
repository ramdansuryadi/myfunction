<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tampil;

class TampilController extends Controller
{


	 public function __construct() {
    
        $this->tampil = Tampil::all(array('id','part_name'));
    }


     public function show()
    {
         return view('tampil', array('tampil' => $this->tampil));
    }

   public function upload()
    {





    if (Request::isMethod('post')) {
        $product_id = Request::get('part_name');
        $product = Tampil::find($product_id);
        Cart::add(array('id' => $product_id));
    }

    $cart = Cart::content();

    return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));







    }



}




