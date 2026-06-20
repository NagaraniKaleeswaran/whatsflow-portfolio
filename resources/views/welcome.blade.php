<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WhatsFlow | Automate WhatsApp Conversations</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-slate-50 selection:bg-indigo-500 selection:text-white overflow-x-hidden">

    <!-- Navbar -->
    <nav class="absolute w-full z-50 px-6 py-6 lg:px-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl shadow-md flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-slate-900">WhatsFlow</span>
            </div>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-slate-600 hover:text-slate-900 px-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-6 py-2.5 rounded-full transition-all">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- 1. Hero Section -->
    <section class="relative pt-32 pb-32 lg:pt-48 lg:pb-48 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-indigo-50 to-slate-50 -z-10"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-indigo-600/10 rounded-full blur-3xl -z-10 mix-blend-multiply"></div>
        <div class="absolute top-40 right-0 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-3xl -z-10 mix-blend-multiply"></div>

        <div class="max-w-5xl mx-auto px-6 text-center z-10 relative">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 mb-8 leading-tight mx-auto max-w-4xl">
                Manage Leads, Campaigns & <br class="hidden sm:block"/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Customer Conversations</span> <br class="hidden sm:block"/>
                from One Platform
            </h1>
            <p class="text-lg lg:text-xl text-slate-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                A complete WhatsApp CRM and automation platform built with Laravel. Manage leads, customer chats, campaigns, templates and knowledge-based auto replies from a single dashboard.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-5">
                <a href="{{ route('login') }}" class="px-10 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-lg rounded-full shadow-lg shadow-indigo-600/30 transition-all flex items-center justify-center gap-2 w-full sm:w-auto">
                    Explore Portfolio Demo
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <a href="#features" class="px-10 py-4 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-lg rounded-full shadow-md shadow-slate-200/50 border border-slate-200 transition-all w-full sm:w-auto">
                    View Features
                </a>
            </div>
        </div>
    </section>

    <!-- Dashboard Mockup Section -->
    <section class="px-6 relative z-20">
        <div class="max-w-6xl mx-auto rounded-xl bg-slate-800 shadow-2xl border border-slate-700 overflow-hidden transform -translate-y-24 lg:-translate-y-36">
            <!-- Mac Browser Header -->
            <div class="flex items-center gap-2 px-4 py-3 bg-slate-900 border-b border-slate-700">
                <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                <div class="ml-4 px-3 py-1 bg-slate-800 rounded-md flex-1 max-w-sm text-xs text-slate-400 font-mono text-center mx-auto truncate border border-slate-700">
                    app.whatsflow.com/dashboard
                </div>
            </div>
            <!-- Browser Body -->
            <div class="relative bg-slate-100 aspect-[16/10] lg:aspect-[21/9] overflow-hidden">
                <img src="{{ asset('img/screenshots/dashboard.png') }}" alt="WhatsFlow Dashboard" class="absolute inset-0 w-full h-full object-cover object-top" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                <!-- Fallback Mockup if image is missing -->
                <div class="hidden absolute inset-0 flex-col items-center justify-center bg-slate-100 text-slate-400">
                    <svg class="w-16 h-16 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <p class="font-medium text-lg">Replace with Dashboard Screenshot</p>
                    <p class="text-sm mt-1">Save your screenshot as <code class="bg-white px-2 py-1 rounded text-slate-600">public/img/screenshots/dashboard.png</code></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Notice Section -->
    <section class="py-16 px-6 relative z-10">
        <div class="max-w-5xl mx-auto bg-white rounded-3xl border border-indigo-100 p-8 lg:p-14 text-center shadow-xl shadow-indigo-100/50">
            <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-3xl font-bold text-slate-900 mb-5 tracking-tight">Portfolio Project</h3>
            <p class="text-slate-600 text-lg lg:text-xl leading-relaxed max-w-3xl mx-auto mb-10">
                This project was built to demonstrate Laravel full-stack development skills including CRM management, WhatsApp messaging workflows, lead tracking, campaign broadcasting, message templates and knowledge-based automation.
            </p>
            <div class="flex flex-wrap justify-center gap-5">
                <div class="px-6 py-4 bg-slate-50 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center gap-3"><div class="w-2.5 h-2.5 rounded-full bg-indigo-500 shadow-sm shadow-indigo-500/50"></div><span class="font-bold text-slate-700">6 Core Modules</span></div>
                <div class="px-6 py-4 bg-slate-50 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center gap-3"><div class="w-2.5 h-2.5 rounded-full bg-purple-500 shadow-sm shadow-purple-500/50"></div><span class="font-bold text-slate-700">50+ UI Components</span></div>
                <div class="px-6 py-4 bg-slate-50 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center gap-3"><div class="w-2.5 h-2.5 rounded-full bg-emerald-500 shadow-sm shadow-emerald-500/50"></div><span class="font-bold text-slate-700">Fully Responsive</span></div>
                <div class="px-6 py-4 bg-slate-50 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex items-center gap-3"><div class="w-2.5 h-2.5 rounded-full bg-rose-500 shadow-sm shadow-rose-500/50"></div><span class="font-bold text-slate-700">Laravel 12 Powered</span></div>
            </div>
        </div>
    </section>

    <!-- 2. Feature Section -->
    <section id="features" class="py-20 bg-slate-50 px-6 -mt-12">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Everything You Need</h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg">A powerful suite of tools designed to handle WhatsApp messaging effectively.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $features = [
                        ['Lead Management', 'Organize, tag, and track your leads through various stages.', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'bg-blue-50', 'text-blue-600'],
                        ['Campaign Broadcasting', 'Send personalized bulk broadcasts to targeted audience segments securely.', 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z', 'bg-purple-50', 'text-purple-600'],
                        ['Auto Replies', 'Set up keyword-based rules to automatically respond with templates.', 'M13 10V3L4 14h7v7l9-11h-7z', 'bg-amber-50', 'text-amber-500'],
                        ['Knowledge Base', 'Store FAQs to train your automated assistant to answer queries instantly.', 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'bg-emerald-50', 'text-emerald-500'],
                        ['Conversation Inbox', 'A unified chat interface to manage all customer messages manually.', 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'bg-rose-50', 'text-rose-500'],
                        ['Analytics Dashboard', 'Track lead growth, campaign performance, and message volume.', 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'bg-indigo-50', 'text-indigo-600'],
                    ];
                @endphp

                @foreach($features as $feature)
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-indigo-500/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col h-full group">
                    <div class="w-14 h-14 {{ $feature[3] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 {{ $feature[4] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature[2] }}"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $feature[0] }}</h3>
                    <p class="text-slate-600 leading-relaxed flex-1">{{ $feature[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Product Walkthrough Section -->
    <section class="py-24 bg-white px-6 border-t border-slate-100">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Product Walkthrough</h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg">Explore the core modules of the WhatsFlow platform and see how leads, conversations and campaigns are managed in a unified interface.</p>
            </div>

            <!-- Walkthrough Item: Leads -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-24 mb-24 lg:mb-32">
                <div class="w-full lg:w-1/2 order-2 lg:order-1">
                    <div class="bg-slate-100 rounded-2xl p-3 border border-slate-200 shadow-xl">
                        <div class="relative bg-white rounded-xl aspect-[16/10] overflow-hidden border border-slate-200">
                            <img src="{{ asset('img/screenshots/leads.png') }}" alt="Leads Management" class="absolute inset-0 w-full h-full object-cover object-top" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="hidden absolute inset-0 flex-col items-center justify-center bg-slate-50 text-slate-400 text-center p-6">
                                <p class="font-medium">Leads Screenshot</p>
                                <p class="text-xs">public/img/screenshots/leads.png</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 order-1 lg:order-2">
                    <h3 class="text-3xl font-bold text-slate-900 mb-4">Powerful CRM & Lead Management</h3>
                    <p class="text-slate-600 text-lg leading-relaxed mb-6">Keep all your contacts organized. Apply tags, track custom statuses, and add internal notes to ensure your sales team never drops the ball.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Complete Contact Profiles</li>
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Custom Tags & Filtering</li>
                    </ul>
                </div>
            </div>

            <!-- Walkthrough Item: Inbox -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-24 mb-24 lg:mb-32">
                <div class="w-full lg:w-1/2">
                    <h3 class="text-3xl font-bold text-slate-900 mb-4">Real-time Conversation Inbox</h3>
                    <p class="text-slate-600 text-lg leading-relaxed mb-6">Manage all inbound and outbound WhatsApp messages from a single, collaborative interface. Respond manually or let the bot take over.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Two-way Messaging Sync</li>
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Instant Delivery Receipts</li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="bg-slate-100 rounded-2xl p-3 border border-slate-200 shadow-xl">
                        <div class="relative bg-white rounded-xl aspect-[16/10] overflow-hidden border border-slate-200">
                            <img src="{{ asset('img/screenshots/inbox.png') }}" alt="Inbox" class="absolute inset-0 w-full h-full object-cover object-top" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="hidden absolute inset-0 flex-col items-center justify-center bg-slate-50 text-slate-400 text-center p-6">
                                <p class="font-medium">Inbox Screenshot</p>
                                <p class="text-xs">public/img/screenshots/inbox.png</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Walkthrough Item: Campaigns -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-24 mb-24 lg:mb-32">
                <div class="w-full lg:w-1/2 order-2 lg:order-1">
                    <div class="bg-slate-100 rounded-2xl p-3 border border-slate-200 shadow-xl">
                        <div class="relative bg-white rounded-xl aspect-[16/10] overflow-hidden border border-slate-200">
                            <img src="{{ asset('img/screenshots/campaigns.png') }}" alt="Campaign Management" class="absolute inset-0 w-full h-full object-cover object-top" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="hidden absolute inset-0 flex-col items-center justify-center bg-slate-50 text-slate-400 text-center p-6">
                                <p class="font-medium">Campaigns Screenshot</p>
                                <p class="text-xs">public/img/screenshots/campaigns.png</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 order-1 lg:order-2">
                    <h3 class="text-3xl font-bold text-slate-900 mb-4">Targeted Bulk Broadcasts</h3>
                    <p class="text-slate-600 text-lg leading-relaxed mb-6">Create, schedule, and send targeted marketing messages to specific lead segments using pre-approved WhatsApp message templates.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Tag-based Targeting</li>
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Delivery Statistics Tracking</li>
                    </ul>
                </div>
            </div>

            <!-- Walkthrough Item: Knowledge Base -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-24 mb-10 lg:mb-16">
                <div class="w-full lg:w-1/2">
                    <h3 class="text-3xl font-bold text-slate-900 mb-4">Knowledge Base & Auto Replies</h3>
                    <p class="text-slate-600 text-lg leading-relaxed mb-6">Build a robust database of FAQs and keyword triggers. Allow your platform to automatically answer repetitive customer questions 24/7.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Keyword Triggers</li>
                        <li class="flex items-center gap-3 text-slate-700"><svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Intelligent AI Answers</li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="bg-slate-100 rounded-2xl p-3 border border-slate-200 shadow-xl">
                        <div class="relative bg-white rounded-xl aspect-[16/10] overflow-hidden border border-slate-200">
                            <img src="{{ asset('img/screenshots/knowledge.png') }}" alt="Knowledge Base" class="absolute inset-0 w-full h-full object-cover object-top" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="hidden absolute inset-0 flex-col items-center justify-center bg-slate-50 text-slate-400 text-center p-6">
                                <p class="font-medium">Knowledge Base Screenshot</p>
                                <p class="text-xs">public/img/screenshots/knowledge.png</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. Benefits Section -->
    <section class="py-24 bg-slate-900 text-white px-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6">Why This Project Matters</h2>
                    <p class="text-indigo-200 text-lg mb-8 leading-relaxed">
                        This project demonstrates practical Laravel full-stack development including CRM management, WhatsApp-style messaging interfaces, lead tracking, campaign management and automation workflows.
                    </p>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="mt-1 w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Clean Architecture</h4>
                                <p class="text-slate-400">Built using Laravel best practices, service classes, and Blade components.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Relational Database Design</h4>
                                <p class="text-slate-400">Complex Eloquent relationships handling leads, campaigns, and messaging logs.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Modern UI/UX</h4>
                                <p class="text-slate-400">A polished, responsive dashboard built purely with Tailwind CSS.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="bg-indigo-600 rounded-3xl p-10 lg:p-14 shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-4">Complete WhatsApp CRM Portfolio</h3>
                        <p class="text-indigo-100 text-lg leading-relaxed mb-6">
                            This demonstration showcases a complete CRM solution featuring inbox management, lead tracking, campaign broadcasting, message templates, analytics dashboards and automated customer support workflows.
                        </p>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <span class="text-white font-semibold">Fully Functional Showcase</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Credentials Section -->
    <section class="py-20 bg-slate-50 px-6 border-b border-slate-200">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-xl border border-slate-100 flex flex-col md:flex-row items-center gap-10">
                <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-3xl font-bold text-slate-900 mb-3">Demo Credentials</h3>
                    <p class="text-slate-600 text-lg mb-8">Use these credentials to explore the complete portfolio demonstration.</p>
                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-center md:justify-start">
                        <div class="bg-slate-50 px-5 py-3.5 rounded-xl border border-slate-200 flex items-center gap-3 w-full sm:w-auto shadow-sm">
                            <span class="text-slate-500 text-sm font-bold uppercase tracking-wider">Email:</span>
                            <code class="font-mono text-indigo-700 font-bold text-base">demo@whatsflow.com</code>
                        </div>
                        <div class="bg-slate-50 px-5 py-3.5 rounded-xl border border-slate-200 flex items-center gap-3 w-full sm:w-auto shadow-sm">
                            <span class="text-slate-500 text-sm font-bold uppercase tracking-wider">Password:</span>
                            <code class="font-mono text-indigo-700 font-bold text-base">password</code>
                        </div>
                    </div>
                </div>
                <div class="shrink-0 w-full md:w-auto mt-6 md:mt-0 text-center">
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-600/30 transition-all inline-block w-full md:w-auto">
                        Launch Demo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Tech Stack Section -->
    <section class="py-16 bg-slate-50 px-6 border-b border-slate-200">
        <div class="max-w-5xl mx-auto text-center">
            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-10">Built With Modern Technologies</p>
            <div class="flex flex-wrap justify-center items-center gap-4 lg:gap-6">
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-full shadow-sm text-base flex items-center gap-3 hover:border-indigo-300 hover:shadow-md transition-all"><svg class="w-5 h-5 text-red-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.5 14H8c-1.66 0-3-1.34-3-3s1.34-3 3-3h8.5c1.1 0 2-.9 2-2s-.9-2-2-2H8V4h8.5C18.98 4 21 6.02 21 8.5S18.98 13 16.5 13H8c-.55 0-1 .45-1 1s.45 1 1 1h8.5v1z"/></svg> Laravel 12</span>
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-full shadow-sm text-base flex items-center gap-3 hover:border-indigo-300 hover:shadow-md transition-all"><svg class="w-5 h-5 text-indigo-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2v-4h2v4zm0-6h-2V8h2v2z"/></svg> PHP 8.2+</span>
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-full shadow-sm text-base flex items-center gap-3 hover:border-indigo-300 hover:shadow-md transition-all"><svg class="w-5 h-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> MySQL</span>
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-full shadow-sm text-base flex items-center gap-3 hover:border-indigo-300 hover:shadow-md transition-all"><svg class="w-5 h-5 text-orange-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l-1.5 5h11l-1.5-5H12zm2.5 12.5L12 18l-2.5-3.5V11h5v3.5z"/></svg> Blade</span>
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-full shadow-sm text-base flex items-center gap-3 hover:border-indigo-300 hover:shadow-md transition-all"><svg class="w-5 h-5 text-purple-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Bootstrap</span>
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-full shadow-sm text-base flex items-center gap-3 hover:border-indigo-300 hover:shadow-md transition-all"><svg class="w-5 h-5 text-pink-500" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg> Chart.js</span>
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-semibold rounded-full shadow-sm text-base flex items-center gap-3 hover:border-indigo-300 hover:shadow-md transition-all"><svg class="w-5 h-5 text-emerald-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> WhatsApp Business API Ready</span>
            </div>
        </div>
    </section>

    <!-- 6. CTA Section -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-4xl mx-auto bg-gradient-to-r from-indigo-600 to-purple-600 rounded-[3rem] p-12 lg:p-20 text-center relative overflow-hidden shadow-2xl border border-indigo-500">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-black/10 rounded-full blur-2xl"></div>

            <div class="relative z-10">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6 tracking-tight">Ready to Explore WhatsFlow?</h2>
                <p class="text-indigo-100 text-lg mb-10 max-w-2xl mx-auto">
                    Launch the portfolio demo and explore the complete WhatsApp CRM experience.
                </p>
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-10 py-5 bg-white text-indigo-600 font-bold text-lg rounded-full shadow-xl hover:-translate-y-1 hover:shadow-2xl hover:shadow-indigo-900/30 transition-all">
                    Launch Portfolio Demo
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 py-16 px-6 text-slate-400">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start border-b border-slate-800 pb-12 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-white">WhatsFlow</span>
                </div>
                <p class="max-w-md leading-relaxed text-slate-400">A Laravel-based WhatsApp CRM portfolio project demonstrating lead management, campaign broadcasting, templates, inbox management and automation workflows.</p>
            </div>
            <div class="flex flex-col md:items-end gap-2 text-left md:text-right">
                <div class="mb-4">
                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-widest mb-1">Developed & Designed by</p>
                    <p class="text-lg font-bold text-white">Nagarani Kaleeswaran</p>
                    <p class="text-indigo-400">Laravel Full Stack Developer</p>
                </div>
                <div class="flex gap-4">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors font-semibold">Portfolio</a>
                    <span class="text-slate-700">•</span>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors font-semibold">GitHub</a>
                    <span class="text-slate-700">•</span>
                    <a href="https://www.linkedin.com/in/nagarani-kaleeswaran-1a8a71387" class="text-slate-400 hover:text-white transition-colors font-semibold">LinkedIn</a>
                    <span class="text-slate-700">•</span>
                    <a href="https://www.upwork.com/freelancers/~01513ffa2a648ffb4e?mp_source=share" class="text-slate-400 hover:text-white transition-colors font-semibold">Upwork</a>
                </div>
            </div>
        </div>
        <div class="text-center text-sm">
            <p class="text-slate-600">&copy; {{ date('Y') }} WhatsFlow Portfolio Showcase. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
