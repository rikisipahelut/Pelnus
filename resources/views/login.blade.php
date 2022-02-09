<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/asset_sb_admin/img/logoico.ico">

    <title>Login Pelnus Jaya Logistik</title>

    <!-- Bootstrap core CSS -->
    <link href="/asset_sb_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/asset_sb_admin/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    
    <form class="form-signin" method="post" action="/auth/login">
    @csrf
      <img class="mb-4" src="/asset_sb_admin/img/logosvg.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Pelita Nusantara Jaya Logistik</h1>
      @if(session('status'))
          <div class="alert alert-success mt-2">
            {{session('status')}}
          </div>
      @endif
      <label for="username" class="sr-only">Username</label>
      <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username')}}" placeholder="Masukan nama pengguna" autofocus>
      @error('username')
									<div class="invalid-feedback mb-2">
										{{$message}}
									</div>
			@enderror
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan kata kunci">
      @error('password')
									<div class="invalid-feedback mb-2">
										{{$message}}
									</div>
			@enderror
      <!--  <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Masuk</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
    </form>
  </body>
</html>
