// File: resources/js/notifications.js

console.log('DEBUG: notifications.js script loaded.');

document.addEventListener('DOMContentLoaded', () => {
    console.log('DEBUG: DOM fully loaded.');

    // Memberi jeda sesaat untuk memastikan skrip lain (seperti bootstrap.js) selesai inisialisasi
    setTimeout(() => {
        if (typeof window.Echo !== 'undefined' && window.Echo) {
            console.log('DEBUG: Laravel Echo is available. Trying to connect...');

            window.Echo.private('notifications.admin')
                .on('error', (error) => {
                    console.error('DEBUG: Echo Channel Error:', error);
                    if (error.status === 403) {
                        console.error('DEBUG: Authorization failed (403). Periksa routes/channels.php dan pastikan user admin memiliki role yang benar.');
                    }
                })
                .listen('.new-order', (e) => {
                    console.log('DEBUG: EVENT RECEIVED!', e);

                    // 1. Tampilkan Notifikasi
                    new window.Filament.Notification()
                        .title('Ada penjualan baru!')
                        .body(`Pesanan baru telah dibuat di cabang ${e.franchise_name}.`)
                        .success()
                        .send();
                    console.log('DEBUG: Filament notification sent.');

                    // 2. Refresh Tabel Livewire
                    if (window.Livewire) {
                        window.Livewire.dispatch('refresh-orders');
                        console.log('DEBUG: Livewire "refresh-orders" event dispatched.');
                    } else {
                        console.error('DEBUG: Livewire is not available.');
                    }
                });
            
            console.log("DEBUG: Subscription attempt to 'notifications.admin' channel is complete.");

        } else {
            console.error('DEBUG: Laravel Echo is NOT available. Pastikan bootstrap.js & echo.js sudah benar dan termuat sebelum skrip ini.');
        }
    }, 200); // jeda 200 milidetik
});