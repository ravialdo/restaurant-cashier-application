@extends('layouts.app', ['page' => __('Kelola Transaksi'), 'pageSlug' => 'transaction'])

@section('content')
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">  
       <li class="breadcrumb-item">
           <a href="{{ route('home') }}">Dashboard</a>
       </li>
       <li class="breadcrumb-item active">Transaksi</li>
      </ol>
</nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">Buat Transaksi</div>
                </div>
                <div class="card-body">
                    <form  id="form" method="post" action="{{ route('transaction.store') }}">
         
         @csrf
         
            <div class="form-group">				
			<select  name="order_id" class="form-control" id="pelanggan">
                  @if(count($orders) == 0)
                  <option value="">Nama Pelanggan Tidak Tersedia</option>
                  @else
                   <option value="">Pilih Nama Pelanggan</option>
                     @foreach($orders as $order)
			   <option jumlah="{{ $order->amount }}" harga="{{ $order->menu->price }}" value="{{ $order->id }}">{{ $order->customer->customer_name  }}</option>
                     @endforeach
			   @endif													
			</select>
		</div>
           <small id="pesan_pilihan" class="form-text text-danger mb-2"></small>
         
         <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
               <div class="input-group-prepend">
                   <div class="input-group-text">
                        <i class="tim-icons icon-money-coins mr-2"></i>
                    </div>
                </div>
                <input type="number" name="jumlah_bayar" id="jumlah" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Uang Bayar Pelanggan') }}" value="{{ old('jumlah_bayar') }}" required>              
                @include('alerts.feedback', ['field' => 'name'])
         </div>
         <small id="pesan_pembayaran" class="form-text text-danger mb-2"></small>
         
         <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
               <div class="input-group-prepend">
                   <div class="input-group-text">
                        <i class="tim-icons icon-coins mr-2"></i>
                    </div>
                </div>
                <input type="text" name="jumlah_kembalian" id="kembalian" class="form-control text-white form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Uang Kembalian Pelannggan') }}" value="{{ old('jumlah_kembalian') }}" readonly>
                @include('alerts.feedback', ['field' => 'name'])
         </div>
         
         <input type="hidden" id="total" name="total" value="">
         
         <button id="tombol" type="button" class="btn btn-success btn-simple float-right" onClick="getValue()">
            <i class="tim-icons  icon-paper"></i> Proses Transaksi
         </button>
         
         <script>
            
            
         </script>
         
         </form>
                </div>
            </div>
        </div>
      <div class="col-md-6">
         <div class="card">
            <div class="card-header">
               <div class="card-title">Data Transaksi</div>
            </div>
            <div class="card-body">
               @if(count($transactions) != 0 )
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Nama
               </th>
                <th>
                  Total
                </th>
                <th>
                  Bayar
               </th>
               <th>
                  Kembalian
               </th>
              </tr>
            </thead>
            
            <tbody>
                 
			@foreach($transactions as $transaction)
              <tr>
               <td>
                  {{ $transaction->order->customer->customer_name }}
               </td>
                <td>
                  {{ $transaction->total }}
                </td>
                <td>
                    {{ $transaction->pay }}
                </td>
                <td>
                     {{ $transaction->change_money }}
               </td>
                <td>
               
                  <!-- Button modal trigger -->				
			   <button type="button" class="btn btn-danger btn-simple btn-sm my-1 mr-1" data-toggle="modal" data-target="#modalHapus{{$transaction->id}}">
					<i class="tim-icons icon-trash-simple"></i>
		         </button>
   
                  <!-- Modal -->
				<div class="modal fade text-left" id="modalHapus{{$transaction->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">																			
						<div class="modal-content" style="background-color:#212529;">
							<div class="modal-header">
								<h5 class="modal-title text-white text-uppercase">							
									<i class="tim-icons icon-alert-circle-exc" style="margin-top:-4px;"></i> Peringatan
								</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span
								</button>
							</div>
							<div class="modal-body">
												
							<p class="text-white">Yakin ingin menghapus data transaksi  pelanggan atas nama, penghapusan ini bersifat permanen!</p>
												
							   <form method="post" action="{{ route('transaction.destroy', $transaction) }}">

									@csrf
									@method('delete')
													
									<button class="btn btn-success btn-simple float-right btn-sm">
										Yakin
									</button>
				                    </form>
											
							</div>
						</div>
					</div>
				</div>
			   				
					<button type="button" class="btn btn-sm btn-simple btn-info mt-md-0 mr-1" data-toggle="modal" data-target="#modalEdit{{$transaction->id}}">
						<i class="tim-icons icon-pencil"></i>
					</button>

                          <a href="{{ route('transaction.show', $transaction) }}" class="btn btn-sm btn-simple btn-primary mt-1 mt-md-0">
						<i class="tim-icons icon-align-left-2"></i>
					</a>
				
				
				
				<div class="modal fade" id="modalEdit{{$transaction->id}}" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="background-color:#212529;">
							<div class="modal-header">
								<h5 class="modal-title text-white">Edit Data Pelanggan</h5>
							</div>
							<div class="modal-body">
								<form method="post" action="{{ route('transaction.update', $transaction) }}" autocomplete="off">
		
				@csrf
				@method('put')
				
				
							
				<button type="submit" class="btn btn-simple btn-success float-right">
					<i class="tim-icons icon-pencil"></i> Ubah
				</button>
		
				</form>
							</div>
						</div>					
					</div>
				</div>
				
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      
         @else
              <div class="text-center"> Tidak Ada Data Untuk di Tampilkan</div>
         @endif
            </div>
         </div>
      </div>
    </div>
@endsection

@push('js')
    <script>
        
            function getValue(){
               
               var value = $("#pelanggan").val();
               var harga = $("#pelanggan option:selected").attr('harga');
                var jumlah_makanan = $("#pelanggan option:selected").attr('jumlah');
               var total_bayar = harga * jumlah_makanan;
               
               var jumlah_bayar = $("#jumlah").val();
               $("#kembalian").val();
               
               if(value == ''){
                     $("#pesan_pilihan").text("harap pilih salah satu nama pelanggan!");
                   }else {
                     $("#pesan_pilihan").text("");
                     if(jumlah_bayar == 0){
                        $("#pesan_pembayaran").text('silahkan masukan nominal uang pelanggan!');
                     }else if(jumlah_bayar >= total_bayar){
                        var uang_kembalian = jumlah_bayar - total_bayar;
                        $("#kembalian").val(uang_kembalian);
                        $("#total").val(total_bayar);
                        $("#pesan_pilihan").text('');
                        $("#pesan_pembayaran").text('');
                        var button = $("#tombol").attr("type","submit");
                                       
                     }else{                       
                        $("#pesan_pembayaran").text('uang pembayaran pelanggan kurang!');
                     }
                }
               
            }
       
    </script>
@endpush
