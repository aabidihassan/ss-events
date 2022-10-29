<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>S'Authentifier</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ url('auth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ url('auth/css/style.css')}}">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="auth/images/registration-form-6.jpg" alt="">
				</div>
				<form method="POST" action="{{ route('login') }}" >
                @csrf
					<h3>S'authentifier</h3>
                    @if($errors->get('username'))
                    <div class="alert alert-danger" role="alert">les informations sont incorrects!!</div>
                    @endif

                    <div class="form-row">
                    <div class="form-holder" style="width:100%; margin-top:5%;">
                        <input type="text" id="username" class="form-control" placeholder="Nom d'utilisateur" name="username" required autocomplete="off">
					</div>
                    </div>

                    <div class="form-row">
                    <div class="form-holder" style="width:100%; margin-top:5%;">
						<input type="password" id="password" class="form-control" placeholder="Mot de passe" name="password" required autocomplete="new-password">
					</div>
                    </div>

                    <button type="submit" style="margin-top:9%;">Authentifier
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button>
				</form>

			</div>
		</div>

		<script src="{{ url('auth/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{ url('auth/js/main.js')}}"></script>
	</body>
</html>
