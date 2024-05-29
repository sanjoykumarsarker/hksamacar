// Blog
importScripts("/blogassets/js/workbox-sw.js");
const PRECACHE = "precache-v2";
const RUNTIME = "runtime";

// A list of local resources we always want to be cached.
const PRECACHE_URLS = [
  "blogassets/vendors/aos/dist/aos.css/aos.css",
  "blogassets/css/style.min.css",
  "blogassets/vendors/js/vendor.bundle.base.js",
  "blogassets/vendors/aos/dist/aos.js/aos.js",
  "blogassets/js/bndate.js",
  "blogassets/js/demo.js",
  "blogassets/js/jquery.easeScroll.js",
  new RegExp("/blogassets//.*\\.[css,js]"),
];

// const matchCallback = ({ request, url }) => {
//   url.pathname.includes("blogassets") &&
//     (request.destination === "style" || request.destination === "script");
// };
const matchCallback = ({ url }) => url.pathname.includes("blogassets");

// const imageCallback = ({ request, url }) => {
//   request.destination === "image" && url.pathname.includes("blogassets");
// };

workbox.core.skipWaiting();
// workbox.recipes.imageCache({ matchCallback: imageCallback });
// workbox.recipes.staticResourceCache();
workbox.recipes.staticResourceCache({ matchCallback });
workbox.core.clientsClaim();

// workbox.precaching.precacheAndRoute(
//   PRECACHE_URLS.map((url) => ({ url, revision: null }))
// );
// workbox.precaching.precacheAndRoute([{ url: "https://harekrishnasamacar.com/manifest.json", revision: null }]);

workbox.routing.registerRoute(
  "https://harekrishnasamacar.com/pages/panjika",
  new workbox.strategies.StaleWhileRevalidate(),
  "GET"
);

workbox.routing.registerRoute(
  /https:\/\/harekrishnasamacar.com\/epaper/,
  new workbox.strategies.StaleWhileRevalidate(),
  "GET"
);

workbox.routing.registerRoute(
  "https://harekrishnasamacar.com",
  new workbox.strategies.NetworkFirst(),
  "GET"
);
