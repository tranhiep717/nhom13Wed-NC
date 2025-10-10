<!DOCTYPE html>
<html lang="vi">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng nhập - Electro</title>
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

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
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
            <div class="mb-8 flex flex-col items-center">
                <a href="{{ url('/') }}">
                    <h1 class="text-primary mb-2 font-['Pacifico'] text-4xl">Electro</h1>
                </a>
                <p class="text-sm text-gray-400">Chào mừng bạn quay trở lại</p>
            </div>

            {{-- Form đăng nhập --}}
            <form method="POST" action="{{ route('login') }}" id="loginForm" class="block">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-white">Email hoặc số điện thoại</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                                <i class="ri-user-line text-lg"></i>
                            </div>
                            <input type="text" id="email" name="email" value="{{ old('email') }}"
                                class="w-full rounded-xl border border-white/20 bg-white/10 py-3 pl-10 pr-4 text-sm text-white placeholder-white/50 focus:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/30"
                                placeholder="Nhập email hoặc số điện thoại của bạn" required autofocus />
                        </div>
                        @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-white">Mật khẩu</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 flex h-full w-10 items-center justify-center text-white/70">
                                <i class="ri-lock-line text-lg"></i>
                            </div>
                            <input type="password" id="password" name="password"
                                class="hide-password-toggle w-full rounded-xl border border-white/20 bg-white/10 py-3 pl-10 pr-10 text-sm text-white placeholder-white/50 focus:border-white/30 focus:outline-none focus:ring-2 focus:ring-white/30"
                                placeholder="Nhập mật khẩu của bạn" required autocomplete="current-password" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex h-full w-10 items-center justify-center text-white/70">
                                <i class="ri-eye-line text-lg" id="passwordIcon"></i>
                            </button>
                        </div>
                        @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" name="remember"
                                class="checked:border-primary checked:bg-primary peer h-5 w-5 cursor-pointer rounded-full border-2 border-white/20 bg-white/10" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 cursor-pointer text-sm text-white">Ghi nhớ đăng nhập</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-white hover:text-white/80">Quên mật khẩu?</a>
                        @endif
                    </div>

                    <button type="submit"
                        class="bg-primary hover:bg-primary/90 w-full whitespace-nowrap rounded-xl py-3 text-sm font-medium text-white transition duration-300">Đăng
                        nhập</button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-white/70">Chưa có tài khoản? <a href="{{ route('register') }}"
                        class="text-primary font-medium hover:text-white/80">Đăng ký ngay</a></p>
            </div>
        </div>
    </div>

    <script>
        // Toggle hiện/ẩn mật khẩu
        document.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.getElementById("togglePassword");
            const password = document.getElementById("password");
            const passwordIcon = document.getElementById("passwordIcon");
            if (togglePassword && password && passwordIcon) {
                togglePassword.addEventListener("click", function () {
                    const type =
                        password.getAttribute("type") === "password" ? "text" : "password";
                    password.setAttribute("type", type);
                    if (type === "password") {
                        passwordIcon.classList.remove("ri-eye-off-line");
                        passwordIcon.classList.add("ri-eye-line");
                    } else {
                        passwordIcon.classList.remove("ri-eye-line");
                        passwordIcon.classList.add("ri-eye-off-line");
                    }
                });
            }
        });
    </script>
</body>

</html>

