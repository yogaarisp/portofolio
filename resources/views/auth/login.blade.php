<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ config('app.name', 'Yoga Aris Purwanto') }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Manrope:wght@600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "surface": "#f5faf8",
                      "inverse-on-surface": "#edf2f0",
                      "secondary-fixed-dim": "#e9c349",
                      "surface-dim": "#d6dbd9",
                      "primary-fixed-dim": "#6bd8cb",
                      "on-error": "#ffffff",
                      "tertiary-fixed": "#ffdbce",
                      "on-tertiary-container": "#fffbff",
                      "secondary": "#735c00",
                      "on-primary-fixed-variant": "#005049",
                      "surface-tint": "#006a61",
                      "primary-container": "#008378",
                      "tertiary-container": "#b05e3d",
                      "surface-container-highest": "#dee4e1",
                      "inverse-primary": "#6bd8cb",
                      "surface-bright": "#f5faf8",
                      "secondary-fixed": "#ffe088",
                      "text-muted": "#64748B",
                      "surface-variant": "#dee4e1",
                      "surface-container-lowest": "#ffffff",
                      "on-error-container": "#93000a",
                      "on-primary-container": "#f4fffc",
                      "on-secondary-fixed": "#241a00",
                      "on-tertiary": "#ffffff",
                      "surface-container": "#eaefed",
                      "on-tertiary-fixed": "#370e00",
                      "tertiary-fixed-dim": "#ffb59a",
                      "on-tertiary-fixed-variant": "#773215",
                      "on-secondary": "#ffffff",
                      "inverse-surface": "#2c3130",
                      "background": "#f5faf8",
                      "surface-container-low": "#f0f5f2",
                      "on-surface-variant": "#3d4947",
                      "surface-container-high": "#e4e9e7",
                      "error-container": "#ffdad6",
                      "bg-light": "#F8FAFC",
                      "surface-teal-dim": "#0F766E",
                      "error": "#ba1a1a",
                      "bg-dark": "#0F172A",
                      "on-surface": "#171d1c",
                      "text-primary": "#1E293B",
                      "accent-maroon": "#7F1D1D",
                      "outline-variant": "#bcc9c6",
                      "on-secondary-container": "#745c00",
                      "on-background": "#171d1c",
                      "on-primary": "#ffffff",
                      "tertiary": "#924628",
                      "primary": "#00685f",
                      "on-primary-fixed": "#00201d",
                      "secondary-container": "#fed65b",
                      "primary-fixed": "#89f5e7",
                      "outline": "#6d7a77",
                      "on-secondary-fixed-variant": "#574500"
              },
              "borderRadius": {
                      "DEFAULT": "1rem",
                      "lg": "2rem",
                      "xl": "3rem",
                      "full": "9999px"
              }
            }
          }
        }
    </script>
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .login-input::placeholder {
            color: #64748b;
            opacity: 1;
            font-weight: 500;
            letter-spacing: 0.01em;
        }
        .login-input::-webkit-input-placeholder {
            color: #64748b;
            opacity: 1;
            font-weight: 500;
            letter-spacing: 0.01em;
        }
        .login-input::-moz-placeholder {
            color: #64748b;
            opacity: 1;
            font-weight: 500;
            letter-spacing: 0.01em;
        }
        .login-input:-ms-input-placeholder {
            color: #64748b;
            font-weight: 500;
        }
        .login-input:-webkit-autofill,
        .login-input:-webkit-autofill:hover,
        .login-input:-webkit-autofill:focus {
            -webkit-text-fill-color: #334155;
            box-shadow: 0 0 0 1000px #f0f5f2 inset;
            transition: background-color 9999s ease-in-out 0s;
        }
        body {
            background-color: #f5faf8;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex flex-col text-on-surface">
    <main class="flex-grow flex items-center justify-center px-6 py-12 relative overflow-hidden">
        {{-- Abstract Decorative Elements --}}
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden opacity-20">
            <div class="absolute -top-20 -left-20 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-secondary-fixed-dim rounded-full blur-3xl"></div>
        </div>

        <div class="w-full max-w-[480px] z-10">
            {{-- Branding Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center p-4 bg-primary text-on-primary rounded-lg shadow-lg mb-4">
                    <span class="material-symbols-outlined text-4xl">terminal</span>
                </div>
                <h1 class="text-2xl font-bold text-primary tracking-tight font-['Manrope']">Yoga Aris Purwanto</h1>
            </div>

            {{-- Login Card --}}
            <div class="bg-surface-container-lowest rounded-lg shadow-xl p-6 sm:p-10 border border-outline-variant">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-on-surface mb-2 font-['Manrope']">Welcome Back</h2>
                    <p class="text-text-muted text-sm">Secure access to your professional IT portfolio management portal.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    {{-- Email Field --}}
                    <div class="space-y-2">
                        <label class="text-xs font-semibold text-on-surface-variant block ml-1 uppercase tracking-wider">Email Address</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-[42%] text-slate-500 pointer-events-none">
                                <svg class="w-[22px] h-[22px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l9 6 9-6m-18 0h18v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                                </svg>
                            </span>
                            <input class="login-input w-full pl-12 pr-4 py-3.5 bg-surface-container-low border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-sm text-slate-700 @error('email') border-error @enderror"
                                   placeholder="it.specialist@example.com" type="email" name="email" value="{{ old('email') }}" required autofocus/>
                        </div>
                        @error('email')
                            <p class="text-error text-[10px] font-bold mt-1 ml-1 uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password Field --}}
                    <div class="space-y-2">
                        <div class="flex justify-between items-center px-1">
                            <label class="text-xs font-semibold text-on-surface-variant block uppercase tracking-wider">Password</label>
                            <a class="text-xs font-bold text-primary hover:underline transition-all" href="#">Forgot Password?</a>
                        </div>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-[42%] text-slate-500 pointer-events-none">
                                <svg class="w-[22px] h-[22px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10V7a4 4 0 118 0v3m-9 0h10a2 2 0 012 2v7a2 2 0 01-2 2H7a2 2 0 01-2-2v-7a2 2 0 012-2z" />
                                </svg>
                            </span>
                            <input class="login-input w-full pl-12 pr-4 py-3.5 bg-surface-container-low border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-sm text-slate-700"
                                   placeholder="••••••••" type="password" name="password" required/>
                        </div>
                    </div>

                    {{-- Security Checkbox --}}
                    <div class="flex items-center space-x-3 px-1">
                        <input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary cursor-pointer" id="remember" type="checkbox" name="remember"/>
                        <label class="text-sm text-on-surface-variant select-none cursor-pointer font-medium" for="remember">Remember this device for 30 days</label>
                    </div>

                    {{-- Sign In Button --}}
                    <button class="w-full py-4 bg-primary text-on-primary font-bold text-lg rounded-lg hover:bg-primary-container transition-all active:scale-[0.98] shadow-md flex items-center justify-center gap-2" type="submit">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">login</span>
                        Sign In
                    </button>
                </form>

                {{-- Divider --}}
                <div class="my-8 flex items-center gap-4">
                    <div class="h-px bg-outline-variant flex-grow"></div>
                    <span class="text-[10px] text-outline font-bold tracking-[0.2em]">SECURE ENVIRONMENT</span>
                    <div class="h-px bg-outline-variant flex-grow"></div>
                </div>

                {{-- Portfolio Return --}}
                <div class="text-center">
                    <a class="inline-flex items-center gap-2 text-primary text-xs font-bold hover:gap-3 transition-all duration-300" href="/">
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        Return to Portfolio
                    </a>
                </div>
            </div>

            {{-- Visual Security Badge --}}
            <div class="mt-8 flex justify-center items-center gap-6 text-outline opacity-70">
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">verified_user</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Encrypted</span>
                </div>
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">shield</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Protected</span>
                </div>
            </div>
        </div>
    </main>

    {{-- Shared Footer --}}
    <footer class="bg-white/50 border-t border-outline-variant backdrop-blur-sm">
        <div class="flex flex-col md:flex-row justify-between items-center w-full px-8 py-8 max-w-[1200px] mx-auto gap-4 font-['Manrope'] text-xs">
            <div class="text-slate-500 font-medium">
                &copy; {{ date('Y') }} Yoga Aris Purwanto. Professional & Reliable Infrastructure.
            </div>
            <div class="flex gap-6">
                <a class="text-slate-500 hover:text-primary transition-colors font-semibold" href="#">Privacy Policy</a>
                <a class="text-slate-500 hover:text-primary transition-colors font-semibold" href="#">Security Standards</a>
                <a class="text-slate-500 hover:text-primary transition-colors font-semibold" href="#">System Status</a>
            </div>
        </div>
    </footer>
</body>
</html>
