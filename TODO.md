# To-do

Future changes to consider.

## Router

- [ ] **Return a real 404 status for missing pages.** `router/router.php` includes the theme header before deciding whether the route exists, so `http_response_code(404)` runs after output has started and the response goes out as `200 OK`. Visitors still see the 404 page, but search engines and link checkers treat missing pages as real ones. Fix by resolving the route (PHP routes, markdown routes) before the header is included, and setting the status code first.

## Themes

- [ ] **Tropical theme links to `/unsolicited`, which no longer exists.** `themes/tropical/header.php` still has an "Advice" nav link to `/unsolicited`; the stand-ups post now lives at `/webdev/standups`. Only matters if the site switches back to the tropical theme (`index.php` hardcodes `notebook`).

## Photo galleries in markdown

Galleries of two or more images, one per line, are detected automatically by `utilities/SiteParsedown.php`. These cases still have to be written as `<photo-gallery>` HTML:

- [ ] **Single-image galleries.** A lone image renders as a plain `<p><img></p>`, without gallery styling or the lightbox. Could add a short marker to opt a single image into a gallery.
- [ ] **`makeThumbnail` galleries.** No markdown way to pass attributes like `makeThumbnail="true"` (used in `ephemera/2025-07-10_02.md` and `ephemera/2026-03-06_01.md`).
- [ ] **Galleries with text between photos.** The second gallery in `pages/places/saguaroNP.md` interleaves paragraphs with images.

## Cleanup

- [ ] **`utilities/parsedown/ParsedownExtra.php` doesn't work.** It's a newer version than `Parsedown.php` (1.7.4) and crashes with `Call to undefined method ParsedownExtra::textElements()`. Nothing uses it today; either remove it or update Parsedown to a matching version.
