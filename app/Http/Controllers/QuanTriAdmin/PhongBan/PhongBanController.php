<?php

namespace App\Http\Controllers\QuanTriAdmin\PhongBan;

use App\Http\Controllers\Controller;
use App\Entity\phongban;
use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongban = phongban::all();
        return view('admin.QuanTriAdmin.PhongBan.PhongBan.quanLyPhongBan', ['phongban' => $phongban]);
    }

    public function create()
    {
        $phongban = phongban::all();
        return view('admin.QuanTriAdmin.PhongBan.PhongBan.addPhongBan', ['phongban' => $phongban]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phongban = new phongban;
        $phongban->name = $request->name;
        $phongban->save();
        return redirect('/phongban/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $phongban = phongban::find($id);
        return view('admin.QuanTriAdmin.PhongBan.PhongBan.updatePhongBan', ['phongban' => $phongban]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phongban = phongban::find($id);
        $phongban->name = $request->name;
        $phongban->save();
        return redirect('/phongban/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phongban = phongban::find($id);
        $phongban->delete();
        return redirect('/phongban/index');
    }
}
