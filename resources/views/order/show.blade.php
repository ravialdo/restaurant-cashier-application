@extends('layouts.app', ['pageSlug' => 'order', 'page' => __('Detail Pesanan')])

@section('content')
<div class="row">
     <div class="col-md-6">
   
         <div class="card">
            <div class="card-header">
               <div class="card-title">{{ __('Data Pesanan') }}</div>
            </div>   
            <div class="card-body">
               
               <div class="form-group">
                   <label>Nama Pelanggan</label>
                   <input type="text" class="form-control text-white" value="{{ $order->customer->customer_name }}" readonly>
                </div>
               
               <div class="form-group">
                   <label>Menu</label>
                   <input type="text" class="form-control text-white" value="{{ $order->menu->name_menu }}" readonly>
                </div>
               
               <div class="form-group">
                   <label>Meja</label>
                   <input type="text" class="form-control text-white" value="{{ $order->customer->table_number }}" readonly>
                </div>
               
               <div class="form-group">
                   <label>Jumlah Makanan</label>
                   <input type="text" class="form-control text-white" value="{{ $order->amount }}" readonly>
                </div>
            
            </div>
         </div>
   </div>
   
   <div class="col-md-6">
   
      <div class="card">
            <div class="card-header">
               <div class="card-title">{{ __('Data Pelanggan') }}</div>
            </div>
            <div class="card-body">
               
               <div class="form-group">
                   <label>Jenis Kelamin</label>
                   <input type="text" class="form-control text-white" value="{{ $order->customer->gender_id == 1 ? 'Laki - Laki' : 'Perempuan' }}" readonly>
                </div>
               
               <div class="form-group">
                   <label>Alamat</label>
                   <textarea class="form-control text-white" readonly>{{ $order->customer->address }}</textarea>
                </div>
               
               <div class="form-group">
                   <label>Nomor Hp</label>
                   <input type="text" class="form-control text-white" value="{{ $order->customer->number_phone }}" readonly>
                </div>
               
               <div class="form-group">
                   <label>Data Pelanggan Dibuat</label>
                   <input type="text" class="form-control text-white" value="{{ $order->customer->created_at->format('l, d F Y H:i') }}" readonly>
                </div>
         
            </div>  
      </div>
   </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    
  });
</script>
@endpush