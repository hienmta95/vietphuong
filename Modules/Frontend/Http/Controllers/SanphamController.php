<?php

namespace Modules\Frontend\Http\Controllers;

use App\Loaisanpham;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Sanpham;

class SanphamController extends Controller
{

    public function getList(Request $request)
    {
        $sanpham = Sanpham::with(['image'])
            ->orderBy('id', 'desc')
            ->paginate(5);

        $loaisanpham = Loaisanpham::orderBy('id', 'desc')->get();

        return view('frontend::pages.sanphamall', compact(['sanpham', 'loaisanpham']));
    }

    public function getLoaisanpham(Request $request)
    {
        $id = $request->id;
        $sanpham = Sanpham::with(['image'])
            ->where('loaisanpham_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(5);

        $loaisp = Loaisanpham::find($id);
        $loaisanpham = Loaisanpham::orderBy('id', 'desc')->get();

        return view('frontend::pages.loaisanpham', compact(['sanpham', 'loaisanpham', 'loaisp']));
    }

    public function getSanpham(Request $request)
    {
        $id = $request->id;

        $sanpham = Sanpham::with(['image', 'loaisanpham'])->find($id);
        $loaisanpham = Loaisanpham::orderBy('id', 'desc')->get();

        return view('frontend::pages.sanpham', compact(['sanpham', 'loaisanpham']));
    }

}
