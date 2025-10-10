<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xác minh email - Electro</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <style>
      body {
        background-color: #1a1f2e;
        font-family: 'Inter', sans-serif;
      }
      .auth-container {
        background-color: #22273a;
      }
      .logo {
        color: #e63946;
        font-family: 'Pacifico', serif;
      }
      .primary-btn {
        background-color: #e63946;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px;
        width: 100%;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
      }
      .primary-btn:hover {
        background-color: #d62f3d;
      }
      .link {
        color: #e63946;
        text-decoration: none;
        cursor: pointer;
      }
      .link:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body class="min-h-screen flex items-center justify-center p-4">
    <div class="auth-container w-full max-w-md rounded-lg p-8 shadow-lg text-center">
      <h1 class="logo text-3xl mb-4">Electro</h1>
      <h2 class="text-white text-lg font-semibold mb-2">Xác minh địa chỉ email của bạn</h2>

      @if (session('status') === 'verification-link-sent')
        <div class="text-green-400 text-sm mb-4">
          Một liên kết xác minh mới đã được gửi tới email của bạn.
        </div>
      @endif

      <p class="text-gray-300 text-sm mb-6">
        Trước khi tiếp tục, vui lòng kiểm tra email của bạn để xác minh.
        <br>
        Nếu bạn chưa nhận được email, bạn có thể gửi lại liên kết bên dưới.
      </p>

      <form method="POST" action="{{ route('verification.send') }}" class="mb-4">
        @csrf
        <button type="submit" class="primary-btn">Gửi lại liên kết xác minh</button>
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-sm text-gray-400 hover:underline">Đăng xuất</button>
      </form>
    </div>
  </body>
</html>
