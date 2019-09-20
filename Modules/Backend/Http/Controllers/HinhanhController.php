<?php

namespace Modules\Backend\Http\Controllers;

use App\hinhanh;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class hinhanhController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $hinhanhs = hinhanh::with(['image'])->orderBy('id', 'desc')->get();
        return view('backend::hinhanh.index', ['data' => $hinhanhs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::hinhanh.create');
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
            'type' => 'required'
        ]);

        $image_id = 0;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageFile = new ImageFile();
            $image_id = $imageFile->saveImage($file);
        }

        $filters = $request->all();
        $filters['slug'] = empty($request->slug) ? changeTitle($request->title1 .'-'. $request->title2) : $request->slug;
        $hinhanh = $image_id != 0 ? hinhanh::create(array_merge($filters, ['image_id' => $image_id])) : hinhanh::create($filters);

        return redirect()->route('backend.hinhanh.show', $hinhanh->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $hinhanh = hinhanh::with(['image'])->find($id);
        if($hinhanh)
            return view('backend::hinhanh.show', compact(['hinhanh']));
        return redirect()->route('backend.hinhanh.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $hinhanh = hinhanh::with(['image'])->find($id);
        if($hinhanh)
            return view('backend::hinhanh.update', compact(['hinhanh']));
        return redirect()->route('backend.hinhanh.index');
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
            'type' => 'required'
        ]);
        $hinhanh = hinhanh::find($id);

        if($hinhanh) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $hinhanh->image_id);
            } else {
                $image_id = $request->image_old;
            }

            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title1 .'-'. $request->title2) : $request->slug;
            $filters['image_id'] = $image_id;
            $hinhanh->update($filters);

            return redirect()->route('backend.hinhanh.show', $id);
        }
        return redirect()->route('backend.hinhanh.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $hinhanh = hinhanh::find($id);
            $hinhanh->delete();

        return redirect()->route('backend.hinhanh.index');
    }

}
