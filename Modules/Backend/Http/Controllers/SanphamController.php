<?php

namespace Modules\Backend\Http\Controllers;

use App\Sanpham;
use App\Loaisanpham;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Backend\Components\ImageFile;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $sanphams = Sanpham::with(['image', 'loaisanpham'])->orderBy('id', 'desc')->get();
        return view('backend::sanpham.index', ['data' => $sanphams]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $loaisanpham = Loaisanpham::all();
        return view('backend::sanpham.create', compact('loaisanpham'));
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
            'loaisanpham_id' => 'required',
            'thanhphan' => 'required',
            'chidinh' => 'required',
            'lieuluong' => 'required',
            'chongchidinh' => 'required',
            'khuyencao' => 'required',
            'trinhbay' => 'required',
            'timhieuthem' => 'required',
            'description' => 'required',
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
        $sanpham = $image_id != 0 ? Sanpham::create(array_merge($filters, ['image_id' => $image_id])) : Sanpham::create($filters);

        return redirect()->route('backend.sanpham.show', $sanpham->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $sanpham = Sanpham::with(['image', 'loaisanpham'])->find($id);
        if($sanpham)
            return view('backend::sanpham.show', compact(['sanpham']));
        return redirect()->route('backend.sanpham.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $sanpham = Sanpham::with(['image', 'loaisanpham'])->find($id);
        $loaisanpham = Loaisanpham::all();
        if($sanpham)
            return view('backend::sanpham.update', compact(['sanpham', 'loaisanpham']));
        return redirect()->route('backend.sanpham.index');
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
            'loaisanpham_id' => 'required',
            'thanhphan' => 'required',
            'chidinh' => 'required',
            'lieuluong' => 'required',
            'chongchidinh' => 'required',
            'khuyencao' => 'required',
            'description' => 'required',
            'trinhbay' => 'required',
            'timhieuthem' => 'required',
        ]);
        $sanpham = Sanpham::find($id);

        if($sanpham) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $imageFile = new ImageFile();
                $image_id = $imageFile->updateImage($file, $sanpham->image_id);
            } else {
                $image_id = $request->image_old;
            }

//            for($i = 1; $i <= 10; $i++) {
//                $cata = 'catalogs'.$i;
//                $active = 'active'.$i;
//
//                if($request->hasFile($cata))
//                {
//                    $file = $request->file($cata);
//                    $name = $file->getClientOriginalName();
//                    $catalogs = str_random(4) . '__' . $name;
//                    while (file_exists("backend/upload/catalogs/".$catalogs)) {
//                        $catalogs = str_random(4) . '__' . $name;
//                    }
//                    $file->move("backend/upload/catalogs",$catalogs);
//                    //unlink("upload/catalogs/".$sukien->catalogs);
//                    $sanpham->$cata = $catalogs;
//                }
//                $sanpham->$active = $request->$active;
//
//            }


            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $filters['image_id'] = $image_id;
            $sanpham->update($filters);

            return redirect()->route('backend.sanpham.show', $id);
        }
        return redirect()->route('backend.sanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $sanpham = Sanpham::find($id);
        $sanpham->delete();

        return redirect()->route('backend.sanpham.index');
    }

}
