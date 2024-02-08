<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @vite('resources/css/register.css')
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        {!! implode('', $errors->all('<div style="color: red">:message</div>')) !!}
        @endif
        <div class="user-details">
          <div class="input-box">
            <input type="text" name="username" placeholder="Enter your UserName" required>
          </div>
          <div class="input-box">
            <input type="text" name="firstname" placeholder="Enter your FirstName" required>
          </div>
          <div class="input-box">
            <input type="text" name="lastname" placeholder="Enter your LastName" required>
          </div>
          <div class="input-box">
            <input type="text" name="email" placeholder="Entrer votre Email" required>
          </div>
          <div class="input-box">
            <input type="text" name="phone" placeholder="Enter your phone number" required>
          </div>
          <div class="input-box">
            <input type="password" name="pass" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <input type="password" name="cpass" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>

        <p class="login-register-text">Did you have Account? <a href="{{'login'}}">conectez-vous ici</a>.</p>

      </form>
    </div>
  </div>

</body>
</html>
