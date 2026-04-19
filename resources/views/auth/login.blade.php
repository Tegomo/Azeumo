<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Connexion — Azeumo Admin</title>
  @vite(['resources/css/app.css'])
  <style>
    *, *::before, *::after { box-sizing: border-box; }
    body {
      margin: 0; padding: 0;
      background: #f0f0f1;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      color: #1d2327;
      display: flex; flex-direction: column; align-items: center;
      justify-content: center; min-height: 100vh;
    }

    .login-logo {
      margin-bottom: 20px; text-align: center;
    }
    .login-logo a {
      display: inline-flex; flex-direction: column; align-items: center; gap: 8px;
      text-decoration: none;
    }
    .login-logo .logo-icon {
      width: 64px; height: 64px;
      background: linear-gradient(135deg, #FF7400 0%, #e66800 100%);
      border-radius: 16px;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 4px 16px rgba(255,116,0,.35);
    }
    .login-logo .logo-icon svg { width: 34px; height: 34px; color: #fff; }
    .login-logo h1 {
      font-size: 22px; font-weight: 700; color: #1d2327; margin: 0;
      letter-spacing: -.02em;
    }
    .login-logo p { font-size: 12px; color: #646970; margin: 0; }

    #loginform {
      background: #fff;
      border: 1px solid #c3c4c7;
      border-radius: 4px;
      box-shadow: 0 1px 3px rgba(0,0,0,.04);
      padding: 26px 24px;
      width: 100%; max-width: 340px;
    }

    .login-form-group { margin-bottom: 18px; }
    .login-form-group label {
      display: block; font-size: 14px; font-weight: 600;
      color: #1d2327; margin-bottom: 6px;
    }
    .login-form-group input {
      display: block; width: 100%;
      padding: 8px 12px;
      border: 1px solid #c3c4c7; border-radius: 3px;
      font-size: 15px; color: #1d2327;
      background: #fff; outline: none;
      transition: border-color .15s, box-shadow .15s;
      line-height: 1.5;
    }
    .login-form-group input:focus {
      border-color: #FF7400;
      box-shadow: 0 0 0 1px #FF7400;
    }

    .login-remember {
      display: flex; align-items: center; gap: 8px;
      margin-bottom: 20px; font-size: 13px; color: #1d2327;
    }
    .login-remember input { width: 16px; height: 16px; accent-color: #FF7400; }

    .wp-submit {
      width: 100%; padding: 10px;
      background: linear-gradient(135deg, #FF7400 0%, #e66800 100%);
      color: #fff; font-size: 15px; font-weight: 600;
      border: none; border-radius: 3px; cursor: pointer;
      transition: opacity .15s;
      letter-spacing: .02em;
    }
    .wp-submit:hover { opacity: .9; }

    .login-error {
      background: #fcf0f1; border: 1px solid #f5c6cb;
      border-left: 4px solid #d63638;
      border-radius: 0 3px 3px 0;
      padding: 10px 14px; margin-bottom: 16px;
      font-size: 13px; color: #d63638;
    }

    .login-footer {
      margin-top: 16px; text-align: center;
    }
    .login-footer a {
      font-size: 13px; color: #646970; text-decoration: none;
    }
    .login-footer a:hover { color: #FF7400; text-decoration: underline; }

    .back-to-site {
      margin-top: 20px; font-size: 13px; color: #646970; text-align: center;
    }
    .back-to-site a { color: #646970; text-decoration: none; }
    .back-to-site a:hover { color: #1d2327; }
  </style>
</head>
<body>

  <div class="login-logo">
    <a href="{{ url('/') }}">
      <div class="logo-icon">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
      </div>
      <h1>Azeumo</h1>
      <p>Espace administration</p>
    </a>
  </div>

  <form id="loginform" method="POST" action="{{ route('login') }}">
    @csrf

    @if($errors->any())
      <div class="login-error">
        Email ou mot de passe incorrect.
      </div>
    @endif

    @if(session('status'))
      <div style="background:#edfaef;border:1px solid #a3d9a5;border-left:4px solid #00a32a;border-radius:0 3px 3px 0;padding:10px 14px;margin-bottom:16px;font-size:13px;color:#00a32a;">
        {{ session('status') }}
      </div>
    @endif

    <div class="login-form-group">
      <label for="email">Adresse e-mail</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}"
        required autofocus autocomplete="username"
        placeholder="admin@azeumo.com" />
    </div>

    <div class="login-form-group">
      <label for="password">Mot de passe</label>
      <input id="password" type="password" name="password"
        required autocomplete="current-password"
        placeholder="••••••••" />
    </div>

    <div class="login-remember">
      <input type="checkbox" name="remember" id="remember_me" />
      <label for="remember_me" style="font-weight:400;">Se souvenir de moi</label>
    </div>

    <button type="submit" class="wp-submit">Se connecter</button>
  </form>

  @if(Route::has('password.request'))
  <div class="login-footer">
    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
  </div>
  @endif

  <div class="back-to-site">
    <a href="{{ url('/') }}">← Retour au site</a>
  </div>

</body>
</html>
