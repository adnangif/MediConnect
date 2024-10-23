<div id="notification-drawer"
    class="absolute top-[100%] w-64 min-h-96 my-4 rounded-lg shadow bg-slate-100 text-gray-800">
    <div class="px-6 pt-4 font-semibold text-sm flex gap-2">
        Notifications
        <img height="20" width="20" src="/image/notification-idle.svg"/>
    </div>
    <div class=" flex flex-col gap-1 p-4 pt-0">
        @foreach (Auth::user()->notifications()->orderBy('is_read', 'asc')->take(5)->get() as $notification)
        <a href="#"
        class="p-2 rounded-lg @if (!$notification->is_read) font-bold @endif notification-message hover:bg-slate-200 duration-200">{{ $notification->message }}</a>
        @endforeach
        <button class="outline-btn">Clear all</button>
    </div>
</div>

<script>
    const notificationBtn = document.getElementById('notification-btn');
    const notificationDrawer = document.getElementById('notification-drawer');

    function toggleDrawer() {
        notificationDrawer.classList.toggle('open');
    }

    notificationBtn.addEventListener('click', toggleDrawer)

    document.addEventListener('click', (event) => {
        if (!notificationDrawer.contains(event.target) && !notificationBtn.contains(event.target)) {
            toggleDrawer()
        }
    })
</script>
