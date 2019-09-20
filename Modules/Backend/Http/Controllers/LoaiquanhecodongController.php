<?php

namespace Modules\Backend\Http\Controllers;

use App\Loaiquanhecodong;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LoaiquanhecodongController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $loaiquanhecodongs = Loaiquanhecodong::orderBy('id', 'desc')->get();
        return view('backend::loaiquanhecodong.index', ['data' => $loaiquanhecodongs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::loaiquanhecodong.create');
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
        $loaiquanhecodong = Loaiquanhecodong::create($filters);

        return redirect()->route('backend.loaiquanhecodong.show', $loaiquanhecodong->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $loaiquanhecodong = Loaiquanhecodong::find($id);
        if($loaiquanhecodong)
            return view('backend::loaiquanhecodong.show', compact(['loaiquanhecodong']));
        return redirect()->route('backend.loaiquanhecodong.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $loaiquanhecodong = Loaiquanhecodong::find($id);
        if($loaiquanhecodong)
            return view('backend::loaiquanhecodong.update', compact(['loaiquanhecodong']));
        return redirect()->route('backend.loaiquanhecodong.index');
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

        $loaiquanhecodong = Loaiquanhecodong::find($id);

        if($loaiquanhecodong) {
            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $loaiquanhecodong->update($filters);

            return view('backend::loaiquanhecodong.show', compact(['loaiquanhecodong']));
        }
        return redirect()->route('backend.loaiquanhecodong.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $loaiquanhecodong = Loaiquanhecodong::find($id);
        $loaiquanhecodong->delete();

        return redirect()->route('backend.loaiquanhecodong.index');
    }

}
