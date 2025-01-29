<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screen1Record;
use Illuminate\Support\Facades\DB;
use App\Helper\UnsplashHelper;
use App\Helper\ColourBox;

class CodeTestController extends Controller
{
    //

    public function dashboard()
    {
        return view('dashboard');
    }

    public function screen1()
    {
        return view('screen1');
    }

    public function screen1_get_records(Request $request)
    {
        return response()->json(Screen1Record::get_records($request->search));
    }

    public function screen2()
    {
        return view('screen2');
    }

    public function screen2_get_images(Request $request)
    {
        $unsplash = new UnsplashHelper();
        $data = $unsplash->searchImages($request->keywords, $request->page);
        return response()->json($data);
    }

    public function screen3()
    {
        return view('screen3');
    }

    public function screen3_generate_colour_box()
    {
        $colour_box = new ColourBox();
        session(['colour_box' => $colour_box]);
        return response()->json($colour_box);
    }

    public function screen3_click_box(Request $request)
    {
        $colour_box = session('colour_box');
        $colour_box = $colour_box->click_box($request->box_number);
        session(['colour_box' => $colour_box]);
        return response()->json($colour_box->get_colour_box());
    }

    public function screen3_new_colour_box()
    {
        session()->forget('colour_box');
        return response()->json(['success' => true]);
    }
}

