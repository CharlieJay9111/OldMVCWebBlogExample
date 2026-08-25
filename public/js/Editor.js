var Editor = {
    content : null,
    buttons : null,

    init: function(){
        this.content = document.querySelector("#editor article");
        this.buttons = document.querySelectorAll("#editor nav span");

        this.buttons.forEach(button => {
            button.onclick = function(e){
                e.preventDefault();
                var command = button.dataset['button'];
                document.execCommand(command, false, null);
            }
        });
    }
}

Editor.init();