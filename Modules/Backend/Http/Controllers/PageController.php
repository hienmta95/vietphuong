<?php

namespace Modules\Backend\Http\Controllers;

use Auth;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->get();
        return view('backend::page.index', ['data' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::page.create');
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

        $req = $request->all();
        $req['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
        $page = Page::create($req);

        return redirect()->route('backend.page.show', $page->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $page = Page::find($id);
        if($page)
            return view('backend::page.show', compact(['page']));
        return redirect()->route('backend.page.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $page = Page::find($id);
        if($page)
            return view('backend::page.update', compact(['page']));
        return redirect()->route('backend.page.index');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'noidung' => 'required',
        ]);

        $page = Page::find($request->id);

        if($page) {
            $filters = $request->all();
            $filters['slug'] = empty($request->slug) ? changeTitle($request->title) : $request->slug;
            $page->update($filters);

            return redirect()->route('backend.page.show',  ['id' =>$request->id]);
        }
        return redirect()->route('backend.page.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $nhamay = Page::find($id);
        $nhamay->delete();

        return redirect()->route('backend.page.index');
    }

}
