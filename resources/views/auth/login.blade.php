<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WhatsFlow | Login</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-50">
    <div class="min-h-screen flex">
        
        <!-- Left Side: Branding / Info -->
        <div class="hidden lg:flex lg:w-1/2 bg-indigo-600 relative overflow-hidden items-center justify-center">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70"></div>
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70"></div>
            
            <div class="relative z-10 max-w-lg px-12 text-center">
                <div class="flex justify-center mb-8">
                    <div class="w-20 h-20 bg-white rounded-3xl shadow-xl flex items-center justify-center transform -rotate-3 hover:rotate-0 transition duration-300">
                        <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-6 tracking-tight">Welcome to WhatsFlow</h1>
                <p class="text-indigo-100 text-lg leading-relaxed">
                    The complete WhatsApp Business Automation Platform. Engage your leads, build smart auto-replies, and scale your customer support effortlessly.
                </p>
                
                <div class="mt-12 grid grid-cols-2 gap-4 text-left">
                    <div class="bg-indigo-700/50 backdrop-blur-sm border border-indigo-500/30 p-5 rounded-2xl">
                        <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </div>
                        <h3 class="text-white font-semibold mb-1">Smart Campaigns</h3>
                        <p class="text-indigo-200 text-sm">Send personalized bulk broadcasts securely.</p>
                    </div>
                    <div class="bg-indigo-700/50 backdrop-blur-sm border border-indigo-500/30 p-5 rounded-2xl">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        </div>
                        <h3 class="text-white font-semibold mb-1">AI Knowledge Base</h3>
                        <p class="text-indigo-200 text-sm">Train your bot to answer FAQs instantly.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
            <div class="w-full max-w-md">
                
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center gap-3 mb-10">
                    <div class="w-12 h-12 bg-indigo-600 rounded-2xl shadow-md flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <span class="text-3xl font-bold text-gray-900 tracking-tight">WhatsFlow</span>
                </div>

                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 tracking-tight mb-2">Sign in to your account</h2>
                    <p class="text-gray-500">Access your dashboard and manage your workspace.</p>
                </div>

                <!-- Session Status -->
                @if(session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-xl">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all shadow-sm">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500 font-medium">Forgot password?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all shadow-sm">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Keep me logged in</label>
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                        Sign In
                    </button>
                </form>

                <!-- Demo Credentials Card -->
                <div class="mt-8 bg-blue-50 border border-blue-100 rounded-2xl p-5 shadow-sm">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-0.5">
                            <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="ml-3 w-full">
                            <h3 class="text-sm font-bold text-blue-900">Portfolio Demo Access</h3>
                            <div class="mt-2 text-sm text-blue-800">
                                <p class="mb-3">Use the following credentials to explore the SaaS dashboard:</p>
                                <div class="bg-white/70 rounded-xl p-3 font-mono text-sm border border-blue-200/60 shadow-sm">
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-gray-500">Email:</span>
                                        <span class="font-bold text-gray-900 select-all">demo@whatsflow.com</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-500">Password:</span>
                                        <span class="font-bold text-gray-900 select-all">password</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
