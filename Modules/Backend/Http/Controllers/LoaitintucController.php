<?php

namespace Modules\Backend\Http\Controllers;

use App\Loaitintuc;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LoaitintucController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $loaitintucs = Loaitintuc::orderBy('id', 'desc')->get();
        return view('backend::loaitintuc.index', ['data' => $loaitintucs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::loaitintuc.create');
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
        $loaitintuc = Loaitintuc::create($filters);

        return redirect()->route('backend.loaitintuc.show', $loaitintuc->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $loaitintuc = Loaitintuc::find($id);
        if($loaitintuc)
            return view('backend::loaitintuc.show', compact(['loaitintuc']));
        return redirect()->route('backend.loaitintuc.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $loaitintuc = Loaitintuc::find($id);
        if($loaitintuc)
            return view('backend::loaitintuc.update', compact(['loaitintuc']));
        return redirect()->route('backend.loaitintuc.index');
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

        $loaitintuc = Loaitintuc::find($id);

        if($loaitintuc) {
            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $loaitintuc->update($filters);

            return view('backend::loaitintuc.show', compact(['loaitintuc']));
        }
        return redirect()->route('backend.loaitintuc.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $loaitintuc = Loaitintuc::find($id);
        if($loaitintuc->id != 3 && $loaitintuc->id != 1) {
            $loaitintuc->delete();
        }

        return redirect()->route('backend.loaitintuc.index');
    }

}
