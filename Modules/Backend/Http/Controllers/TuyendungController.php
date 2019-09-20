<?php

namespace Modules\Backend\Http\Controllers;

use App\Tuyendung;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class TuyendungController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tuyendungs = Tuyendung::with(['image'])->orderBy('id', 'desc')->get();
        return view('backend::tuyendung.index', ['data' => $tuyendungs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::tuyendung.create');
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
            'noidung' => 'required'
        ]);

        $image_id = 0;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageFile = new ImageFile();
            $image_id = $imageFile->saveImage($file);
        }

        $filters = $request->all();
        $filters['image_id'] = $image_id;
        $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
        $tuyendung = Tuyendung::create($filters);

        return redirect()->route('backend.tuyendung.show', $tuyendung->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $tuyendung = Tuyendung::with(['image'])->find($id);
        if($tuyendung)
            return view('backend::tuyendung.show', compact(['tuyendung']));
        return redirect()->route('backend.tuyendung.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $tuyendung = Tuyendung::with(['image'])->find($id);
        if($tuyendung)
            return view('backend::tuyendung.update', compact(['tuyendung']));
        return redirect()->route('backend.tuyendung.index');
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
            'noidung' => 'required'
        ]);

        $tuyendung = Tuyendung::find($id);

        if($tuyendung) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $tuyendung->image_id);
            } else {
                $image_id = $request->image_old;
            }

            $filters = $request->all();
            $filters['image_id'] = $image_id;
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $tuyendung->update($filters);

            return view('backend::tuyendung.show', compact(['tuyendung']));
        }
        return redirect()->route('backend.tuyendung.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $tuyendung = Tuyendung::find($id);
        $tuyendung->delete();

        return redirect()->route('backend.tuyendung.index');
    }

}
