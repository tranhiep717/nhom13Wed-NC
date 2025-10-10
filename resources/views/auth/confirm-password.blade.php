<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xác nhận mật khẩu - Electro</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
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
      .input-field {
        background-color: #f8f9fa;
        border: none;
        border-radius: 8px;
        padding: 12px 16px;
        width: 100%;
        color: #333;
      }
      .input-field:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(230, 57, 70, 0.3);
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
    </style>
  </head>
  <body class="min-h-screen flex items-center justify-center p-4">
    <div class="auth-container w-full max-w-md rounded-lg p-8 shadow-lg">
      <div class="text-center mb-6">
        <h1 class="logo text-3xl mb-3">Electro</h1>
        <p class="text-gray-300 text-sm">Xác nhận mật khẩu của bạn</p>
        <p class="text-gray-400 text-xs mt-2">Vui lòng nhập lại mật khẩu để tiếp tục</p>
      </div>

      <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
          <label for="password" class="block text-gray-300 mb-2 text-sm">Mật khẩu</label>
          <div class="relative">
            <input
              id="password"
              type="password"
              name="password"
              required
              class="input-field pr-10"
              placeholder="Nhập mật khẩu"
            />
            <button
              type="button"
              class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
              onclick="togglePasswordVisibility()"
            >
              <div class="w-6 h-6 flex items-center justify-center">
                <i id="eye-icon" class="ri-eye-off-line"></i>
              </div>
            </button>
          </div>
          @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button type="submit" class="primary-btn !rounded-button whitespace-nowrap">
            Xác nhận
          </button>
        </div>

        <div class="text-center text-sm">
          <a href="{{ route('password.request') }}" class="text-gray-400 hover:underline">
            Quên mật khẩu?
          </a>
        </div>
      </form>
    </div>

    <script>
      function togglePasswordVisibility() {
        const input = document.getElementById("password");
        const icon = document.getElementById("eye-icon");
        if (input.type === "password") {
          input.type = "text";
          icon.className = "ri-eye-line";
        } else {
          input.type = "password";
          icon.className = "ri-eye-off-line";
        }
      }
    </script>
  </body>
</html>
