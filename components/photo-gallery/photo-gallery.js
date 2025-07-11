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

            // build needed nodes
            const replacementImage = image.cloneNode(true);
            const imageForLightbox = image.cloneNode(true);
            imageForLightbox.setAttribute("style", ""); // unset the transform style

            const wrapper = document.createElement("div");
            wrapper.classList = "photo-gallery-photo-wrapper";

            const lightbox = document.createElement("div");
            lightbox.classList = "lightbox";
            lightbox.setAttribute("popover", "");
            lightbox.id = `lightbox-${key}`;

            const button = document.createElement("button");
            button.classList = "photo-gallery-toggle-button";
            button.popoverTargetElement = lightbox;
            button.setAttribute("title", "Pop up larger image");
            const buttonLabel = document.createTextNode("⤡");

            // assemble   
            button.appendChild(buttonLabel);         
            wrapper.appendChild(replacementImage);
            wrapper.appendChild(button);
            lightbox.appendChild(imageForLightbox);
            wrapper.appendChild(lightbox);

            // insert
            image.after(wrapper);

            // and hide the original
            image.remove();
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
        const makeThumbnail = this.getAttribute("makeThumbnail");
        if (makeThumbnail) this.classList.add('thumbnail');
        this.classList.add('photo-gallery');
        await setImageKeys(this);
        const images = this.querySelectorAll("img");
        images.forEach(image => {
            image.classList.add('photo-card', 'animate', 'pop');
            if (makeThumbnail) image.classList.add('thumbnail');
            image.style.setProperty('transform', 'rotate(' + getRotation() + 'deg)');
            listOfKeys.push(image.getAttribute("key"));
        })

        // If this is a link directory, don't add lightboxes
        const isDirectory = this.hasAttribute('isDirectory');
        if (!isDirectory && !makeThumbnail) {
            insertLightboxes(images);
        }
    }
}

customElements.define("photo-gallery", PhotoGallery);