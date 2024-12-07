<body class="bg-white">

<nav class="bg-black shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <x-logo/>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <x-nav-links href="/" :active="true">Home</x-nav-links>
                        <x-nav-links href="/about">About</x-nav-links>
                        <x-nav-links href="/contact">Contact</x-nav-links>
                        <x-nav-links href="/blogs">Blog</x-nav-links>
                    </div>
                </div>
            </div>
            <div class="hidden sm:block">
                <div class="flex space-x-4">
                    <x-link-button href="/login">Login</x-link-button>
                    <x-link-button href="/register">Register</x-link-button>
                </div>
            </div>
        </div>
    </div>
</nav>
