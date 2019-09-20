<?php

namespace Modules\Backend\Http\Controllers;

use App\Quanhecodong;
use App\Loaiquanhecodong;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class QuanhecodongController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $quanhecodongs = Quanhecodong::with(['image', 'loaiquanhecodong'])->orderBy('id', 'desc')->get();
        return view('backend::quanhecodong.index', ['data' => $quanhecodongs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $loaiquanhecodong = Loaiquanhecodong::all();
        return view('backend::quanhecodong.create', compact('loaiquanhecodong'));
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
            'loaiquanhecodong_id' => 'required',
            'noidung' => 'required',
            'image' => 'required'
        ]);

        $image_id = 0;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageFile = new ImageFile();
            $image_id = $imageFile->saveImage($file);
        }

//        $catas = [];
//        for($i = 1; $i <= 10; $i++) {
//            $cata = 'catalogs' . $i;
//            $active = 'active' . $i;
//
//            if($request->hasFile($cata))
//            {
//                $file = $request->file($cata);
//
//                $name = $file->getClientOriginalName();
//                $catalogues = str_random(4)."__".$name;
//                while(file_exists("backend/upload/catalogs/". $catalogues));
//                {
//                    $catalogues = str_random(4)."__".$name;
//                }
//                $file->move("backend/upload/catalogs/", $catalogues);
//                $catas[$cata] = $catalogues;
//            }
//            else
//            {
//                $catas[$cata] = '';
//            }
//
//            $catas[$active] =  $request->$active;;
//        }

        $filters = $request->all();
        $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
        $quanhecodong = $image_id != 0 ? Quanhecodong::create(array_merge($filters, ['image_id' => $image_id])) : Quanhecodong::create($filters);

        return redirect()->route('backend.quanhecodong.show', $quanhecodong->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $quanhecodong = Quanhecodong::with(['image', 'loaiquanhecodong'])->find($id);
        if($quanhecodong)
            return view('backend::quanhecodong.show', compact(['quanhecodong']));
        return redirect()->route('backend.quanhecodong.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $quanhecodong = Quanhecodong::with(['image', 'loaiquanhecodong'])->find($id);
        $loaiquanhecodong = Loaiquanhecodong::all();
        if($quanhecodong)
            return view('backend::quanhecodong.update', compact(['quanhecodong', 'loaiquanhecodong']));
        return redirect()->route('backend.quanhecodong.index');
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
            'loaiquanhecodong_id' => 'required',
            'noidung' => 'required',
        ]);
        $quanhecodong = Quanhecodong::find($id);

        if($quanhecodong) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $quanhecodong->image_id);
            } else {
                $image_id = $request->image_old;
            }

            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $filters['image_id'] = $image_id;
            $quanhecodong = $quanhecodong->update($filters);

            return redirect()->route('backend.quanhecodong.show', $id);
        }
        return redirect()->route('backend.quanhecodong.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $quanhecodong = Quanhecodong::find($id);
        $quanhecodong->delete();

        return redirect()->route('backend.quanhecodong.index');
    }

}
