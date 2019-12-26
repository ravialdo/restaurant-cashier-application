@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">

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
				
			<h1 class="border-bottom border-primary">Daftar Makanan</h1>	
			
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
				
				@foreach($menus as $menu) 
                    <div class="col-md-4">
               	   <div class="card">
					 <img class="card-img-top" src="{{ $menu->image_menu }}" alt="{{ $menu->name_menu }}">
						 <div class="card-body">
							<h4 class="card-title text-left">{{ $menu->name_menu }}</h4> 
							 <p class="card-text text-left">Rp. {{ $menu->price }}</p>
							<a href="#" class="btn-info btn-sm">{{ __('Detail')}}</a>
							
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$menu->id}}"> Pesan </button>
							
							<!-- Modal -->
							<div class="modal fade" id="exampleModal{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">																			
									<div class="modal-content" style="background-color:#212529;">
										<div class="modal-header">
										<h5 class="modal-title text-white">Data Pemesanan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span
											 </button>
										</div>
										<div class="modal-body">
											<p class="text-white text-left">Isilah form di bawah ini dengan data yang benar.</p>
											
											<form class=form"" method="post" action="{{ url('customer-order', $menu->id) }}">
												
												@csrf
												
												<div class="input-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-badge"></i>
                     								       </div>
                     								   </div>
                     								   <input type="text" name="nama_pelanggan" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pelanggan') }}">
                     								   @include('alerts.feedback', ['field' => 'nama'])
                								    </div>
								
												<div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-simple-add"></i>
                     								       </div>
                     								   </div>
                     								   <input type="number" name="jumlah_makanan" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Makanan') }}">
                     								   @include('alerts.feedback', ['field' => 'email'])
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
														<option value="1">Laki - Laki</option>
														<option value="0">Perempuan</option>																	
													</select>
												</div>

												<div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-mobile"></i>
                     								       </div>
                     								   </div>
                     								   <input type="text" name="nomor_handphone" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Handphone') }}">
                     								   @include('alerts.feedback', ['field' => 'email'])
                								    </div>
								
												<div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      								  <div class="input-group-prepend">
                         								   <div class="input-group-text">
                        									        <i class="tim-icons icon-square-pin"></i>
                     								       </div>
                     								   </div>
                     								   <input type="text" name="alamat_lengkap" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat Lengkap') }}">
                     								   @include('alerts.feedback', ['field' => 'email'])
                								    </div>
												
												<button type="submit" class="btn btn-primary btn-sm">Kirim</button>

											</form>
										</div>
									</div>
								</div>
							</div>

						
						</div>
					 </div>
                    </div>
				@endforeach
			   				
				 {{ $menus->links() }}
				
				</div>
             </div>
        </div>
    </div>
@endsection