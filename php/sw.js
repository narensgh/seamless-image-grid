var version = '1.0.8';
var cacheName = 'pinkvilla-' + version;
var filesToCache = [
    '.',
    'index.html',
    'style.css'
];

self.addEventListener('beforeinstallprompt', function (e) {
    outputElement.textContent = 'beforeinstallprompt Event fired';
    e.userChoice.then(function (choiceResult) {
        if (choiceResult.outcome == 'dismissed') {
            console.log('User cancelled homescreen install');
        } else {
            console.log('User added to homescreen');
        }
    });
});

self.addEventListener('install', function (e) {
    e.waitUntil(
            caches.open(cacheName).then(function (cache) {
        console.log('[ServiceWorker] Caching app shell');
        return cache.addAll(filesToCache);
    }).then(function () {
        self.skipWaiting();
    })
            );
});

self.addEventListener('activate', function (e) {
    console.log('[ServiceWorker] Activate');
    e.waitUntil(
            caches.keys().then(function (keyList) {
        return Promise.all(keyList.map(function (key) {
            if (key !== cacheName) {
                console.log('[ServiceWorker] Removing old cache', key);
                return caches.delete(key);
            }
        }));
    })
            );
    return self.clients.claim();
});

self.addEventListener('fetch', function (e) {
    e.respondWith(
            caches.match(e.request).then(function (response) {
        console.log('[Service Worker]', e.request.url);
        return response || fetch(e.request);
    })
            );
});