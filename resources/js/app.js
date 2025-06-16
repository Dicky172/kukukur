import '../css/app.css';

// Import Laravel Echo dan Pusher
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Inisialisasi Echo
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    authEndpoint: '/broadcasting/auth',
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
    }
});

// Kode Alpine.js atau lainnya jika ada
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();