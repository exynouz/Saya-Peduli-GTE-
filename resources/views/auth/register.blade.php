<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Saya Peduli</title>
    <link href="assets/images/logo.png" rel="icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
</head>

<style>
    @import url(//fonts.googleapis.com/css?family=Lato:300:400);

    .waves {
        position:absolute;
        width: 100%;
        height:15vh;
        bottom:1%;
        margin-bottom:-7px; /*Fix for safari gap*/
        min-height:100px;
        max-height:150px;
    }

    /* Animation */

    .parallax > use {
        animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
    }
    .parallax > use:nth-child(1) {
        animation-delay: -2s;
        animation-duration: 7s;
    }
    .parallax > use:nth-child(2) {
        animation-delay: -3s;
        animation-duration: 10s;
    }
    .parallax > use:nth-child(3) {
        animation-delay: -4s;
        animation-duration: 13s;
    }
    .parallax > use:nth-child(4) {
        animation-delay: -5s;
        animation-duration: 20s;
    }
    @keyframes move-forever {
    0% {
    transform: translate3d(-90px,0,0);
    }
    100% {
    transform: translate3d(85px,0,0);
    }
    }
    /*Shrinking for mobile*/
    @media (max-width: 768px) {
    .waves {
    height:40px;
    min-height:40px;
    }
    .content {
    height:30vh;
    }
    h1 {
    font-size:24px;
    }

    }
</style>
<body class="my-login-page">
   
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(12,118,170,255)" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(129,212,226,255)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(33,150,193,255)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(27,143,190,255)" />
        </g>
        </svg>
        
    </div>
    <section class="h-100 bg-register">
        <div class="container-fluid h-100">
        
            <div class="row justify-content-md-center h-100">
                <div class="col-md-6 d-flex justify-content-center align-items-center" style="">

                </div>    
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    
                    <div class="card-wrapper ">
                        <div class="card fat ">
                            <div class="card-body">
                                <h4 class="card-title text-center">REGISTER</h4>
                                <form method="POST"
                                enctype="multipart/form-data" action="{{ route('register') }}"
                                class="my-login-validation" novalidate="">
                                @csrf

                                    <!-- <input value="0" id="id" type="text" name="id_petugas" hidden> -->

                                    <div class="form-group">
                                        <label for="name" value="{{ __('Nama') }}">Name</label>
                                        <input id="name" type="text" value="{{ old('nik') }}"  class="form-control @error('name') is-invalid @enderror" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Masukkan Nama Lengkap">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email" value="{{ __('Email') }}">Email</label>
                                        <input id="email" type="text" :value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="Masukkan Alamat Email">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" value="{{ __('No. Telepon') }}">Telephone</label>
                                        <input id="phone" type="text" :value="{{ old('phone') }}"  class="form-control @error('phone') is-invalid @enderror" name="phone" required autofocus autocomplete="phone" placeholder="Masukkan Nomer Telepon" >
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" value="{{ __('Password') }}">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required data-eye autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
                                        <input id="password_confirmation" class="form-control @error('password') is-invalid @enderror" type="password"
                                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" value="{{ __('Alamat Lengkap') }}">Alamat</label>
                                        <textarea name="address" id="address" rows="3" autocomplete="address" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan Alamat Lengkap" :value="{{ old('address') }}" required autofocus autocomplete="
                                        address"></textarea>
                                        
                                    </div>

                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="form-group">
                                        <x-label for="terms">
                                            <div class="d-flex align-items-center">
                                                <x-checkbox name="terms" id="terms" required />

                                                <div class="">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                                        class="text-small">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                                        class="text-small">'.__('Privacy
                                                        Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-label>
                                    </div>
                                    @endif

                                    <div class="d-flex align-items-center justify-content-between form-group">
                                        <a class="text-sm text-primary underline me-auto"
                                            href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>

                                        <input type="submit" class="btn btn-primary float-end ms-auto" value="{{ __('Register') }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <a href="{{ url('/') }}" class="text-center text-white text-bold home" style="">
                <img src="assets/images/logo.png" class="img-fluid" alt="" style="margin-bottom: -8px;">
            <br><span style="font-size:20px">H O M E</span>
            </a>
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="assets/js/my-login.js"></script>
</body>
</html>
