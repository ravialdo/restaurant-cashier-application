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
                  <form method="post" action="{{ route('menu.destroy', $menu)}}" autocomplete="off">
					
					@csrf
					@method('delete')
					
					<button type="submit" class="btn btn-simple btn-sm btn-danger mr-1">
						<i class="tim-icons icon-trash-simple"></i>
					</button>
			   				
					<button type="button" class="btn btn-sm btn-simple btn-info mt-1 mt-md-0" data-toggle="modal" data-target="#modalEdit{{$menu->id}}">
						<i class="tim-icons icon-pencil"> </i>
					</button>
				
				</form>
				
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
				
			<form method="post" action="{{ route('menu.create') }}">
		
				@csrf
				@method('put')
				
				<div class="pl-lg-4">
                         <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      	      <input type="text" name="nama_meja" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Meja') }}" value="{{ old('nama_meja') }}" required>
                       	      @include('alerts.feedback', ['field' => 'name'])
               	   	</div>
				</div>
						
							
				<button type="button" class="btn btn-simple btn-success float-right">
					<i class="tim-icons icon-simple-add"></i> Tambah
				</button>
		
				</form>
				
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
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
			
              <tr>
                <td>
                  
                </td>
                <td>
                 
                </td>
                <td>
                 
				
                </td>
              </tr>
              

            </tbody>
          </table>
        </div>
				
			</div>
		</div>
  </div>
</div>
@endsection
