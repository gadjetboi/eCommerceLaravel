<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCartRequest;
use Config;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->session()->flush();
        $requestSession = $request->session();
        $productsOnCart = [];

        if(!$requestSession->has(Config::get('constants.SESSIONS.CART'))) 
        {
            return view('cart', ['productsOnCart' => $productsOnCart]);
        }  
       
        foreach($requestSession->get(Config::get('constants.SESSIONS.CART')) as $cart)
        {
            $product = Product::find($cart->product_id);

            array_push($productsOnCart, $product);
        }
      
        return view('cart', ['productsOnCart' => $productsOnCart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreCartRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestSession = $request->session();
      
        if(!$requestSession->has(Config::get('constants.SESSIONS.CART'))) 
        {  
            $cartObject = array(
                (object) array("product_id" => $request->product_id, "quantity" => $request->quantity)
            );

            $requestSession->put(Config::get('constants.SESSIONS.CART'), $cartObject);
          
            return redirect()->route('cart.index');
        };

        $existingCarts = $requestSession->get(Config::get('constants.SESSIONS.CART'));

        $isProductExist = false;
        $index = 0;
        foreach ( $existingCarts as $existingCart ) 
        {
            if ( $existingCart->product_id == $request->product_id ) 
            {   
                $existingCarts[$index]->quantity += 1;
               
                $isProductExist = true;

                break;
            }
            $index++;
        }
       
        if($isProductExist)
        {
            $requestSession->put(Config::get('constants.SESSIONS.CART'), $existingCarts);
           
            return redirect()->route('cart.index');
        }

        array_push($existingCarts, (object) array("product_id" => $request->product_id, "quantity" => 1));

        $requestSession->put(Config::get('constants.SESSIONS.CART'), $existingCarts);

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $requestSession = $request->session();
       
        if(!$requestSession->has(Config::get('constants.SESSIONS.CART'))) 
        {  
            return redirect()->route('cart.index');
        };

        if(is_null($request->position_id))
        {
            return redirect()->route('cart.index');
        }

        $existingCarts = $requestSession->get(Config::get('constants.SESSIONS.CART'));
    
        array_splice($existingCarts, $request->position_id, 1);
    
        $requestSession->put(Config::get('constants.SESSIONS.CART'), $existingCarts);
        
        return redirect()->route('cart.index');
    }
}

//echo '<pre>' . var_export($cart->product_id, true) . '</pre>'; //TODO: save in service for global use.
