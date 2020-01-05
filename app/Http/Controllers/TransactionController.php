<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\Customer;
use App\Order;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
               'orders' => Order::where('status','baru')->get(),
               'transactions' => Transaction::all()
         ];
         
        return view('transaction.index', $data);
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
         $order = order::find($request->order_id);
         
         $order->update([
                 'status' => 'selesai'
         ]);
      
        $order->transaction()->create([
             'total' => $request->total,
             'pay'  => $request->jumlah_bayar,
             'change_money' => $request->jumlah_kembalian
         ]);
         
        alert()->success('Transaksi telah di proses', 'Berhasil')->persistent('Tutup');
       
        return redirect('transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'transaction' => Transaction::find($id)
         ];
         
         return redirect('show', $data);
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
        $transaction = Transaction::find($id)->delete();
      
      if($transaction)
         {
            alert()->success('Data Berhasil di Hapus', 'Berhasil!')->persistent('Tutup');
         } else {
            alert()->error('Data Gagal di Hapus', 'Gagal!')->persistent('Tutup');
         }
         
         return redirect()->back();
    }
}
