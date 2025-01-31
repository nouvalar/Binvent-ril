<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Binvent</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-bulet.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">
</head>
<body>
    <div class="login-container">
        <!-- Add the logo image here -->
        <img src="{{ asset('assets/img/Logo-Binayasa copy.webp') }}" alt="Logo Binayasa" style="display: block; margin: 0 auto 20px; width: 160px; height: auto;">
        
        <form action="{{ route('login.post') }}" method="POST">
            @csrf 
            <h2>Log In Akun Binvent</h2>
            <div class="form-group">
                 <input type="email" placeholder="Alamat Email" id="email" name="email" required style="width: 300px; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
                 <br>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Kata Sandi" id="password" name="password" required style="width: 300px; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
                <br>
            </div>
            <button type="submit">LOG IN</button>
        </form>
    </div> 
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>