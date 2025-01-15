<?php


namespace App\Http\View\Composers;

use App\Models\Beauty;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $beautyId = array_keys($carts);
        $beauties = Beauty::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $beautyId)
            ->get();

        $view->with('beauties', $beauties);
    }
}