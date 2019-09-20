<?php

namespace Modules\Frontend\Http\Controllers;

use App\Hethongphanphoi;
use App\Tuvan;
use App\Tuyendung;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Gioithieu;

class PageController extends Controller
{
    public function getGioithieuList(Request $request){
        $items = Gioithieu::with(['image'])
            ->where('order', '!=', '1')
            ->orderBy('order', 'asc')
            ->get()->toArray();

        return view('frontend::pages.gioithieu', compact(['items']));
    }

    public function getGioithieu(Request $request){
        $id = $request->id;
        $gioithieu = Gioithieu::with(['image'])
            ->find($id);

        return view('frontend::pages.chitietgioithieu', compact(['gioithieu']));
    }

    public function getHethongphanphoi(Request $request)
    {
        $id = $request->id;
        $hethongphanphoi = Hethongphanphoi::find($id);
        $hethongphanphoilist = Hethongphanphoi::orderBy('id', 'desc')->get()->toArray();

        return view('frontend::pages.hethongphanphoi', compact(['hethongphanphoi', 'hethongphanphoilist']));
    }

    public function getTuyendunglist(Request $request)
    {
        $tuyendunglist = Tuyendung::orderBy('id', 'desc')->paginate(10);
        return view('frontend::pages.tuyendung', compact(['tuyendunglist']));
    }

    public function getTuyendung(Request $request)
    {
        $id = $request->id;
        $tuyendung = Tuyendung::find($id);
        return view('frontend::pages.chitiettuyendung', compact(['tuyendung']));
    }

    public function getTuvanlist(Request $request)
    {
        $tuvanlist = Tuvan::with(['image'])->orderBy('id', 'desc')->paginate(10);
        return view('frontend::pages.tuvan', compact(['tuvanlist']));
    }

    public function getTuvan(Request $request)
    {
        $id = $request->id;
        $tuvan = Tuvan::with(['image'])->find($id);
        return view('frontend::pages.chitiettuvan', compact(['tuvan']));
    }

}
