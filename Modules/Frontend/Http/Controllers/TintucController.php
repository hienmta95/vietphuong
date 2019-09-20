<?php

namespace Modules\Frontend\Http\Controllers;

use App\Loaiquanhecodong;
use App\Loaitintuc;
use App\Quanhecodong;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Tintuc;

class TintucController extends Controller
{

    public function getLoaitintuc(Request $request)
    {
        $id = $request->id;
        $tintuc = Tintuc::with(['image'])
            ->where('loaitintuc_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(5);

        $loaitin = Loaitintuc::find($id);
        $loaitintuc = Loaitintuc::orderBy('id', 'desc')->get();

        return view('frontend::pages.loaitintuc', compact(['tintuc', 'loaitintuc', 'loaitin']));
    }

    public function getTintuc(Request $request)
    {
        $id = $request->id;

        $tintuc = Tintuc::with(['image', 'loaitintuc'])->find($id);
        $lienquan = Tintuc::where('loaitintuc_id', $tintuc['loaitintuc_id'])
            ->where('id', '!=', $tintuc['id'])
            ->orderBy('id', 'desc')->limit(3)->get()->toArray();
        $loaitintuc = Loaitintuc::orderBy('id', 'desc')->get();

        return view('frontend::pages.tintuc', compact(['tintuc', 'loaitintuc', 'lienquan']));
    }

    public function getQuanhecodong(Request $request)
    {
        $id = $request->id;
        $codongs = Quanhecodong::where('loaiquanhecodong_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(5);

        $quanhe = Loaiquanhecodong::find($id);
        $quanhecodong = Loaiquanhecodong::orderBy('id', 'desc')->get();

        return view('frontend::pages.loaiquanhecodong', compact(['codongs', 'quanhe', 'quanhecodong']));
    }

    public function getCodong(Request $request)
    {
        $id = $request->id;
        $quanhe = Quanhecodong::with(['image', 'loaiquanhecodong'])->find($id);
        $quanhecodong = Loaiquanhecodong::orderBy('id', 'desc')->get();

        return view('frontend::pages.quanhecodong', compact(['quanhe', 'quanhecodong']));
    }

}
