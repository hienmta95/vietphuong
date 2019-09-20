<?php

namespace Modules\Backend\Http\Controllers;

use App\Gioithieu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class gioithieuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $gioithieus = Gioithieu::with(['image'])->orderBy('id', 'desc')->get();
        return view('backend::gioithieu.index', ['data' => $gioithieus]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::gioithieu.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title1' => 'required',
            'title2' => 'required',
            'order' => 'required',
            'description' => 'required',
            'noidung' => 'required',
            'image' => 'required'
        ]);

        $image_id = 0;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageFile = new ImageFile();
            $image_id = $imageFile->saveImage($file);
        }

        $filters = $request->all();
        $filters['slug'] = empty($request->slug) ? changeTitle($request->title1 .'-'. $request->title2) : $request->slug;
        $gioithieu = $image_id != 0 ? Gioithieu::create(array_merge($filters, ['image_id' => $image_id])) : Gioithieu::create($filters);

        return redirect()->route('backend.gioithieu.show', $gioithieu->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $gioithieu = Gioithieu::with(['image'])->find($id);
        if($gioithieu)
            return view('backend::gioithieu.show', compact(['gioithieu']));
        return redirect()->route('backend.gioithieu.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $gioithieu = Gioithieu::with(['image'])->find($id);
        if($gioithieu)
            return view('backend::gioithieu.update', compact(['gioithieu']));
        return redirect()->route('backend.gioithieu.index');
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
            'title1' => 'required',
            'title2' => 'required',
            'order' => 'required',
            'description' => 'required',
            'noidung' => 'required',
        ]);
        $gioithieu = Gioithieu::find($id);

        if($gioithieu) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $gioithieu->image_id);
            } else {
                $image_id = $request->image_old;
            }

            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title1 .'-'. $request->title2) : $request->slug;
            $filters['image_id'] = $image_id;
            $gioithieu->update($filters);

            return redirect()->route('backend.gioithieu.show', $id);
        }
        return redirect()->route('backend.gioithieu.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $gioithieu = Gioithieu::find($id);
        if($gioithieu->order != '1') {
            $gioithieu->delete();
        }

        return redirect()->route('backend.gioithieu.index');
    }

}
