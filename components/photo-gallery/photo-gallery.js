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

const insertLightboxes = (images) => {
    console.log(images);
    images.forEach(image => {
            const imgUrl = image.getAttribute("src");
            //const img = link.querySelector("img");
            const alt = image.getAttribute("alt") ?? "";
            const title = image.getAttribute("title") ?? "";
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
            image.addEventListener('click', function(e) {showLightbox(key)});
            image.insertAdjacentHTML('afterend', lightboxHtml);
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

        // If this is a link directory, don't add lightboxes
        const isDirectory = this.hasAttribute('isDirectory');
        if (!isDirectory) {
            let images = this.querySelectorAll("img");
            insertLightboxes(images);
        }
    }
}

customElements.define("photo-gallery", PhotoGallery);