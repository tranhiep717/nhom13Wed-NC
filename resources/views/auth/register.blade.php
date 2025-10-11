<<<<<<< HEAD

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Đăng ký - Electro</title>
<script src="https://cdn.tailwindcss.com/3.4.16">
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: { primary: "#dc2626", secondary: "#1f2937" },
      borderRadius: {
        none: "0px",
        sm: "4px",
        DEFAULT: "8px",
        md: "12px",
        lg: "16px",
        xl: "20px",
        "2xl": "24px",
        "3xl": "32px",
        full: "9999px",
        button: "8px",
      },
    },
  },
};
</script>
<style>
:where([class^="ri-"])::before { content: "\f3c2"; }
body {
font-family: 'Roboto', sans-serif;
}
.hide-password-toggle::-ms-reveal,
.hide-password-toggle::-ms-clear {
display: none;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
-webkit-appearance: none;
margin: 0;
}
@media (max-width: 768px) {
.login-container {
grid-template-columns: 1fr;
}
.banner-section {
display: none;
}
}
</style>
</head>
<body class="min-h-screen">
<div class="min-h-screen flex items-center justify-center p-4">
<div class="w-full max-w-md bg-[#24262d] rounded-xl shadow-2xl p-8">
<div class="flex justify-center mb-8">
<a href="{{route('home')}}"><h1 class="text-3xl font-['Pacifico'] text-white">Electro</h1></a>
</div>
<form id="registerForm" class="block" action="" method="POST">
<div class="mb-6">
<label for="registerEmail" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 w-10 h-full flex items-center justify-center text-gray-400">
<i class="ri-mail-line"></i>
</div>
<input type="email" id="registerEmail" name="email" class="w-full pl-10 pr-4 py-3 bg-[#1a1c23] border border-gray-700 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary text-sm text-white" placeholder="Nhập email của bạn">
</div>
<p id="registerEmailError" class="mt-1 text-sm text-red-500 hidden">Vui lòng nhập email hợp lệ</p>
</div>
<div class="mb-6">
<label for="registerPassword" class="block text-sm font-medium text-gray-300 mb-2">Mật khẩu</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 w-10 h-full flex items-center justify-center text-gray-400">
<i class="ri-lock-line"></i>
</div>
<input type="password" id="registerPassword" name="password" class="hide-password-toggle w-full pl-10 pr-10 py-3 bg-[#1a1c23] border border-gray-700 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary text-sm text-white" placeholder="Tạo mật khẩu">
<button type="button" id="toggleRegisterPassword" class="absolute inset-y-0 right-0 w-10 h-full flex items-center justify-center text-gray-400">
<i class="ri-eye-line" id="registerPasswordIcon"></i>
</button>
</div>
<p id="registerPasswordError" class="mt-1 text-sm text-red-500 hidden">Mật khẩu phải có ít nhất 6 ký tự</p>
</div>
<div class="mb-6">
<label for="confirmPassword" class="block text-sm font-medium text-gray-300 mb-2">Xác nhận mật khẩu</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 w-10 h-full flex items-center justify-center text-gray-400">
<i class="ri-lock-line"></i>
</div>
<input type="password" id="confirmPassword" name="confirmPassword" class="hide-password-toggle w-full pl-10 pr-10 py-3 bg-[#1a1c23] border border-gray-700 rounded-button focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary text-sm text-white" placeholder="Nhập lại mật khẩu">
<button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 w-10 h-full flex items-center justify-center text-gray-400">
<i class="ri-eye-line" id="confirmPasswordIcon"></i>
</button>
</div>
<p id="confirmPasswordError" class="mt-1 text-sm text-red-500 hidden">Mật khẩu không khớp</p>
</div>
<button type="submit" class="w-full bg-primary text-white py-3 rounded-full hover:bg-primary/90 transition duration-300 font-medium text-sm whitespace-nowrap">Đăng ký</button>
</form>
<div class="mt-8 text-center">
<p class="text-sm text-gray-400">Đã có tài khoản? <a href="{{route('login')}}" class="text-primary hover:text-primary/80 font-medium">Đăng nhập ngay</a></p>
</div>
<div class="mt-8">
<div class="relative">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-gray-700"></div>
</div>
<div class="relative flex justify-center">
<span class="px-4 bg-[#24262d] text-sm text-gray-400">Hoặc đăng ký với</span>
</div>
</div>
<div class="mt-6 grid grid-cols-2 gap-4">
<button type="button" class="flex items-center justify-center py-2.5 border border-gray-700 rounded-full hover:bg-[#1a1c23] transition duration-300 whitespace-nowrap">
<i class="ri-google-fill text-lg mr-2 text-red-500"></i>
<span class="text-sm font-medium text-gray-300">Google</span>
</button>
<button type="button" class="flex items-center justify-center py-2.5 border border-gray-700 rounded-full hover:bg-[#1a1c23] transition duration-300 whitespace-nowrap">
<i class="ri-facebook-fill text-lg mr-2 text-blue-600"></i>
<span class="text-sm font-medium text-gray-300">Facebook</span>
</button>
</div>
</div>
<div class="mt-8 text-center">
<p class="text-xs text-gray-400">Bằng việc đăng ký, bạn đồng ý với <a href="#" class="text-primary">Điều khoản dịch vụ</a> và <a href="#" class="text-primary">Chính sách bảo mật</a> của chúng tôi</p>
</div>
</div>
</div>
<script id="formValidation">
document.addEventListener("DOMContentLoaded", function () {
  const registerForm = document.getElementById("registerForm");
  const registerEmailInput = document.getElementById("registerEmail");
  const registerPasswordInput = document.getElementById("registerPassword");
  const confirmPasswordInput = document.getElementById("confirmPassword");
  const registerEmailError = document.getElementById("registerEmailError");
  const registerPasswordError = document.getElementById(
    "registerPasswordError",
  );
  const confirmPasswordError = document.getElementById("confirmPasswordError");
  registerForm.addEventListener("submit", function (e) {
    e.preventDefault();
    let isValid = true;
    registerEmailError.classList.add("hidden");
    registerPasswordError.classList.add("hidden");
    confirmPasswordError.classList.add("hidden");
    const emailValue = registerEmailInput.value.trim();
    if (!emailValue) {
      registerEmailError.textContent = "Vui lòng nhập email";
      registerEmailError.classList.remove("hidden");
      isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
      registerEmailError.textContent = "Email không hợp lệ";
      registerEmailError.classList.remove("hidden");
      isValid = false;
    }
    if (!registerPasswordInput.value) {
      registerPasswordError.textContent = "Vui lòng nhập mật khẩu";
      registerPasswordError.classList.remove("hidden");
      isValid = false;
    } else if (registerPasswordInput.value.length < 6) {
      registerPasswordError.textContent = "Mật khẩu phải có ít nhất 6 ký tự";
      registerPasswordError.classList.remove("hidden");
      isValid = false;
    }
    if (registerPasswordInput.value !== confirmPasswordInput.value) {
      confirmPasswordError.textContent = "Mật khẩu không khớp";
      confirmPasswordError.classList.remove("hidden");
      isValid = false;
    }
    if (isValid) {
      showNotification("success", "Đăng ký thành công! Vui lòng đăng nhập.");
      setTimeout(() => {
        window.location.href = "login.html";
      }, 1500);
    }
  });
  function showNotification(type, message) {
    const notification = document.createElement("div");
    notification.className = `fixed top-4 right-4 p-4 rounded-xl text-white ${type === "success" ? "bg-green-500" : "bg-red-500"} transition-opacity duration-300`;
    notification.textContent = message;
    document.body.appendChild(notification);
    setTimeout(() => {
      notification.style.opacity = "0";
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 3000);
  }
});
</script>
<script id="passwordToggle">
document.addEventListener("DOMContentLoaded", function () {
  function setupPasswordToggle(toggleId, passwordId, iconId) {
    const toggleButton = document.getElementById(toggleId);
    const passwordInput = document.getElementById(passwordId);
    const passwordIcon = document.getElementById(iconId);
    toggleButton.addEventListener("click", function () {
      const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      if (type === "password") {
        passwordIcon.classList.remove("ri-eye-off-line");
        passwordIcon.classList.add("ri-eye-line");
      } else {
        passwordIcon.classList.remove("ri-eye-line");
        passwordIcon.classList.add("ri-eye-off-line");
      }
    });
  }
  setupPasswordToggle(
    "toggleRegisterPassword",
    "registerPassword",
    "registerPasswordIcon",
  );
  setupPasswordToggle(
    "toggleConfirmPassword",
    "confirmPassword",
    "confirmPasswordIcon",
  );
});
</script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng ký - Electro</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#dc2626",
                        secondary: "#1f2937",
                    },
                    borderRadius: {
                        none: "0px",
                        sm: "4px",
                        DEFAULT: "8px",
                        md: "12px",
                        lg: "16px",
                        xl: "20px",
                        "2xl": "24px",
                        "3xl": "32px",
                        full: "9999px",
                        button: "8px",
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1a1c23;
        }

        .hide-password-toggle::-ms-reveal,
        .hide-password-toggle::-ms-clear {
            display: none;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="w-full max-w-md rounded-xl bg-[#24262d] p-8 shadow-2xl relative">
            <a href="{{ url('/') }}"
                class="top-6 left-6 absolute text-gray-400 transition duration-300 hover:text-white">
                <i class="ri-arrow-left-s-line align-middle text-2xl"></i>
            </a>
            <div class="mb-8 flex justify-center">
                <a href="{{ url('/') }}">
                    <h1 class="text-primary mb-2 font-['Pacifico'] text-3xl">Electro</h1>
                </a>
            </div>

            {{-- Form đăng ký --}}
            <form method="POST" action="{{ route('register') }}" id="registerForm" class="block">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="mb-2 block text-sm font-medium text-white">Họ và tên</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                            <i class="ri-user-line"></i>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="rounded-button focus:ring-primary/50 focus:border-primary w-full border border-white/20 bg-white/10 py-3 pl-10 pr-4 text-sm text-white placeholder-white/50 focus:outline-none focus:ring-2"
                            placeholder="Nhập họ và tên của bạn" required autofocus />
                    </div>
                    @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="mb-2 block text-sm font-medium text-white">Email</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                            <i class="ri-mail-line"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="rounded-button focus:ring-primary/50 focus:border-primary w-full border border-white/20 bg-white/10 py-3 pl-10 pr-4 text-sm text-white placeholder-white/50 focus:outline-none focus:ring-2"
                            placeholder="Nhập email của bạn" required />
                    </div>
                    @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="mb-2 block text-sm font-medium text-white">Mật khẩu</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                            <i class="ri-lock-line"></i>
                        </div>
                        <input type="password" id="password" name="password"
                            class="hide-password-toggle rounded-button focus:ring-primary/50 focus:border-primary w-full border border-white/20 bg-white/10 py-3 pl-10 pr-10 text-sm text-white placeholder-white/50 focus:outline-none focus:ring-2"
                            placeholder="Tạo mật khẩu" required autocomplete="new-password" />
                        <button type="button" id="toggleRegisterPassword"
                            class="absolute inset-y-0 right-0 flex h-full w-10 items-center justify-center text-white/70">
                            <i class="ri-eye-line" id="registerPasswordIcon"></i>
                        </button>
                    </div>
                    @error('password')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="mb-6">
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-white">Xác nhận mật khẩu</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                            <i class="ri-lock-line"></i>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="hide-password-toggle rounded-button focus:ring-primary/50 focus:border-primary w-full border border-white/20 bg-white/10 py-3 pl-10 pr-10 text-sm text-white placeholder-white/50 focus:outline-none focus:ring-2"
                            placeholder="Nhập lại mật khẩu" required autocomplete="new-password" />
                        <button type="button" id="toggleConfirmPassword"
                            class="absolute inset-y-0 right-0 flex h-full w-10 items-center justify-center text-white/70">
                            <i class="ri-eye-line" id="confirmPasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="bg-primary hover:bg-primary/90 w-full whitespace-nowrap rounded-full py-3 text-sm font-medium text-white transition duration-300">Đăng
                    ký</button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-white/70">Đã có tài khoản? <a href="{{ route('login') }}"
                        class="text-primary font-medium hover:text-white/80">Đăng nhập ngay</a></p>
            </div>

            <div class="mt-8 text-center">
                <p class="text-xs text-white/70">Bằng việc đăng ký, bạn đồng ý với <a href="#"
                        class="text-primary">Điều khoản dịch vụ</a> và <a href="#" class="text-primary">Chính sách bảo mật</a>
                    của chúng tôi</p>
            </div>
        </div>
    </div>

    <script>
        // Toggle hiện/ẩn mật khẩu
        document.addEventListener("DOMContentLoaded", function () {
            function setupPasswordToggle(toggleId, passwordId, iconId) {
                const toggleButton = document.getElementById(toggleId);
                const passwordInput = document.getElementById(passwordId);
                const passwordIcon = document.getElementById(iconId);
                toggleButton.addEventListener("click", function () {
                    const type =
                        passwordInput.getAttribute("type") === "password" ? "text" : "password";
                    passwordInput.setAttribute("type", type);
                    if (type === "password") {
                        passwordIcon.classList.remove("ri-eye-off-line");
                        passwordIcon.classList.add("ri-eye-line");
                    } else {
                        passwordIcon.classList.remove("ri-eye-line");
                        passwordIcon.classList.add("ri-eye-off-line");
                    }
                });
            }
            setupPasswordToggle(
                "toggleRegisterPassword",
                "password",
                "registerPasswordIcon"
            );
            setupPasswordToggle(
                "toggleConfirmPassword",
                "password_confirmation",
                "confirmPasswordIcon"
            );
        });
    </script>
</body>

</html>
>>>>>>> 3f0c0263bbe65bf7560769edd502045988e2964c
