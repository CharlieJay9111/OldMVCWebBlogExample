JS = {
    likes: function(url, element){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log(this.response);
            if(this.response == 1)
            {
                element = element.querySelector("span");
                number = element.innerText;
                element.innerText = Number(number) + 1;
            }
        }

        xhttp.open("GET", url);
        xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.send();

    }
}