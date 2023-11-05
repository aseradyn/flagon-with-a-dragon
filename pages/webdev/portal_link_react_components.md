Using Portal to Share Context Between React Components Rendered to Separate DOM Nodes
=====================================================================================

Updated: 2023.11.05

So, here's the problem we needed to solve:

We have an application that was built on Razor (CSHTML + C#) with lots of JQuery layered on top. The page has five tabs of data related to a parent record. We started replacing the content of some of the tabs with React components which give a more "Excel-like" feeling for real-time editing of data in grids. However, one of the tabs (Tab 1) relies on data that can be modified in one of the other tabs (Tab 2). On the first pass, this was solved by simply calling the API again on Tab 1 to get any updates caused by changes on Tab 2. It works, but it's not ideal.

We did a little Googling around and found, of course, a Stack Overflow question for a very similar problem: needing to share data/state between two components which cannot be rendered into the same DOM node.

In essence, you write the React components as if they will be rendered together as children of a shared wrapper component, inside a context provider:

```ts
const MyWrapper = () => {
    return (
        <MyProvider>
            <Tab1 />
            <Tab2 />
        </MyProvider>
    )
}
```

But then, use portals to attach them to the DOM notes in your HTML:

```ts
<MyProvider>
    {ReactDOM.createPortal(
        <Tab1 />,
        document.getElementById("tab1")
    )}
    {ReactDOM.createPortal(
        <Tab2 />,
        document.getElementById("tab2")
    )}
</MyProvider>
```

So now, as far as the javascript on your page is concerned, these two tabs are both children of the context provider and can read and write from it. But as far as the HTML and CSS in your page is concerned, they are children of their respecitve DOM nodes (#tab1 and #tab2) and are styled and positioned accordingly.

So I can do things like change their order, change their styles, show and hide them, using CSS and HTML just as if there was no React involved at all.

Here's a Code Sandbox I created demonstrating this in practice: [React Context + Portal Example](https://codesandbox.io/s/react-portal-context-5zgp6w?file=/src/App.tsx:254-514)