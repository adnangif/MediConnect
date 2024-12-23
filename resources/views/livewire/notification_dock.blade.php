<?php

use Livewire\Volt\Component;

new class extends Component {
    public $notifications;
    public $newNotifications;

    public function mount()
    {
        $this->fetchData();
    }

    public function fetchData()
    {
        $this->notifications = Auth::user()->notifications()
            ->orderBy('created_at', 'desc')
            ->orderBy('is_read', 'asc')->take(5)->get();
        $this->newNotifications = Auth::user()->notifications()->where('is_read', false)->count() > 0;
    }

    public function clear_all()
    {
        foreach ($this->notifications as $notification) {
            Log::debug($notification->notification_id);
            $notification['is_read'] = true;
            $notification->save();
        }
        $this->fetchData();
    }
}; ?>

<div id="notification-drawer" class="absolute top-[100%] w-64 min-h-96 my-4 rounded-lg shadow bg-slate-100 text-gray-800">
    <div class="px-6 pt-4 font-semibold text-sm flex gap-2">
        Notifications
        <img height="20" width="20" src="/image/notification-idle.svg" />
    </div>
    <div class=" flex flex-col gap-1 p-2 pt-0 ">
        @foreach ($this->notifications as $notification)
            <a href="{{ $notification->link }}"
                class="p-2 text-sm rounded-lg @if (!$notification->is_read) font-bold @endif notification-message hover:bg-slate-200 duration-200">{{ $notification->message }}
                <div class="text-end text-gray-600 text-xs">{{ $notification->created_at->diffForHumans() }}</div>
            </a>
        @endforeach
        <button class="outline-btn">Clear all</button>
        @if (Auth::user()->notifications()->count() == 0)
            <div class="text-center mt-20 text-gray-600">
                <p>No Notifications</p>
            </div>
        @endif
    </div>


    @script
        <script>
            const notificationBtn = document.getElementById('notification-btn');
            const notificationDrawer = document.getElementById('notification-drawer');
            const notificationDot = document.getElementById('notification-dot');
            const clearAllBtn = document.querySelector('button.outline-btn');

            @if ($this->newNotifications)
                notificationDot.classList.remove('hidden')
                notificationDot.style.display = 'flex';
            @else
                console.log('sdf')
                notificationDot.style.display = 'none';
            @endif

            function toggleDrawer() {
                notificationDrawer.classList.toggle('open');
            }

            clearAllBtn.addEventListener('click', async () => {
                notificationDot.style.display = 'none';
                await $wire.call('clear_all');
            })

            notificationBtn.addEventListener('click', toggleDrawer)

            document.addEventListener('click', (event) => {
                if (!notificationDrawer.contains(event.target) && !notificationBtn.contains(event.target)) {
                    notificationDrawer.classList.remove('open');
                }
            })

            Echo.channel("doctor-channel.{{ Auth::user()->doctor->doctor_id }}")
                .listen('PatientConnected', async (e) => {
                    notificationDot.style.display = 'flex';
                    await $wire.$refresh();
                    await $wire.call('fetchData');
                })
        </script>
    @endscript
</div>
