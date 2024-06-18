class TableOfContents extends HTMLElement {
    async connectedCallback() {
        
       const details = document.createElement("details");
       details.setAttribute("open", "");
       details.classList ="toc";
       const summary = document.createElement("summary");
       summary.innerText = "Table of Contents";
       details.appendChild(summary);

        // get all h2 and h3 tags into an array
        const headings = document.querySelectorAll("h2, h3");

        const ul = document.createElement("ul");
        let lastH2 = undefined;
        // create an id for each heading
        headings.forEach(heading => {
            const type = heading.nodeName;
            const text = heading.innerText;
            let href = "#";
            if (!heading.id) {
                const id = text.replace(/,/g, '').replace(/\s+/g, '-').toLowerCase();
                heading.setAttribute("id", id);
                href += id;
            } else {
                href += heading.id;
            }
            const anchor = document.createElement("a");
            anchor.setAttribute("href", href);
            anchor.innerText = text;
            const li = document.createElement("li");
            li.appendChild(anchor);

            if (heading.nodeName == "H2") {
                
                const sublist = document.createElement("ul");
                lastH2 = sublist;
                ul.appendChild(li);
                ul.appendChild(sublist);
            } else {
                lastH2.appendChild(li);
            }
            
        })
        
        details.appendChild(ul);
        this.appendChild(details);
    }
}

customElements.define("table-of-contents", TableOfContents);

