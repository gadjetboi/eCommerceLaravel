<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Models\Brand;
use Illuminate\View\View;

class CommonComposer
{
    public function __construct()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['globalCategories' =>$this->categories,
                     'globalBrands' => $this->brands]);
    }
}