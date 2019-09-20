<?php

namespace Modules\Backend\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $menus = Menu::with(['parent'])->orderBy('id', 'desc')->get();
        return view('backend::menu.index', ['data'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $menus = Menu::orderBy('id', 'desc')->get();
        return view('backend::menu.create', ['menus'=>$menus]);
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
            'order' => 'required'
        ]);

        $menu = Menu::create($request->all());
        return redirect()->route('backend.menu.show', $menu->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $menu = Menu::find($id);
        if($menu)
            return view('backend::menu.show', compact(['menu']));
        return redirect()->route('backend.menu.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $menu = Menu::find($id);
        $menus = Menu::where('id', '!=', $menu->id)->orderBy('id', 'desc')->get();
        if($menu)
            return view('backend::menu.update', compact(['menu', 'menus']));
        return redirect()->route('backend.menu.index');
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
            'order' => 'required',
        ]);

        $menu = Menu::findOrFail($id);

        if($menu) {
            $menu->update($request->all());

            return view('backend::menu.show', compact(['menu']));
        }
        return redirect()->route('backend.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('backend.menu.index');
    }

}
