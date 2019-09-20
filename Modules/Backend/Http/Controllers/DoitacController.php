<?php

namespace Modules\Backend\Http\Controllers;

use App\Doitac;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class DoitacController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $doitacs = Doitac::with(['image'])->orderBy('id', 'desc')->get();
        return view('backend::doitac.index', ['data' => $doitacs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::doitac.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageFile = new ImageFile();
            $image_id = $imageFile->saveImage($file);
        }

        $doitac = new Doitac();
        $doitac->title = $request->title;
        $doitac->image_id = $image_id;
        $doitac->link = $request->link;
        $doitac->save();

        return redirect()->route('backend.doitac.show', $doitac->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $doitac = Doitac::with(['image'])->find($id);
        if($doitac)
            return view('backend::doitac.show', compact(['doitac']));
        return redirect()->route('backend.doitac.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $doitac = Doitac::with(['image'])->find($id);
        if($doitac)
            return view('backend::doitac.update', compact(['doitac']));
        return redirect()->route('backend.doitac.index');
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

        ]);

        $doitac = Doitac::find($id);

        if($doitac) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $doitac->image_id);
            } else {
                $image_id = $request->image_old;
            }
            $doitac->title = $request->title;
            $doitac->image_id = $image_id;
            $doitac->link = $request->link;
            $doitac->save();

            return view('backend::doitac.show', compact(['doitac']));
        }
        return redirect()->route('backend.doitac.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $doitac = Doitac::find($id);
        $doitac->delete();

        return redirect()->route('backend.doitac.index');
    }

}
