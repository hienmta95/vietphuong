<?php

namespace Modules\Backend\Http\Controllers;

use App\Tintuc;
use App\Loaitintuc;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class TintucController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tintucs = Tintuc::with(['image', 'loaitintuc'])->orderBy('id', 'desc')->get();
        return view('backend::tintuc.index', ['data' => $tintucs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $loaitintuc = Loaitintuc::all();
        return view('backend::tintuc.create', compact('loaitintuc'));
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
            'loaitintuc_id' => 'required',
            'noidung' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $image_id = 0;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageFile = new ImageFile();
            $image_id = $imageFile->saveImage($file);
        }

        $filters = $request->all();
        $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
        $tintuc = Tintuc::create(array_merge($filters, ['image_id' => $image_id]));

        return redirect()->route('backend.tintuc.show', $tintuc->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $tintuc = Tintuc::with(['image', 'loaitintuc'])->find($id);
        if($tintuc)
            return view('backend::tintuc.show', compact(['tintuc']));
        return redirect()->route('backend.tintuc.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $tintuc = Tintuc::with(['image', 'loaitintuc'])->find($id);
        $loaitintuc = Loaitintuc::all();
        if($tintuc)
            return view('backend::tintuc.update', compact(['tintuc', 'loaitintuc']));
        return redirect()->route('backend.tintuc.index');
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
            'loaitintuc_id' => 'required',
            'noidung' => 'required',
            'description' => 'required'
        ]);
        $tintuc = Tintuc::find($id);

        if($tintuc) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $tintuc->image_id);
            } else {
                $image_id = $request->image_old;
            }

            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $filters['image_id'] = $image_id;
            $tintuc->update($filters);

            return redirect()->route('backend.tintuc.show', $id);
        }
        return redirect()->route('backend.tintuc.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $tintuc = Tintuc::find($id);
        $tintuc->delete();

        return redirect()->route('backend.tintuc.index');
    }

}
