@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])

@section('content')
<div id="row">
     <div class="col-md-6">
   
         <div class="card">
            <div class="card-header">
               <div class="card-title">{{ __('Data Pelanggan') }}</div>
            </div>
         </div>
   
   </div>
   <div class="col-md-6">
   
      <div class="card">
            <div class="card-header">
               <div class="card-header">
               <div class="card-title">{{ __('Data Transaksi Pelanggan') }}</div>
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