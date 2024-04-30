let listOfKeys = [];

function showLightbox(key) {
    document.getElementById(key)?.classList.remove("hide");
}
function hideLightbox(key) {
    document.getElementById(key)?.classList.add("hide");
}
function navigateNext(key) {
    hideLightbox(key);
    const nextKeyIndex = listOfKeys.indexOf(key.toString()) + 1;
    const nextKey = listOfKeys[nextKeyIndex];
    showLightbox(nextKey);
}
function navigatePrevious(key) {
    hideLightbox(key);
    const prevKeyIndex = listOfKeys.indexOf(key.toString()) - 1;
    const prevKey = listOfKeys[prevKeyIndex];
    showLightbox(prevKey);
}

function getRotation() {
    const value = Math.random() * (0 - 2) + 0;
    const posNeg = Math.round(Math.random()) * 2 - 1;
    return value * posNeg;
}

const insertLightboxes = (images) => {
    images.forEach(image => {
            const imgUrl = image.getAttribute("src");
            const alt = image.getAttribute("alt") ?? "";
            const title = image.getAttribute("title") ?? "";
            const key = image.getAttribute("key");
            const lightboxHtml = `
                <div id="${key}" class="lightbox-overlay hide">
                    <div class="lightbox">
                        <div class="lightbox-image-container photo-card">
                            <img src="${imgUrl}" alt="${alt}"  />
                        </div>
                        <div class="lightbox-caption">
                            ${title}
                        </div>
                        <button class="lightbox-nav-left" onClick="navigatePrevious(${key})">&larr;</button>
                        <button class="lightbox-nav-right" onClick="navigateNext(${key})">&rarr;</button>
                    </div>
                </div>
            `
            image.addEventListener('click', function(e) {showLightbox(key)});
            image.insertAdjacentHTML('afterend', lightboxHtml);
        });
}

async function setImageKeys(gallery) {
    let images = gallery.querySelectorAll("img");
    images.forEach(image => {
        const keyvalue = Math.random();
        image.setAttribute("key", keyvalue);
    })
}

class PhotoGallery extends HTMLElement {
    async connectedCallback() {
        this.classList.add('photo-gallery');
        await setImageKeys(this);
        const images = this.querySelectorAll("img");
        images.forEach(image => {
            image.classList.add('photo-card', 'animate', 'pop');
            image.style.setProperty('transform', 'rotate(' + getRotation() + 'deg)');
            listOfKeys.push(image.getAttribute("key"));
        })

        // If this is a link directory, don't add lightboxes
        const isDirectory = this.hasAttribute('isDirectory');
        if (!isDirectory) {
            insertLightboxes(images);
        }
    }
}

customElements.define("photo-gallery", PhotoGallery);