<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'transaction') class="active " @endif>
                <a href="{{ route('transaction.index') }}">
                    <i class="tim-icons icon-money-coins"></i>
                    <p>{{ __('Kelola Transaksi') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'order') class="active " @endif>
                <a href="{{ route('order.index') }}">
                    <i class="tim-icons icon-user-run"></i>
                    <p>{{ __('Kelola Pesanan') }}</p>
                </a>
            </li>
		   <li @if ($pageSlug == 'order') class="active " @endif>
                <a href="{{ route('customer.index') }}">
                    <i class="tim-icons icon-badge"></i>
                    <p>{{ __('Kelola Pelanggan') }}</p>
                </a>
            </li>
			<li @if ($pageSlug == 'menu') class="active " @endif>
                <a href="{{ route('menu.index') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ __('Kelola Menu & Meja') }}</p>
                </a>
            </li>
            
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
        </ul>
    </div>
</div>
