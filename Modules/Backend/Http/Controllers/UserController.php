<?php

namespace Modules\Backend\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = User::orderBy('id', 'desc')->get();
        return view('backend::user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:2|max:255|unique:users',
            'password' => 'required|min:6|max:255',
            'email' => 'required|email|unique:users'
        ]);

        $req = $request->all();
        $req['password'] = Hash::make($request->password);

        $user = User::create($req);

        return redirect()->route('backend.user.show', $user->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if($user)
            return view('backend::user.show', compact(['user']));
        return redirect()->route('backend.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if($user)
            return view('backend::user.update', compact(['user']));
        return redirect()->route('backend.user.index');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required',
            'password_new' => 'max:255',
            'password_repeat' => 'same:password_new'
        ]);

        $user = User::find($request->id);

        if($user) {
            $password_new = $request->password_new;
            if(isset($password_new)) {
                $user->password = Hash::make($request->password_new);
            }

            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            return redirect()->route('backend.user.show',  ['id' =>$request->id]);
        }
        return redirect()->route('backend.user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        if($request->id != '1') {
            $user = User::find($request->id);
            $user->delete();
        }
        return redirect()->route('backend.user.index');
    }

    public function getThongtin(Request $request)
    {
        $info = User::where('id', '1')->first();
        return view('backend::thongtin.update', compact('info'));
    }

    public function postThongtin(Request $request)
    {
        $request->validate([
            'tencongty' => 'required',
            'emailcongty' => 'required',
            'diachicongty' => 'required',
            'sdtcongty' => 'required',
        ]);

        $user = User::with(['logoImage'])->where('id', '1')->first();

        $logo_id = 0;
        if ($request->hasFile('logo')) {
            $file_logo = $request->logo;
            $logoFile = new ImageFile();
            $logo_id = $logoFile->saveImage($file_logo);
        } else {
            $logo_id = $request->logo_old;
        }

        $arr = array_merge($request->all(), ['logo'=>$logo_id]);
        $user->update($arr);

        $info = User::where('id', '1')->first();
        return view('backend::thongtin.update', compact('info'));
    }

}
