const CACHE_ID = 'news-duell-v1';

const FILES = [
  './',
  'js/app.js',
  'css/app.css',
  'lib/localforage.min.js',
  'assets/icons/icon-72x72.png',
  'assets/icons/icon-96x96.png',
  'assets/icons/icon-128x128.png',
  'assets/icons/icon-144x144.png',
  'assets/icons/icon-152x152.png',
  'assets/icons/icon-192x192.png',
  'assets/icons/icon-384x384.png',
  'assets/icons/icon-512x512.png',
  'favicon.ico',
  'manifest.json',
];

const handleInstallation = async event => {
  console.log(`Installing version ${CACHE_ID}`);

  const cache = await caches.open(CACHE_ID);
  return await cache.addAll(FILES);
};

self.addEventListener('install', event => event.waitUntil(handleInstallation(event)));


const handleActivation = async () => {
  console.log(`Activating version ${CACHE_ID}`);

  const claim = self.clients.claim();
  const cacheKeys = await self.caches.keys();
  const toDelete = cacheKeys.filter(key => key !== CACHE_ID);
  return Promise.all([claim, ...toDelete.map(key => self.caches.delete(key))]);
};

self.addEventListener('activate', event => event.waitUntil(handleActivation()));

const updateCache = async (request, response) => {
  const clone = response.clone();
  const cache = await caches.open(CACHE_ID);
  return await cache.put(request, clone);
};

const handleFetch = async event => {
  console.log('Load from cache: ' + event.request);

  const response = await caches.match(event.request);
  if (response) {
    return response;
  }
  return fetch(event.request).then(async response => updateCache(event.request, response));
};

self.addEventListener('fetch', event => event.respondWith(handleFetch(event)));
