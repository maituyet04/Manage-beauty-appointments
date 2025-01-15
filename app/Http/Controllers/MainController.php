<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Beauty\BeautyService;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $beauty;

    public function __construct(SliderService $slider, MenuService $menu,
        BeautyService $beauty)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->beauty = $beauty;
    }

    public function index()
    {
        return view('main', [
            'title' => 'Booking Beauty',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'beauties' => $this->beauty->get()
        ]);
    }

    public function loadBeauty(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->beauty->get($page);
        if (count($result) != 0) {
            $html = view('beauties.list', ['beauties' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}