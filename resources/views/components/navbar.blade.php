<div class="navbar items-center">
    <div class="flex items-center grow">
        <img class="main-logo" src={{ asset('image/logo.svg') }} />
        <span class="side-logo">MediConnect</span>
    </div>

    @if (auth()->check())
        <div>
            <a href="/logout" class="btn">
                logout
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
    @endif
    <div>
        <a href="/faq" class="btn">FAQ</a>
    </div>
</div>
