<div class="navbar items-center">
    <a href="/" class="flex items-center grow">
        <img class="main-logo" src={{ asset('image/logo.svg') }} />
        <span class="side-logo">MediConnect</span>
    </a>

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

        <div>
            <a href="/logout" class="flex items-center">
                <img src="/image/logout.svg" class="icon-btn hover:bg-red-200" />
            </a>
        </div>

    @else
        <div>
            <a href="/login" class="btn">
                login
            </a>
        </div>
        <div>
            <a href="/signup" class="btn">Sign Up</a>
        </div>
        <div>
            <a href="/faq" class="btn">FAQ</a>
        </div>
    @endif
</div>
