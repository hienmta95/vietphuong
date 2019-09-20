<?php

namespace Modules\Frontend\Http\Controllers;

use App\Doitac;
use App\Gioithieu;
use App\Quanhecodong;
use App\Sanpham;
use App\Tuyendung;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Slide;
use App\Tintuc;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $slide = Slide::with(['image'])->where('active', '1')
            ->orderBy('id', 'desc')->limit(10)->get()->toArray();

        $tintuc = Tintuc::with(['image'])->where('loaitintuc_id', '!=', '3')
            ->orderBy('id', 'desc')->limit(3)->get()->toArray();

        $gioithieu = Gioithieu::with(['image'])
            ->where('order', '1')->first()->toArray();

        $sanpham = Sanpham::with(['image'])
            ->orderBy('id', 'desc')->limit(10)->get()->toArray();

        $tuyendung = Tuyendung::with(['image'])
            ->orderBy('id', 'desc')->limit(2)->get()->toArray();

        $quanhecodong = Quanhecodong::with(['image'])
            ->orderBy('id', 'desc')->limit(2)->get()->toArray();

        $doitac = Doitac::with(['image'])
            ->orderBy('id', 'desc')->get()->toArray();

        return view('frontend::pages.trangchu', compact(['slide', 'tintuc', 'gioithieu', 'sanpham', 'tuyendung', 'quanhecodong', 'doitac']));
    }

}
