@extends('layouts.app', ['pageSlug' => 'customer', 'page' => __('Kelola Pesanan')])

@section('content')

<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">  
       <li class="breadcrumb-item">
           <a href="{{ route('home') }}">Dashboard</a>
       </li>
       <li class="breadcrumb-item active">Pesanan</li>
      </ol>
</nav>
                        
<div class="row">
     <div class="col-md-6">
         <div class="card">
            <div class="card-header">
               <div class="card-title"> Form Data Pesanan</div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('order.store') }}" autocomplete="off">
                           @csrf
                           
                           
                              <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                 <div class="input-group-prepend">
                         		  <div class="input-group-text">
                        			      <i class="tim-icons icon-single-02"></i>
                     			</div>
                     		   </div>
                      	         <input type="text" name="nama_pelanggan" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pelanggan') }}" value="{{ old('nama_pelanggan') }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	      </div>
				      
      
                        <div class="form-group">						
						<select name="nomor_meja" class="form-control">																														
							<option value="">Pilih Nomor Meja</option>
							<option value="Meja 1">Meja 1</option>
							<option value="Meja 2">Meja 2</option>
							<option value="Meja 3">Meja 3</option>
							<option value="Lesehan 1">Lesehan 1</option>
							<option value="Lesehan 2">Lesehan 2</option>
						</select>
					</div>
      
                          <div class="form-group">				
						<select  name="jenis_kelamin" class="form-control">
						    <option value="">Pilih Jenis Kelamin</option>
                                    @foreach($genders as $gender)
							<option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
							@endforeach															
						</select>
					</div>
                                                                     
                           
                               <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                 <div class="input-group-prepend">
                         		  <div class="input-group-text">
                        			      <i class="tim-icons icon-mobile"></i>
                     			</div>
                     		   </div>
                      	         <input type="number" name="nomor_hp" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Hp') }}" value="{{ old('nomor_hp') }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	   </div>
				     
      
                            <div class="pl-lg-4">
                               <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">                                 
                      	         <textarea name="alamat" rows="3" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat') }}" value="{{ old('alamat') }}" required></textarea>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	   </div>
				      </div>
      
                           <div class="form-group">				
						<select  name="id_menu" class="form-control">
                                 @if(count($menus) == 0)
                                  <option value="">Menu Tidak Tersedia</option>
                                 @else
						    <option value="">Pilih Menu Pesanan</option>
                                       @foreach($menus as $menu)
							<option value="{{ $menu->id }}">{{ $menu->name_menu }}</option>	
                           		    @endforeach
                                    @endif								
						</select>
					</div>

                       
                               <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                 <div class="input-group-prepend">
                         		  <div class="input-group-text">
                        			      <i class="tim-icons icon-simple-add"></i>
                     			</div>
                     		   </div>
                      	         <input type="number" name="jumlah" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah') }}" value="{{ old('jumlah') }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	   </div>
				      
      
                              <button type="submit" class="btn btn-simple btn-success float-right">
					         <i class="tim-icons icon-simple-add"></i> Tambah
				           </button>
		
				      </form>
            
              </div>
         </div>
   </div>
   <div class="col-md-6">
         <div class="card">
            <div class="card-header">
               <div class="card-title">Data Pesanan</div>
            </div>
            <div class="card-body">
                @if(count($orders) != 0 )
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Nama
                </th>
                <th>
                  Meja
               </th>
               
              </tr>
            </thead>
            
            <tbody>
                 
			@foreach($orders as $order)
              <tr>
                <td>
                  {{ $order->customer->customer_name }}
                </td>
                <td>
                    {{ $order->customer->table_number }}
                </td>
               
                <td>
               
                  <!-- Button modal trigger -->				
			   <button type="button" class="btn btn-danger btn-simple btn-sm my-1 mr-1" data-toggle="modal" data-target="#modalHapus{{$order->id}}">
					<i class="tim-icons icon-trash-simple"></i>
		         </button>
   
                  <!-- Modal -->
				<div class="modal fade" id="modalHapus{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
												
							<p class="text-white">Yakin ingin menhapus data pesanan pelanggan atas nama {{ $order->customer->customer_name }}, penghapusan ini bersifat permanen!</p>
												
							   <form method="post" action="{{ route('order.destroy', $order) }}">

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
			   				
					<button type="button" class="btn btn-sm btn-simple btn-info mt-md-0 mr-1" data-toggle="modal" data-target="#modalEdit{{$order->id}}">
						<i class="tim-icons icon-pencil"></i>
					</button>

                          <a href="{{ route('order.show', $order) }}" class="btn btn-sm btn-simple btn-primary">
						<i class="tim-icons icon-align-left-2"></i>
					</a>
				
				
				
				<div class="modal fade" id="modalEdit{{$order->id}}" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="background-color:#212529;">
							<div class="modal-header">
								<h5 class="modal-title text-white">Edit Data Pesanan</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span
								 </button>
							</div>
							<div class="modal-body">
								<form method="post" action="{{ route('order.update', $order) }}" autocomplete="off">
		
				@csrf
				@method('put')
				
				 <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                 <div class="input-group-prepend">
                         		  <div class="input-group-text">
                        			      <i class="tim-icons icon-single-02"></i>
                     			</div>
                     		   </div>
                      	         <input type="text" name="nama_pelanggan" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pelanggan') }}" value="{{ $order->customer->customer_name }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	      </div>
				      
      
                        <div class="form-group">						
						<select name="nomor_meja" class="form-control">																														
							<option value="">Pilih Nomor Meja</option>
							<option value="Meja 1">Meja 1</option>
							<option value="Meja 2">Meja 2</option>
							<option value="Meja 3">Meja 3</option>
							<option value="Lesehan 1">Lesehan 1</option>
							<option value="Lesehan 2">Lesehan 2</option>
						</select>
					</div>
      
                          <div class="form-group">				
						<select  name="jenis_kelamin" class="form-control">
							<option value="">Pilih Jenis Kelamin</option>
							@if($order->customer->gender == 1)
							   <option value="{{ $order->customer->gender }}" selected> Laki - Laki  </option>
							@elseif($order->customer->gender == 0)
							   <option value="{{ $order->customer->gender }}" selected>Perempuan</option>	
							@endif
														
							@if($order->customer->gender != 1)
								<option value="1">Laki - Laki</option>
							@else
								<option value="0">Perempuan</option>	
							@endif													
					</select>
					</div>

                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                 <div class="input-group-prepend">
                         		  <div class="input-group-text">
                        			      <i class="tim-icons icon-mobile"></i>
                     			</div>
                     		   </div>
                      	         <input type="number" name="nomor_hp" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Hp') }}" value="{{ $order->customer->number_phone }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	   </div>
				     
      
                            <div class="pl-lg-4">
                               <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">                                 
                      	         <textarea name="alamat" rows="3" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat') }}" required>{{ $order->customer->address }}</textarea>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	   </div>
				      </div>
      
                           <div class="form-group">				
						<select  name="id_menu" class="form-control">
                                 @if(count($menus) == 0)
                                  <option value="">Menu Tidak Tersedia</option>
                                 @else
						    <option value="">Pilih Menu Pesanan</option>
                                       @foreach($menus as $menu)
							<option {{ $order->menu->name_menu == $menu->name_menu ? 'selected' : '' }} value="{{ $menu->id }}">{{ $menu->name_menu }}</option>	
                           		    @endforeach
                                    @endif								
						</select>
					</div>

                       
                               <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                 <div class="input-group-prepend">
                         		  <div class="input-group-text">
                        			      <i class="tim-icons icon-simple-add"></i>
                     			</div>
                     		   </div>
                      	         <input type="number" name="jumlah" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah') }}" value="{{ $order->amount }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	   </div>
							
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
         
		 <div class="row justify-content-center">
			<div class="col-5">
				
			</div>
		</div>
               </div>
                        
         </div>
   </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    var total = getElementById('nama_pelanggan').value;
   getElementById('jumlah_bayar').innerHTML=total;
  });
</script>
@endpush