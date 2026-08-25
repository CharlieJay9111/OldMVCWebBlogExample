
class App {
    url;

    constructor(title){
        const self = this;
        this.title = title;
        
        window.onload = function(){
            const links = document.querySelectorAll("nav a");

            links.forEach(link => {
                const value = link.attributes.href.value;

                link.onclick = function(e){
                    e.preventDefault();
                    self.get(value, "main");
                    const active = document.querySelector("nav a.active");
                    if(active) active.classList.remove("active");
                    link.classList.add("active");
                }
            })

            self.links("main");
        }

        window.onpopstate = function()
        {
            const value = location.pathname;
            self.get(value, "main", true);
        }
    }

    get(url, selector, browser = false)
    {
        const self = this;
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.querySelector(selector).innerHTML = this.responseText;
            const title = this.getResponseHeader("Title") != null ? this.getResponseHeader("Title") + " " : "" ;
            document.title = title + self.title;
            self.links(selector);
            window.scrollTo(0,0)
        }

        xhttp.open("GET", url);
        xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.send();

        if(browser || url == location.pathname) return;
        history.pushState(null,null, url);
        
    }

    links(selector){
        const self = this;
        
        const links = document.querySelectorAll(selector + " a[href*='PHP']");
        
        console.log(links);

        links.forEach(link => {
            const value = link.attributes.href.value;

            link.onclick = function(e){
                e.preventDefault();
                self.get(value, "main");
            }
        })
        

    }
}