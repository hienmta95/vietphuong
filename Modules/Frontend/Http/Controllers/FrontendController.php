<?php

namespace Modules\Frontend\Http\Controllers;

use App\Hinhanh;
use App\Lienhe;
use App\Loaisanpham;
use App\Nhamay;
use App\Sanpham;
use App\User;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Notifications\ToAdmin;
use App\Notifications\ToUser;
use GMaps;

class FrontendController extends Controller
{

    public function getLienhethanhcong(Request $request)
    {
        return view('frontend::pages.lienhethanhcong');
    }

    public function getLienhe(Request $request)
    {
        $nhamays = Nhamay::orderBy('id', 'desc')->get()->toArray();
        return view('frontend::pages.lienhe', ['nhamays'=>$nhamays]);
    }

    public function postLienhe(Request $request)
    {
        $req = $request->all();
        $create = Lienhe::create($req);
        if($create) {
            $this->sendMailUser($request->email, $request->all());
            $this->sendMailAdmin($request->all());
            return redirect()->route('get.thanhcong');

        }
        return view('frontend::pages.lienhe');
    }

    public function sendMailUser($email, $data)
    {
        $user = new User();
        $user->email = $email;
        $user->notify(new ToUser($data));
    }

    public function sendMailAdmin($data)
    {
        $admin = User::find('1');
        $user = new User();
        $user->email = $admin->emailcongty;
        $user->notify(new ToAdmin($data));
    }

    public function getSearch(Request $request)
    {
        $keyword = $request->keyword;
        $request->flashOnly(['keyword']);
        $key = preg_replace("/[^a-zA-Z0-9]+/", "", $keyword);

        $sanpham = Sanpham::with(['image'])
            ->where('title', 'like', '%'.$key.'%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        $loaisanpham = Loaisanpham::orderBy('id', 'desc')->get();

        return view('frontend::pages.timkiem', compact('sanpham', 'keyword', 'loaisanpham'));
    }

    public function getGoogle(Request $request)
    {
        $loaisanpham = Loaisanpham::orderBy('id', 'desc')->get();

        $config = [];
        $config['center'] = 'Ha noi';
        $config['pointer'] = 'Ha noi';
        $config['zoom'] = '4';
        GMaps::initialize($config);

        $marker['position'] = 'Ha noi';
        $marker['infowindow_content'] = 'Ha noi';

        GMaps::add_marker($marker);

        $map = GMaps::create_map();

        return view('frontend::pages.google', compact( 'map', 'loaisanpham'));
    }

    public function getPage(Request $request)
    {
        $id = $request->id;

        $page = Page::find($id);

        return view('frontend::pages.page', compact('page'));
    }

    public function getHinhanh(Request $request)
    {
        $data = Hinhanh::with(['image'])
            ->where('type', '1')
            ->orderBy('id', 'desc')
            ->get()->toArray();
        return view('frontend::pages.hinhanh', compact('data'));
    }

    public function getVideo(Request $request)
    {
        $data = Hinhanh::where('type', '2')
            ->orderBy('id', 'desc')
            ->get()->toArray();
        return view('frontend::pages.video', compact('data'));
    }

}
