<?php

namespace Modules\Backend\Http\Controllers;

use App\Lienhe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LienheController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Lienhe::orderBy('id', 'desc')->get();
        return view('backend::lienhe.index', ['data' => $data]);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::lienhe.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hoten' => 'required',
            'didong' => 'required',
            'email' => 'required',
            'noidung' => 'required',
        ]);

        $req = $request->all();
        $lienhe = Lienhe::create($req);

        return redirect()->route('backend.lienhe.show', $lienhe->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $lienhe = Lienhe::find($id);
        if($lienhe)
            return view('backend::lienhe.show', compact(['lienhe']));
        return redirect()->route('backend.lienhe.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $lienhe = Lienhe::find($id);
        if($lienhe)
            return view('backend::lienhe.update', compact(['lienhe']));
        return redirect()->route('backend.lienhe.index');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $request->validate([
        ]);

        $lienhe = Lienhe::find($request->id);
        if($lienhe) {
            $lienhe->trangthai = $request->trangthai;
            $lienhe->save();

            return redirect()->route('backend.lienhe.show',  ['id' =>$request->id]);
        }
        return redirect()->route('backend.lienhe.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $lienhe = Lienhe::find($request->id);
        $lienhe->delete();

        return redirect()->route('backend.lienhe.index');
    }

}
