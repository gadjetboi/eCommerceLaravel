<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

use Facades\App\Library\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $filter, $id)
    {   
        //dd($request->session()->get('session_name'));
       
        if($filter == 'category')
        {
            $brand_category = BrandCategory::find($id);

            $products = $brand_category->products;
            
            $selectedBrand = Brand::find($brand_category->brand_id);
    
            $selectedCategory = Category::find($brand_category->category_id);
        }
        else if($filter == 'brand') 
        {
            $brand = Brand::find($id);

            $products = $brand->products;

            $selectedBrand = $brand;
            
            $selectedCategory = null;
        }
        
        return view('product',['products' => $products, 
                               'selectedBrand' => $selectedBrand,
                               'selectedCategory' => $selectedCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
