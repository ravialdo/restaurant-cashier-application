<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini"><i class="tim-icons icon-molecule-40"></i></a>
            <a href="#" class="simple-text logo-normal">{{ __('SIMKAS APP') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
		@if(auth()->user()->level == 'cashier')
            <li @if ($pageSlug == 'transaction') class="active " @endif>
                <a href="{{ route('transaction.index') }}">
                    <i class="tim-icons icon-money-coins"></i>
                    <p>{{ __('Kelola Transaksi') }}</p>
                </a>
            </li>
		@endif
		@if(auth()->user()->level != 'administrator')
		<li @if ($pageSlug == 'report') class="active " @endif>
                <a href="{{ route('transaction.index') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>{{ __('Buat Laporan') }}</p>
                </a>
            </li>
		@endif
		@if(auth()->user()->level == 'waiter')
            <li @if ($pageSlug == 'order') class="active " @endif>
                <a href="{{ route('order.index') }}">
                    <i class="tim-icons icon-user-run"></i>
                    <p>{{ __('Kelola Pesanan') }}</p>
                </a>
            </li>
		@endif
		@if(auth()->user()->level != 'owner')
		   <li @if ($pageSlug == 'customer') class="active " @endif>
                <a href="{{ route('customer.index') }}">
                    <i class="tim-icons icon-satisfied"></i>
                    <p>{{ __('Kelola Pelanggan') }}</p>
                </a>
            </li>
		@endif
		@if(auth()->user()->level == 'administrator' || auth()->user()->level == 'waiter')
			<li @if ($pageSlug == 'menu') class="active " @endif>
                <a href="{{ route('menu.index') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ __('Kelola Menu & Meja') }}</p>
                </a>
            </li>
            @endif
		  @if(auth()->user()->level == 'administrator')
            <li>
                <a data-toggle="collapse" href="#pengguna" aria-expanded="true">
                    <i class="tim-icons icon-badge" ></i>
                    <span class="nav-link-text" >{{ __('Pengguna') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="pengguna">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Profile Pengguna') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Kelola Pengguna') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>
