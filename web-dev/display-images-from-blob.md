Displaying Images from Blob Storage
===================================

For an app I'm working on, we are allowing users to upload all types of files into storage and then retrieve them again. We have a page where they can see a "preview" of the file along with its details. For things like documents, that means embedding a viewer of some kind, but images are handled natively by the browser, so we figured we could just grab them out of blob and dump them into the page. Right?

Sort of.

This does mostly work:

```
getFile().then(file => {
  const fileURL = URL.createObjectURL(new Blob([file]));
  setImageURL(fileURL);
}

return (
  <img src={imageURL} />
)
```

But if you right-click on the image to save it or open it in a new tab, there's a problem: it's treated as text. It's a weird situation where the browser understands the file well enough to display it, but not well enough to let users work with it. But if you download the file (Chrome saves it as .txt) and then change the file extension... then it's a proper image again.

We could have disabled the right-click menu on the image, but... yuck.

Instead, I went nosing around and tried a bit of this and that until I worked out a solution that will not only display the image correctly, but also let users use the right-click options to copy, download, and open the image.

First, we needed a way to convert the blob object to a base64-encoded string.

```
const blobToBase64 = (blob: Blob): Promise<string> => {
  const reader = new FileReader();
  reader.readAsDataURL(blob);
  return new Promise(resolve => {
    reader.onloadend = () => {
      resolve(reader.result as string);
    };
  });
};
```

But what we found was that this always came back with the wrong mime type. If we are displaying my-image.png, we know the mime type will need to be "image/png", not "application/octet-stream". So, we need to strip the default mime type and replace it with the correct one.

```
let mimeType: string;
if (fileExtension === "jpg") {
  mimeType = "data:image/jpeg;base64,";
} else {
  mimeType = "data:image/" + fileExtension + ";base64,";
}
      
getFile().then(file => {
  blobToBase64(file).then(newFile => {
    // split off the default mime type
    newFile = newFile.split(",")[1];
    // concat our mime type with the file string
    setImageURL(mimeType + newFile);
  });
}

return (
  <img src={imageURL} />
)
```

Short and sweet!
