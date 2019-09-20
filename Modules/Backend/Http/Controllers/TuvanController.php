<?php

namespace Modules\Backend\Http\Controllers;

use App\Tuvan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class TuvanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tuvans = Tuvan::with(['image'])->orderBy('id', 'desc')->get();
        return view('backend::tuvan.index', ['data' => $tuvans]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::tuvan.create');
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
            'description' => 'required',
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
        $tuvan = Tuvan::create($filters);

        return redirect()->route('backend.tuvan.show', $tuvan->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $tuvan = Tuvan::with(['image'])->find($id);
        if($tuvan)
            return view('backend::tuvan.show', compact(['tuvan']));
        return redirect()->route('backend.tuvan.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $tuvan = Tuvan::with(['image'])->find($id);
        if($tuvan)
            return view('backend::tuvan.update', compact(['tuvan']));
        return redirect()->route('backend.tuvan.index');
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
            'description' => 'required',
            'noidung' => 'required'
        ]);

        $tuvan = Tuvan::find($id);

        if($tuvan) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $tuvan->image_id);
            } else {
                $image_id = $request->image_old;
            }

            $filters = $request->all();
            $filters['image_id'] = $image_id;
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $tuvan->update($filters);

            return view('backend::tuvan.show', compact(['tuvan']));
        }
        return redirect()->route('backend.tuvan.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $tuvan = Tuvan::find($id);
        $tuvan->delete();

        return redirect()->route('backend.tuvan.index');
    }

}
