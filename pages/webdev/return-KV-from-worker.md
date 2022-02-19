Returning KV values from Cloudflare Workers
===========================================

If you haven't worked much with async javascript functions, this is not the most obvious thing in the world, and it's not covered in any of their examples (that I could see). So, here we go!

First, definitions!

* __"KV"__ = key/value pair. Cloudflare allows you to create simple key/value pairs and read/write to them using workers.

* __"Cloudflare workers"__ = Smallish (from a few lines of code to a basic React site) javascript applications deployed to Cloudflare and called from a Cloudflare URL. They are implemented as event listeners that do... whatever.

The thing about workers, though, is that they are mostly javascript but ... not 100% the same. There's some quirks. In this case, there are two things to know:

* You must bind your KV namespace to your worker. In the web portal, you can do this under Settings > Variables.
* You cannot await or unwrap promises in the event listener - you have to do that in an async function.

For example, this is a whole worker to get a date value of out KV:

```js
addEventListener("fetch", event => {
  event.respondWith(serverResponse(event));
});

async function serverResponse(event) {
  const date = await mynamespace.get('date');
  return new Response(date);
}
```

`mynamespace` is the variable I bound to my KV namespace, so I can access all the values in that namespace.

__Pro Tip:__ If you get the error "date is not defined" and you've triple-checked the name of the key? Make sure you've put it in quotes. `mynamespace.get(date)` does not work. Ask me how many times I've made that mistake 😂

And if you want to return two or more KV values with a single call? Here you go:

```js
addEventListener("fetch", event => {
  event.respondWith(serverResponse(event));
});

async function serverResponse(event) {
    // get the values
    const nutValue = await mynamespace.get('nut');
    const boltValue = await mynamespace.get('bolt');
    const widget = {
        nut: nutValue,
        bolt: boltValue;
    }
    // convert to a string
    const json = JSON.stringify(widget, null, 2);
    // send it back
    return new Response(json);
}
```

