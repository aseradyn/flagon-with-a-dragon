<link rel="stylesheet" href="/components/photo-gallery/photo-gallery.css" />

<script>
    function showLightbox(key) {
        event.preventDefault();
        document.getElementById(key).classList.remove("hide");
    }
    function hideLightbox(key) {
        event.preventDefault();
        document.getElementById(key).classList.add("hide");
    }
    function getRotation() {
        const value = Math.random() * (0 - 2) + 0;
        const posNeg = Math.round(Math.random()) * 2 - 1;
        return value * posNeg;
    }
    const convertLinksToLightboxes = (links) => {
        links.forEach(link => {
                const imgUrl = link.getAttribute("href");
                const img = link.querySelector("img");
                const alt = img.getAttribute("alt") ?? "";
                const title = img.getAttribute("title") ?? "";
                const key = Math.random();
                const lightboxHtml = `
                    <div id="${key}" class="lightbox-overlay hide" onClick=hideLightbox(${key})>
                        <div class="lightbox-positioning">
                            <div class="lightbox photo-card">
                                <img src="${imgUrl}" alt="${alt}" title="${title}" />
                                <div class="lightbox-caption">
                                    ${title}
                                </div>
                            </div>
                        </div>
                    </div>

                `
                link.addEventListener('click', function(e) {showLightbox(key)});
                link.insertAdjacentHTML('afterend', lightboxHtml);
            });
    }

    class PhotoGallery extends HTMLElement {
        connectedCallback() {
            this.classList.add('photo-gallery');
            let images = this.querySelectorAll("img");
            images.forEach(image => {
                image.classList.add('photo-card');
                image.classList.add('animate');
                image.classList.add('pop');
                image.style.setProperty('transform', 'rotate(' + getRotation() + 'deg)');
            })

            // If this is a link directory, don't mess with the links
            const isDirectory = this.hasAttribute('isDirectory');
            if (!isDirectory) {
                let links = this.querySelectorAll("a");
                convertLinksToLightboxes(links);
            }
        }
    }

    customElements.define("photo-gallery", PhotoGallery);

</script>