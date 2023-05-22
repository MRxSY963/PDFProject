<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Memo PDF') }}</title>

    {{-- Website Icon --}}
    <link rel="icon" type="image/x-icon" href="/images/WSTH.png">

    <!-- Css Files -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/css/login-form.css">
    <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    

<main class="flexbox">
    <div class="login-wrapper flexbox">
      <div class="login view-width">
        <div class="login-inner">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
            <div class="login-form-top">
              <h3>Login</h3>
              <p>All fields marked * are required</p>
            </div>
            <div class="login-form-center">
              <fieldset class="input-grid inpt-grd-2">
                <div class="input-wrapper">
                  <p>Email*</p>
                  <div class="input-inner flexbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="input-wrapper">
                  <p>Password*</p>
                  <div class="input-inner flexbox">
                    <ion-icon id="pass-show-hide" name="eye-off-outline"></ion-icon>
                    <input id="password" type="password" placeholder="Password" class="form-control input @error('password') is-invalid @enderror" name="password" aria-label="" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="login-form-bottom flexbox-left">
              <div class="button-wrapper">
                <button type="submit" class="button btn-primary flexbox">
                  <ion-icon name="log-in-outline"></ion-icon><div class="btn-secondary"></div>
                  {{ __('Login') }}
                </button>

              </div>
            </div>
          </form>
        </div>
      </div>
  
      <div class="login-background-overlay"></div>
      <img class="login-background" src="https://images.unsplash.com/photo-1564737956548-df7b58e61146?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
    </div>
  </main>
  <script src="/js/login-form.js"></script>
</body>
</html>