<?php

namespace Modules\Backend\Http\Controllers;

use App\Hethongphanphoi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HethongphanphoiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $hethongphanphois = Hethongphanphoi::orderBy('id', 'desc')->get();
        return view('backend::hethongphanphoi.index', ['data' => $hethongphanphois]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::hethongphanphoi.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'maps' => 'required'
        ]);

        $filters = $request->all();
        $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
        $hethongphanphoi = Hethongphanphoi::create($filters);

        return redirect()->route('backend.hethongphanphoi.show', $hethongphanphoi->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $hethongphanphoi = Hethongphanphoi::find($id);
        if($hethongphanphoi)
            return view('backend::hethongphanphoi.show', compact(['hethongphanphoi']));
        return redirect()->route('backend.hethongphanphoi.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $hethongphanphoi = Hethongphanphoi::find($id);
        if($hethongphanphoi)
            return view('backend::hethongphanphoi.update', compact(['hethongphanphoi']));
        return redirect()->route('backend.hethongphanphoi.index');
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
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'maps' => 'required'

        ]);

        $hethongphanphoi = Hethongphanphoi::find($id);

        if($hethongphanphoi) {
            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $hethongphanphoi->update($filters);

            return view('backend::hethongphanphoi.show', compact(['hethongphanphoi']));
        }
        return redirect()->route('backend.hethongphanphoi.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        if($id != '1') {
            $hethongphanphoi = Hethongphanphoi::find($id);
            $hethongphanphoi->delete();
        }

        return redirect()->route('backend.hethongphanphoi.index');
    }

}
