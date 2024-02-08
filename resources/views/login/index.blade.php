<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	@vite('resources/css/login.css')
	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="{{route('auth')}}" method="POST" class="login-email">
            @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="text-red-500">{{ $error }}</div>
            @endforeach
        @endif

        @if (session()->has('error'))
            <div class="text-red-500">{{ session('error') }}</div>
        @endif
            @csrf
            @method('POST')
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Connexion</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Motdepass" name="password"  >
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Connexion</button>
			</div>
			<p class="login-register-text">Vous n'avez pas de compte ? <a href="{{route('registration')}}">Inscrivez-vous ici</a>.</p>
		</form>
	</div>
</body>
</html>
