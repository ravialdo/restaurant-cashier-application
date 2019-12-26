<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $data = [
			'orders' => Order::where('status', 'menunggu')->paginate(10),
	   ];
	
        return view('order.index', $data);
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
        //
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
        $order = Order::find($id);

	   $order->customer()->update([
			'customer_name' => $request->nama_pelanggan,
			'table_number' => $request->nomor_meja,
			'gender' => $request->jenis_kelamin,
			'number_phone' => $request->nomor_handphone,
			'address' => $request->alamat_lengkap
	   ]);
	
	   $order->update([
			'amount' => $request->jumlah_makanan,
	    ]);
		
		return redirect('order')->withStatus('Data pesanan berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();

	    return redirect('order')->withStatus('Data pesanan berhasil di hapus!');
    }

    public function run($id)
    {
		$order = Order::find($id);
		
		$order->update([
			'user_id' => auth()->user()->id,
			'status' => 'dikerjakan'
		]);
		
		return redirect('order')->withStatus('Pesanan berhasil dikerjakan!');
    }
}
