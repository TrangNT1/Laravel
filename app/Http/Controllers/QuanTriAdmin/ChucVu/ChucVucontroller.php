<?php

namespace App\Http\Controllers\QuanTriAdmin\ChucVu;

use App\Http\Controllers\Controller;
use App\Entity\chucvu;
use Illuminate\Http\Request;

class ChucVucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chucvu = chucvu::all();
        return view('admin.QuanTriAdmin.ChucVu.ChucVu.quanLyChucVu', ['chucvu' => $chucvu]);
    }

    public function create()
    {
        $chucvu = chucvu::all();
        return view('admin.QuanTriAdmin.ChucVu.ChucVu.addChucVu', ['chucvu' => $chucvu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chucvu = new chucvu;
        $chucvu->name = $request->name;
        $chucvu->save();
        return redirect('/chucvu/index');
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
        $chucvu = chucvu::find($id);
        return view('admin.QuanTriAdmin.ChucVu.ChucVu.updateChucVu', ['chucvu' => $chucvu]);
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
        $chucvu = chucvu::find($id);
        $chucvu->name = $request->name;
        $chucvu->save();
        return redirect('/chucvu/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chucvu = chucvu::find($id);
        $chucvu->delete();
        return redirect('chucvu/index');
    }
}
