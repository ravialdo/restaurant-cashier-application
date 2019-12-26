@extends('layouts.app', ['page' => __('Pesanan Pelanggan'), 'pageSlug' => 'order'])

@section('content')

    <div class="row">
        <div class="col-md-12">
		   <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Data Pesanan Pelanggan status <span class="text-danger">menuggu</span></h4>
                </div>
			 <div class="text-right mr-3">
                       <a href="{{ route('order.create') }}" class="btn btn-sm btn-primary">{{ __('Buat Pesanan') }}</a>
                </div>
                <div class="card-body">
				@if (session('status'))
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-success">
        					 	<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
         					  		<i class="tim-icons icon-simple-remove"></i>
       						  </button>
        						  <span>
         						  	  <i class="tim-icons icon-check-2"></i> {{ session('status') }}														
							  </span>
       					 </div>
					</div>
				</div>
				@endif
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
							 <th>
								NO
							</th>
                                    <th>
                                        Nama Pelanggan
                                    </th>
                                    <th>
                                        Menu
                                    </th>
                                    <th>
                                        Jumlah
                                    </th>
							
                                    <th class="text-center">
                                        status
                                    </th>
							 <th>
								Dibuat
							</th>
							 <th>
								Kerjakan
							</th>
							<th>
								Aksi
							</th>
                                </tr>
                            </thead>
                            <tbody>

						  @php
							$i = 1;
						  @endphp
						              
                                @foreach($orders as $order)                                                                              
                                <tr>
							<th>
								{{ $i }}
							</th>
							<td>
                                        {{ $order->customer->customer_name }}
                                    </td>
                                    <td>
                                        {{ $order->menu->name_menu }}
                                    </td>                                  
                                    <td>
                                        {{ $order->amount }}
                                    </td>
							 
                                    <td class="text-center">
                                       <div class="text-danger">
									{{ $order->status }}
								</div>
                                    </td>
							<td>
								{{ $order->created_at->diffForHumans() }}
							</td>
							<td>
								<a href="{{ route ('order.run', $order)}}" class="btn btn-success btn-simple">
									<i class="tim-icons icon-user-run"></i>
								</a>
							</td>
							<td>
										<!-- Button modal trigger -->				
									   <button type="button" class="btn btn-danger btn-simple btn-sm my-1 mr-1" data-toggle="modal" data-target="#exampleModal{{$order->id}}">
									   		<i class="tim-icons icon-trash-simple"></i> Hapus
									   </button>
									
									<!-- Modal -->
									<div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
												
													<p class="text-white">Yakin ingin menghapus data pesanan atas nama {{ $order->customer->customer_name }}, penghapusan ini bersifat permanen!</p>
												
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
									
									<button type="button" class="btn btn-info btn-simple btn-sm mr-1 my-1"  data-toggle="modal" data-target="#modalEdit{{$order->id}}"> 
										<i class="tim-icons icon-pencil"></i> Edit
									</button>
									
									<!-- Modal Edit-->
							<div class="modal fade" id="modalEdit{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">																			
									<div class="modal-content" style="background-color:#212529;">
										<div class="modal-header">
										<h5 class="modal-title text-white">Edit Data Pemesanan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span
											 </button>
										</div>
										<div class="modal-body">
											<p class="text-white text-left">Isilah form di bawah ini dengan data yang benar.</p>
											
											<form class="form" method="post" action="{{ route('order.update', $order)}}">
												
												@csrf
												@method('put')
												
												<div class="input-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-badge"></i>
                     								       </div>
                     								   </div>
                     								   <input type="text" name="nama_pelanggan" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{ $order->customer->customer_name }}" placeholder="{{ __('Nama Pelanggan') }}">
                     								   @include('alerts.feedback', ['field' => 'nama'])
                								    </div>
								
												<div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-simple-add"></i>
                     								       </div>
                     								   </div>
                     								   <input type="number" name="jumlah_makanan" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $order->amount }}" placeholder="{{ __('Jumlah Makanan') }}">
                     								   @include('alerts.feedback', ['field' => 'email'])
                								    </div>
																															
												<div class="form-group">						
													<select name="nomor_meja" class="form-control">																															
														<option value="{{ $order->customer->table_number }}">{{ $order->customer->table_number }}</option>
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

												<div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-mobile"></i>
                     								       </div>
                     								   </div>
                     								   <input type="text" name="nomor_handphone" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $order->customer->number_phone }}" placeholder="{{ __('Nomor Handphone') }}">
                     								   @include('alerts.feedback', ['field' => 'email'])
                								    </div>
								
												<div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-square-pin"></i>
                     								       </div>
                     								   </div>
                     								   <input type="text" name="alamat_lengkap" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $order->customer->address }}" placeholder="{{ __('Alamat Lengkap') }}">
                     								   @include('alerts.feedback', ['field' => 'email'])
                								    </div>
												
												<button type="submit" class="btn btn-primary btn-sm">Ubah</button>

											</form>
										</div>
									</div>
								</div>
							</div>
									
									<button type="button" class="btn btn-warning btn-simple btn-sm my-1" data-toggle="modal" data-target="#modalDetail{{$order->id}}"> 
										<i class="tim-icons icon-align-left-2"></i> Detail
									</button>
									
									<!-- Modal Edit-->
							<div class="modal fade" id="modalDetail{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								<div class="modal-content" style="background-color:#212529;">
										<div class="modal-header">
										<h5 class="modal-title text-white">Detail Data Pemesanan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span
											 </button>
										</div>
										<div class="modal-body text-white">											
											<img class="card-img-top" src="{{$order->menu->image_menu}}" alt="Card image cap">								
												<h4 class="text-primary">Bio Pelanggan</h4>
												Nama : {{ $order->customer->customer_name }} <br/>
												Nomor  Hp : {{ $order->customer->number_phone }} <br/>
												Jenis Kelamin : {{ ($order->customer->gender == 1) ? 'Laki - Laki' : 'Perempuan' }} <br/>
												Alamat : {{ $order->customer->address }} <br/>						
												<h4 class="text-primary">Data Pesanan</h4>											
												Nomor Meja : {{ $order->customer->table_number }} <br/>
												Nama Menu : {{ $order->menu->name_menu }} <br/>
												Jumlah Pesanan : {{ $order->amount }} <br/>
												Di pesan sejak {{ $order->created_at->diffForHumans() }}	
											<div class="modal-footer float-right">							
												<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
											</div>
									</div>
								</div>
							</div>
																		   															 											
                                   </td>
                                </tr>

							@php
							 $i++;
						 	 @endphp
				
						   @endforeach							
							
                            </tbody>
                        </table>
					
                    </div>

				@if(count($orders) == 0)						
							<div class="text-center text-white text-uppercase my-2">Tidak ada data untuk di tampilkan!</div>						
					@endif
					<div class="row justify-content-center">
						<div class="col-5 col-md-2">
							{{ $orders->links() }}
						</div>						
					</div>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('js')
    <!-- Place this tag in your head or just before your close body tag. -->
    <script>
        $(document).ready(function() {
            
        });
    </script>
@endpush
