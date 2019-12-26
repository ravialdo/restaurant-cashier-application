<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Order;
use App\Customer;

class PageController extends Controller
{
	
	public function home()
	{
		$data = [
			'menus' => 	Menu::paginate(6)
		];
		
		return view('welcome', $data);
	}
	
	public function order(Request $request, $id)
	{
		$menu = Menu::find($id);
		
		$customer = Customer::create([
			'customer_name' => $request->nama_pelanggan,
			'table_number' => $request->nomor_meja,
			'gender' => $request->jenis_kelamin,
			'number_phone' => $request->nomor_handphone,
			'address' => $request->alamat_lengkap
		])->get('id')->last();
		
		$order = Order::create([
			'menu_id' => $id,
			'customer_id' => $customer->id,
			'amount' => $request->jumlah_makanan,
			'status' => 'menunggu'
		]);
		
		return redirect('/')->withStatus('Pesanan anda akan segera kami proses, dimohon untuk menunggu sebentar!');
	}
	
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('pages.icons');
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }
}
