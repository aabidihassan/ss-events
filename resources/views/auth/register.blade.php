<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v6 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ url('auth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ url('auth/css/style.css')}}">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner" style="width:80%">
				<div class="image-holder">
					<img src="auth/images/registration-form-6.jpg" alt="">
				</div>
				<form method="POST" action="{{ route('register') }}" autocomplete="off" >
                @csrf
					<h3>Creer un compte</h3>
                    @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">les informations sont bien enregistrées, on va vous communiquer par la suite!</div>
                    @endif
                    <div class="form-row">
						<div class="form-holder" style="width:100%">
							<select name="type" id="type" class="form-control" required>
								<option value="client" selected>Client</option>
								<option value="pre">Fournisseur</option>
							</select>
							<i class="zmdi zmdi-chevron-down"></i>
						</div>
					</div>

					<div class="form-row">
						<input type="text" class="form-control" placeholder="Nom" name="nom" required>
						<input type="text" class="form-control" placeholder="Prenom" name="prenom" required>
					</div>
                    <div class="form-row">
						<input type="tel" class="form-control" placeholder="Telephone" name="phone" required>
						<input type="email" class="form-control" placeholder="E-Mail" name="email" required>
					</div>
                    <div class="form-row">
						<input type="text" id="username" class="form-control" placeholder="Nom d'utilisateur" name="username" required autocomplete="off">
						<input type="password" id="password" class="form-control" placeholder="Mot de passe" name="password" required autocomplete="new-password">
					</div>
					<textarea name="adresse" id="adresse" placeholder="Adresse" class="form-control" style="height: 70px;" required></textarea>
					<button type="submit">Creer un compte
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button>
				</form>

			</div>
		</div>

		<script src="{{ url('auth/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{ url('auth/js/main.js')}}"></script>
        <script>
            $('#type').on('change', function(){
                console.log($(this).val())
                if($(this).val() == 'pre'){
                    $('#username').hide().removeAttr('required');
                    $('#password').hide().removeAttr('required');
                    $('#adresse').hide().removeAttr('required');
                }else{
                    $('#username').show().attr('required', 'true');
                    $('#password').show().attr('required', 'true');
                    $('#adresse').show().attr('required', 'true');
                }
            })
        </script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
