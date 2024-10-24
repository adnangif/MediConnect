<div class="navbar items-center">
    <div class="grow">
        <a href="/" class="flex items-center w-fit">
            <img class="main-logo" src={{ asset('image/logo.svg') }} />
            <span class="side-logo">MediConnect</span>
        </a>
    </div>

    @if (auth()->check())
        <div>
            <a href="/search">
                <img src="/image/search.svg" class="icon-btn" />
            </a>
        </div>
        <div>
            <a href="/all-appointments/">
                <img src="/image/appointment-icon.svg" class="icon-btn" />
            </a>
        </div>

        <div>
            <a href="/user/profile">
                <img src="/image/profile.svg" class="icon-btn" />
            </a>
        </div>

        <button class="relative" id="notification-btn">
            {{-- Notification Dot logic give here. Possibly using htmx --}}
            <span class="absolute -right-1 -top-1 flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
            </span>
            <img src="/image/notification-idle.svg" class="icon-btn" />

        </button>
        
        <x-notification_drawer />


        <div>
            <a href="/logout" class="flex items-center">
                <img src="/image/logout.svg" class="icon-btn hover:bg-red-200 border-red-800" />
            </a>
        </div>
    @else
        <div>
            <a href="/login" class="btn">
                login
            </a>
        </div>
        <div>
            <a href="/user/register" class="btn">Sign Up</a>
        </div>
        <div>
            <a href="/faq" class="btn">FAQ</a>
        </div>
    @endif
</div>
