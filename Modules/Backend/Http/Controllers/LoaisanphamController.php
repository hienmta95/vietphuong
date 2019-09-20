<?php

namespace Modules\Backend\Http\Controllers;

use App\Loaisanpham;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LoaisanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $loaisanphams = Loaisanpham::orderBy('id', 'desc')->get();
        return view('backend::loaisanpham.index', ['data' => $loaisanphams]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::loaisanpham.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $filters = $request->all();
        $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
        $loaisanpham = Loaisanpham::create($filters);

        return redirect()->route('backend.loaisanpham.show', $loaisanpham->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $loaisanpham = Loaisanpham::find($id);
        if($loaisanpham)
            return view('backend::loaisanpham.show', compact(['loaisanpham']));
        return redirect()->route('backend.loaisanpham.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $loaisanpham = Loaisanpham::find($id);
        if($loaisanpham)
            return view('backend::loaisanpham.update', compact(['loaisanpham']));
        return redirect()->route('backend.loaisanpham.index');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'title' => 'required'
        ]);

        $loaisanpham = Loaisanpham::find($id);

        if($loaisanpham) {
            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $loaisanpham->update($filters);

            return view('backend::loaisanpham.show', compact(['loaisanpham']));
        }
        return redirect()->route('backend.loaisanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $loaisanpham = Loaisanpham::find($id);
        $loaisanpham->delete();

        return redirect()->route('backend.loaisanpham.index');
    }

}
