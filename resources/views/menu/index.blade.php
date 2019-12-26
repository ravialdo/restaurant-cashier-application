@extends('layouts.app', ['page' => __('Data Menu'), 'pageSlug' => 'menu'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Daftar Data Menu</h4>
      </div>
      <div class="card-body">
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
                  Gambar
                </th>
                <th>
                  Aksi
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
				<img class="img-thumbnail" src="{{ $menu->image_menu }}" alt="" width="130">
                  
                </td>
                <td>
                  <form method="post" action="">
					
					@csrf
					@method('delete')
					
					<button type="button" class="btn btn-simple btn-sm btn-danger">
						<i class="tim-icons icon-trash-simple"></i> Hapus
					</button>
			   </form>
			
				<button type="button" class="btn btn-sm btn-simple btn-info mt-2" data-toggle="modal" data-target="#modalEdit{{$menu->id}}">
					<i class="tim-icons icon-pencil"> </i> Edit
				</button>
				
				<div class="modal fade" id="modalEdit{{$menu->id}}" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="background-color:#212529;">
							<div class="modal-header">
								<h5 class="modal-title text-white">Edit Data Menu</h5>
							</div>
							<div class="modal-body">
							</div>
							<div class="modal-footer">
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
      </div>
    </div>
  </div>
</div>
@endsection
