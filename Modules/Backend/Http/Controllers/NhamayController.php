<?php

namespace Modules\Backend\Http\Controllers;

use App\Nhamay;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class NhamayController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $nhamays = Nhamay::orderBy('id', 'desc')->get();
        return view('backend::nhamay.index', ['data' => $nhamays]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        return view('backend::nhamay.create');
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
            'address' => 'required',
            'email' => 'required',
            'type' => 'required'
        ]);

        $filters = $request->all();
        $nhamay = Nhamay::create($filters);

        return redirect()->route('backend.nhamay.show', $nhamay->id);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $nhamay = Nhamay::find($id);
        if($nhamay)
            return view('backend::nhamay.show', compact(['nhamay']));
        return redirect()->route('backend.nhamay.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $nhamay = Nhamay::find($id);
        if($nhamay)
            return view('backend::nhamay.update', compact(['nhamay']));
        return redirect()->route('backend.nhamay.index');
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
            'address' => 'required',
            'email' => 'required',
            'type' => 'required'
        ]);

        $nhamay = Nhamay::find($id);

        if($nhamay) {
            $filters = $request->all();
            $nhamay->update($filters);

            return view('backend::nhamay.show', compact(['nhamay']));
        }
        return redirect()->route('backend.nhamay.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $nhamay = Nhamay::find($id);
        $nhamay->delete();

        return redirect()->route('backend.nhamay.index');
    }

}
