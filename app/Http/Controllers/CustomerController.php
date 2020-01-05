<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Menu;
use App\Order;
use App\Transaction;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'customers' => Customer::paginate(10),
            'menus' => Menu::all(),
            'orders' => Order::all()
        ];
      
        return view('customer.index', $data);
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
        $customer = Customer::create([
            'customer_name' => $request->nama_pelanggan,
            'table_number' => $request->nomor_meja,
            'gender' => $request->jenis_kelamin,
            'number_phone' => $request->nomor_hp,
            'address' => $request->alamat
         ]);
         
         $customer->order()->create([
            'menu_id' => $request->id_menu,
            'amount' => $request->jumlah,
            'user_id' => auth()->user()->id,
            'status' => 'baru'
         ]);
         
         alert()->success('Data Berhasil di Tambahkan', 'Berhasil!')->persistent('Tutup');
   
         return redirect('customer');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $customer = Customer::find($id);
         
         $customer->order()->delete();
         
         if($customer) :
              alert()->success('Data Berhasil di Hapus', 'Berhasil!')->persistent('Tutup');
         else :
               alert()->error('Data Gagal di Hapus', 'Gagal!')->persistent('Tutup');
         endif;
        return redirect('customer');
    }
}
