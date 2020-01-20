@extends('layouts.app', ['page' => __('Kelola menu & meja'), 'pageSlug' => 'menu'])

@section('content')
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
       <li class="breadcrumb-item">
           <a href="{{ route('home') }}">Dashboard</a>
       </li>
       <li class="breadcrumb-item active">Menu</li>
      </ol>
</nav>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">
					{{ __('Tambah Menu') }}
				</div>
			</div>
			<div class="card-body">
				<div class="row">

                        <div class="col-md-6">

                         <form method="post" action="{{ route('menu.store') }}" autocomplete="off">
                           @csrf

                           <div class="pl-lg-4">
                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      	         <input type="text" name="nama_menu" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Menu') }}" value="{{ old('nama_menu') }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	      </div>
				      </div>

                        </div>

                        <div class="col-md-6">

                           <div class="pl-lg-4">
                               <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      	         <input type="number" name="harga" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Harga') }}" value="{{ old('harga') }}" required>
                       	         @include('alerts.feedback', ['field' => 'name'])
               	   	   </div>
				      </div>

                              <button type="submit" class="btn btn-simple btn-success float-right">
					         <i class="tim-icons icon-simple-add"></i> Tambah
				           </button>

				      </form>
                        </div>

                   </div>

			</div>
		</div>
	</div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Daftar Data Menu</h4>
      </div>
      <div class="card-body">
         @if(count($menus) != 0 )
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Nama Menu
                </th>
                <th>
                  Harga
               </th>
              </tr>
            </thead>

            <tbody>

			@foreach($menus as $menu)
              <tr>
                <td>
                  {{ $menu->name_menu }}
                </td>
                <td>
                 Rp.{{ $menu->price }}
                </td>
                <td>
                  
               
                      <button type="button" class="btn btn-simple btn-sm btn-danger mr-1" data-toggle="modal" data-target="#hapusMenu{{$menu->id}}">
        		         <i class="tim-icons icon-trash-simple"></i>
        		   </button>
      
                    <div class="modal fade" id="hapusMenu{{$menu->id}}" tabindex="-1" role="dialog">
        					<div class="modal-dialog" role="document">
        						<div class="modal-content" style="background-color:#212529;">
        							<div class="modal-header">
        								<h5 class="modal-title text-white text-uppercase">
                                                   <i class="tim-icons icon-alert-circle-exc" style="margin-top:-4px;"></i> Peringatan
                                             </h5>
        							</div>
        							<div class="modal-body">
      
                                          <p class="text-white">Yakin ingin menghapus data menu, penghapusan ini bersifat permanen!</p>
      
                                              <form method="post" action="{{ route('menu.destroy', $menu)}}" autocomplete="off">

        					                        @csrf
        					                        @method('delete')

        					                        <button type="submit" class="btn btn-simple btn-sm btn-success float-right">
        					                           	Yakin
        					                        </button>
        					
        				                     </form>
      
                                       </div>
        						</div>
        					</div>
        				</div>

        					<button type="button" class="btn btn-sm btn-simple btn-info" data-toggle="modal" data-target="#modalEdit{{$menu->id}}">
        						<i class="tim-icons icon-pencil"> </i>
        					</button>

        				

        				<div class="modal fade" id="modalEdit{{$menu->id}}" tabindex="-1" role="dialog">
        					<div class="modal-dialog" role="document">
        						<div class="modal-content" style="background-color:#212529;">
        							<div class="modal-header">
        								<h5 class="modal-title text-white">Edit Data Menu</h5>
        							</div>
        							<div class="modal-body">
        								<form method="post" action="{{ route('menu.update', $menu) }}" autocomplete="off">

                				@csrf
                				@method('put')

                				      <div class="pl-lg-4">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                  <input type="text" name="nama_menu" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Menu') }}" value="{{ $menu->name_menu }}" required>
                                  @include('alerts.feedback', ['field' => 'name'])
                                  </div>
                				      </div>

                				<div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input type="number" name="harga" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Harga') }}" value="{{ $menu->price }}" required>
                            @include('alerts.feedback', ['field' => 'name'])
                        	</div>
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
				{{ $menus->links() }}
			</div>
		</div>

      </div>
    </div>
  </div>
  <div class="col-md-6">
	   <div class="card">
			<div class="card-header">
				<div class="card-title">
					{{ __('Tambah Meja') }}
				</div>
			</div>
			<div class="card-body">

			<form method="post" action="{{ route('table.store') }}">

				@csrf

				<div class="pl-lg-4">
                         <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      	      <input type="text" name="nomor_meja" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Meja') }}" value="{{ old('nomor_meja') }}" required>
                       	      @include('alerts.feedback', ['field' => 'name'])
               	   	</div>
				</div>


				<button type="submit" class="btn btn-simple btn-success float-right">
					<i class="tim-icons icon-simple-add"></i> Tambah
				</button>

				</form>

				
				<div class="table-responsive">
				@if(count($tables) != 0)
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Nomor Meja
                </th>

                <th>
                  Dibuat
                </th>
              </tr>
            </thead>
            <tbody>

              @foreach($tables as $table)
              <tr>
                <td>
                  {{ $table->table_name }}
                </td>

                <td>
                {{ $table->created_at->format('l, d F Y') }}
                </td>

                <td>
               
                  <button type="button" class="btn btn-simple btn-sm btn-danger mr-1 mb-1 mb-md-0" data-toggle="modal" data-target="#hapusMeja{{$table->id}}">
        		         <i class="tim-icons icon-trash-simple"></i>
        		   </button>
      
                    <div class="modal fade" id="hapusMeja{{$table->id}}" tabindex="-1" role="dialog">
        					<div class="modal-dialog" role="document">
        						<div class="modal-content" style="background-color:#212529;">
        							<div class="modal-header">
        								<h5 class="modal-title text-white text-uppercase">
                                                   <i class="tim-icons icon-alert-circle-exc" style="margin-top:-4px;"></i> Peringatan
                                               </h5>
        							</div>
        							<div class="modal-body">
      
                                          <p class="text-white">Yakin ingin menghapus meja ini, penghapusan ini bersifat permanen!</p>
      
                                              <form method="post" action="{{ route('table.destroy', $table)}}" autocomplete="off">

        					                        @csrf
        					                        @method('delete')

        					                        <button type="submit" class="btn btn-simple btn-sm btn-success float-right">
        					                           	Yakin
        					                        </button>
        					
        				                     </form>
      
                                       </div>
        						</div>
        					</div>
        				</div>

                  
      
                        <button type="button" class="btn btn-sm btn-simple btn-info" data-toggle="modal" data-target="#editMeja{{$table->id}}">
        						<i class="tim-icons icon-pencil"> </i>
        					</button>

        				<div class="modal fade" id="editMeja{{$table->id}}" tabindex="-1" role="dialog">
        					<div class="modal-dialog" role="document">
        						<div class="modal-content" style="background-color:#212529;">
        							<div class="modal-header">
        								<h5 class="modal-title text-white">Edit Data Nomor Meja</h5>
        							</div>
        							<div class="modal-body">
        								<form method="post" action="{{ route('table.update', $table) }}" autocomplete="off">

                				@csrf
                				@method('put')

                				      <div class="pl-lg-4">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                  <input type="text" name="nomor_meja" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Mwja') }}" value="{{ $table->table_name }}" required>
                                  @include('alerts.feedback', ['field' => 'name'])
                                  </div>
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

          <div class="row justify-content-center">
     			<div class="col-5">
     				{{ $tables->links() }}
     			</div>
     		</div>
				  @else
			           <div class="text-center mt-2"> Tidak Ada Data Untuk di Tampilkan</div>
		            @endif
        </div>
		            

			</div>
		</div>
  </div>
</div>
@endsection
