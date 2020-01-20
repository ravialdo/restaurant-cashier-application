@extends('layouts.app', ['class' => 'register-page', 'page' => __('register'), 'contentClass' => 'register-page'])

@section('content')

	<div class="row justify-content-center">
		<div class="col-md-5">
		
			<div class="card card-register card-white">
				<div class="card-header">
					<img class="card-img" src="{{ asset('black') }}/img/card-primary.png" alt="Card image">
                   		<h1 class="card-title mt-5"></h1>
				</div>
				<form class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
					<div class="form-group {{ $errors->has('level') ? ' has-danger' : '' }}">											
						<select  name="level" class="form-control">
							<option value="">Pilih Level</option>
							<option value="administrator">Administrator</option>
							<option value="owner">Owner</option>
							<option value="cashier">Cashier</option>
							<option value="waiter">Waiter</option>
						</select>
					</div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">
                        </div>
                        <div class="form-check text-left">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                                {{ __('I agree to the') }}
                                <a href="#">{{ __('terms and conditions') }}</a>.
                            </label>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary btn-round">{{ __('DAFTAR') }}</button>
                    </div>
                </form>
				
			</div>
		
		</div>
	</div>
	
@endsection
