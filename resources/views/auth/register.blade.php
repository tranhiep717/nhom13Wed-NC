
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
