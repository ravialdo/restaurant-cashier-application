<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(225);

        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');

        $abaikan = \App\abaikan::all()->count();
        view()->share('abaikan',$abaikan);

        $keluhan = \App\keluhan::all()->count();
        view()->share('keluhan',$keluhan);

        $kerjakan = \App\kerjakan::all()->count();
        view()->share('kerjakan',$kerjakan);

        $selesai = \App\selesai::all()->count();
        view()->share('selesai',$selesai);

        $hasil = $keluhan + $kerjakan + $selesai;
        view()->share('hasil',$hasil);

        $diabaikan = \App\abaikan::all();
        view()->share('diabaikan',$diabaikan);

        $admin = \App\User::where('status','=','on')->count();
        view()->share('admin',$admin);

         $daftar = \App\User::where('status','=','off')->count();
        view()->share('daftar',$daftar);

        $users = \App\User::where('status','=','off')->get();
        view()->share('users',$users);

        // Data Grafik Kerusakan

        $januariK = \App\keluhan::whereMonth('created_at', '01')->count();
        view()->share('janK',$januariK);

        $februariK = \App\keluhan::whereMonth('created_at', '02')->count();
        view()->share('febK',$februariK);
        
        $maretK = \App\keluhan::whereMonth('created_at', '03')->count();
        view()->share('marK',$maretK);

        $aprilK = \App\keluhan::whereMonth('created_at', '04')->count();
        view()->share('aprK',$aprilK);

        $meiK = \App\keluhan::whereMonth('created_at', '05')->count();
        view()->share('meiK',$meiK);

        $juniK = \App\keluhan::whereMonth('created_at', '06')->count();
        view()->share('junK',$juniK);

        $juliK = \App\keluhan::whereMonth('created_at', '07')->count();
        view()->share('julK',$juliK);

        $agustusK = \App\keluhan::whereMonth('created_at', '08')->count();
        view()->share('aguK',$agustusK);

        $septemberK = \App\keluhan::whereMonth('created_at', '09')->count();
        view()->share('sepK',$septemberK);

        $oktoberK = \App\keluhan::whereMonth('created_at', '10')->count();
        view()->share('oktK',$oktoberK);

        $novemberK = \App\keluhan::whereMonth('created_at', '11')->count();
        view()->share('novK',$novemberK);

        $desemberK = \App\keluhan::whereMonth('created_at', '12')->count();
        view()->share('desK',$desemberK);

        // Data Grafik Perbaikan

        $januariP = \App\kerjakan::whereMonth('created_at', '01')->count();
        view()->share('janP',$januariP);

        $februariP = \App\kerjakan::whereMonth('created_at', '02')->count();
        view()->share('febP',$februariP);
        
        $maretP = \App\kerjakan::whereMonth('created_at', '03')->count();
        view()->share('marP',$maretP);

        $aprilP = \App\kerjakan::whereMonth('created_at', '04')->count();
        view()->share('aprP',$aprilP);

        $meiP = \App\kerjakan::whereMonth('created_at', '05')->count();
        view()->share('meiP',$meiP);

        $juniP = \App\kerjakan::whereMonth('created_at', '06')->count();
        view()->share('junP',$juniP);

        $juliP = \App\kerjakan::whereMonth('created_at', '07')->count();
        view()->share('julP',$juliP);

        $agustusP = \App\kerjakan::whereMonth('created_at', '08')->count();
        view()->share('aguP',$agustusP);

        $septemberP = \App\kerjakan::whereMonth('created_at', '09')->count();
        view()->share('sepP',$septemberP);

        $oktoberP = \App\kerjakan::whereMonth('created_at', '10')->count();
        view()->share('oktP',$oktoberP);

        $novemberP = \App\kerjakan::whereMonth('created_at', '11')->count();
        view()->share('novP',$novemberP);

        $desemberP = \App\kerjakan::whereMonth('created_at', '12')->count();
        view()->share('desP',$desemberP);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
