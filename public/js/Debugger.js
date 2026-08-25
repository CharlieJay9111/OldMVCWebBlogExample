

class Debugger {
    time = {
        start: null,
        end: null,
        lenght: null,
    }


    constructor(){
        const self = this;
        this.time.start = Date.now();

        window.addEventListener("load", function(){
            self.run();
        })
    }

    run(){
        this.time.end = Date.now();
        this.time.lenght = this.time.end - this.time.start;
        console.log("time", this.time.lenght);
        console.log(this);
    }
}

const debuger = new Debugger();
debuger.run();