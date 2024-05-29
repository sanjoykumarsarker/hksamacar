importScripts('serviceworker-cache-polyfill.js');

self.addEventListener('install', function(event) {
//  event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
        '/index.html',
        '/css/index.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        '/js/index.js',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        '/images/logo/logo.png',
        '/images/jps.ico',
        '/images/call-to-action.jpg',
        '/images/hksamacar-jps-logo.jpg',
        '/images/jps1.jpg',
        '/images/jps2.png',
        '/images/jps3.jpg',
        '/images/jps4.jpg',
        '/fonts/glyphicons-halflings-regular.woff2',
        '/css/animate.css'
      ]);
    })
 // );
});

self.addEventListener('fetch', function(){
});