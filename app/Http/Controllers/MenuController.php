<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Table;

class MenuController extends Controller
{
	
	public function __construct(){
		
		$this->middleware([
			'auth',
			'level:kasir',
			'level:owner'
		]);
		
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   $data = [
			'menus' => Menu::paginate(10),
      'tables' => Table::paginate(10)
	   ];

        return view('menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Menu::create([
			'name_menu' => $request->nama_menu,
			'price' => $request->harga
	   ]);

	    alert()->success('Data Berhasil di Tambahkan', 'Berhasil!')->persistent('Tutup');

	    return redirect('menu');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Menu::find($id)->update([
               'name_menu' => $request->nama_menu,
               'price' => $request->harga
         ]);

         alert()->success('Data Berhasil di Ubah', 'Berhasil!')->persistent('Tutup');

         return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();

	   alert()->success('Data Berhasil di Hapus', 'Berhasil!')->persistent('Tutup');

	   return redirect('menu');
    }
}
