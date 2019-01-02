let short = new Vue({
    el:".short",
    data:{
            visible1:false,
            visible2:false,
            visible3:false}
    ,
    methods: {
        set1:function () {
            this.visible1 = !this.visible1;
            this.visible2 = false;
            this.visible3 = false;
        },
        set2:function () {
            this.visible1 = false;
            this.visible2 =!this.visible2;
            this.visible3 = false;
        },
        set3:function () {
            this.visible1 = false;
            this.visible2 = false;
            this.visible3 =!this.visible3;
        }
    }
});
const ws = new WebSocket('wss://draw.local/wss2/' );
ws.addEventListener("open",e=>{console.log("open");});
ws.addEventListener("close",e=>{console.log("clos")});
ws.addEventListener("error",e=>{console.log("error")});
ws.addEventListener("message",e=>{

    if (e.data.includes("mouse")) {
        drawt(JSON.parse(e.data));
    }
});
const earaser = new Vue({
    el:".earaser",
    data:function(){return{
        earase:false,
        lastc:"",
        lasts:""
    }},
    methods:{
        Earase:function () {
            if ( this.earase){
                style.stroke=this.lasts;
                style.color=this.lastc;
                this.earase = false;
                document.querySelector(".Color").style.backgroundColor = "white";
                document.querySelector(".Shape").style.backgroundColor = "white";
            }else {
                console.log("wis");
                this.lasts =style.stroke;
                this.lastc=style.color;
                style.stroke="earase";
                style.color = "White";
                this.earase = true;
                document.querySelector(".Color").style.backgroundColor = "lightgray";
                document.querySelector(".Shape").style.backgroundColor = "lightgray";
            }
        }
        }
});
const shape = new Vue({
    el:"#shapelong",
    methods:{
        select:function (e) {
            if(e.target.tagName === "INPUT"){
                document.querySelector("#shapelong .selected").classList.remove("selected");
                style.stroke = e.target.classList[0];
                e.target.classList.add('selected');
            }
        }
    }
});

function drawt(line) {
    let c = document.getElementById("canvas");
    let ctx = c.getContext("2d");
    ctx.beginPath();
    ctx.strokeStyle =line.style.color;
    ctx.lineWidth = line.style.size;
    switch (line.style.stroke){
        case "earase":

                ctx.moveTo(line.mouse.previous.x, line.mouse.previous.y);
                ctx.lineTo(line.mouse.current.x, line.mouse.current.y);
                ctx.stroke();

            break;
        case "dot":

                ctx.moveTo(line.mouse.previous.x, line.mouse.previous.y);
                ctx.lineTo(line.mouse.current.x, line.mouse.current.y);
                ctx.stroke();

            break;
        case "line":
            ctx.moveTo(line.mouse.previous.x, line.mouse.previous.y);
            ctx.lineTo(line.mouse.current.x, line.mouse.current.y);
            ctx.stroke();
            break;
        case "circle":
            let leng = (Math.abs(line.mouse.previous.x- line.mouse.current.x))+(Math.abs(line.mouse.current.y - line.mouse.previous.y));
            ctx.arc(line.mouse.previous.x,line.mouse.previous.y,leng,0,2*Math.PI);
            ctx.stroke();
            break;
        case "rect":
            let len = Math.abs(line.mouse.previous.x- line.mouse.current.x);
            let heigh = Math.abs(line.mouse.current.y - line.mouse.previous.y);
            ctx.strokeRect(line.mouse.previous.x,line.mouse.previous.y, len, heigh);
            break;
        case "trian":
            let le = (Math.abs(line.mouse.previous.x- line.mouse.current.x))+(Math.abs(line.mouse.current.y - line.mouse.previous.y));
            ctx.moveTo(line.mouse.previous.x, line.mouse.previous.y);
            ctx.lineTo(line.mouse.current.x, line.mouse.current.y);
            ctx.lineTo(line.mouse.current.x -le, line.mouse.current.y -le);
            ctx.closePath();
            ctx.stroke();
            break;
    }
    ctx.closePath();
}
let style ={
    color: "Yellow",
    size:2,
    stroke:"dot"
};
const color = new Vue({
    el:"#colorlong",
    methods:{
        select:function (e) {
            if(e.target.tagName === "INPUT"){
            document.querySelector("#colorlong .selected").classList.remove("selected");

            style.color = e.target.value;
            
            e.target.classList.add('selected');
            }
        }
    },
    created:function () {
        document.querySelectorAll(".Color input").forEach(e=>{
            e.style.color = e.value;
            e.style.backgroundColor = e.value;
        });

    }
});
const size = new Vue({
    el:"#sizelong",
    methods:{
        select:function (e) {
            if(e.target.tagName === "INPUT"){
                document.querySelector("#sizelong .selected").classList.remove("selected");
                style.size = e.target.classList[0]*2;
                e.target.classList.add('selected');
            }
        }
    }
});

const canvas = new Vue({
    el: "canvas",
    data: function () {
        return {

            mouse: {
                current: {
                    x: 0,
                    y: 0
                },
                previous: {
                    x: 0,
                    y: 0
                },
                down: false
            }
        }
    },
    template: '<canvas id="canvas" v-on:mousedown="handleMouseDown" v-on:mouseup="handleMouseUp" v-on:mousemove="handleMouseMove" height="600px" width="1800px"></canvas>',
    methods: {
        currentMouse: function (event) {
            let c = document.getElementById("canvas");
            const rect = c.getBoundingClientRect();
            this.mouse.current = {
                x: (event.pageX - rect.left).toFixed(0),
                y: (event.pageY - rect.top).toFixed(0)
            };
        },
        draw: function () {
            let c = document.getElementById("canvas");
            let ctx = c.getContext("2d");
            ctx.beginPath();
            ctx.strokeStyle =style.color;
            ctx.lineWidth = style.size;
            console.log(style.stroke);
            switch (style.stroke){
                case "earase":
                    if (this.mouse.down ) {
                        ctx.moveTo(this.mouse.previous.x, this.mouse.previous.y);
                        ctx.lineTo(this.mouse.current.x, this.mouse.current.y);
                        ctx.stroke();
                    }
                    break;
                case "dot":
                    if (this.mouse.down ) {
                        ctx.moveTo(this.mouse.previous.x, this.mouse.previous.y);
                        ctx.lineTo(this.mouse.current.x, this.mouse.current.y);
                        ctx.stroke();
                   }
                    break;
                case "line":
                    ctx.moveTo(this.mouse.previous.x, this.mouse.previous.y);
                    ctx.lineTo(this.mouse.current.x, this.mouse.current.y);
                    ctx.stroke();
                    break;
                case "circle":
                    let leng = (Math.abs(this.mouse.previous.x- this.mouse.current.x))+(Math.abs(this.mouse.current.y - this.mouse.previous.y));
                    ctx.arc(this.mouse.previous.x,this.mouse.previous.y,leng,0,2*Math.PI);
                    ctx.stroke();
                    break;
                case "rect":
                    let len = Math.abs(this.mouse.previous.x- this.mouse.current.x);
                    let heigh = Math.abs(this.mouse.current.y - this.mouse.previous.y);
                    ctx.strokeRect(this.mouse.previous.x,this.mouse.previous.y, len, heigh);
                    break;
                case "trian":
                    let le = (Math.abs(this.mouse.previous.x- this.mouse.current.x))+(Math.abs(this.mouse.current.y - this.mouse.previous.y));
                    ctx.moveTo(this.mouse.previous.x, this.mouse.previous.y);
                    ctx.lineTo(this.mouse.current.x, this.mouse.current.y);
                    ctx.lineTo(this.mouse.current.x -le, this.mouse.current.y -le);
                    ctx.closePath();
                    ctx.stroke();
                    break;
            }
            ctx.closePath();
            let line={
                    mouse:{
                        current:{
                            x:this.mouse.current.x,
                            y:this.mouse.current.y
                        },previous:{
                            x:this.mouse.previous.x,
                            y:this.mouse.previous.y
                        }
                    },style:{
                        color:style.color,
                        size:style.size,
                        stroke:style.stroke
                    }
                }
            ;
            line = JSON.stringify(line);
            console.log(line);
            ws.send(line);

            }
        ,
        handleMouseDown: function (event) {
            this.mouse.down = true;
            this.currentMouse(event);
            this.mouse.previous ={
                x: this.mouse.current.x,
                y: this.mouse.current.y
            };
        },
        handleMouseUp: function (event) {
            this.mouse.down = false;
            if (style.stroke!=="dot"||style.stroke!=="earase"){
                this.currentMouse(event);
                this.draw(event);
            }
        },
        handleMouseMove: function (event) {
            if (style.stroke==="dot"||style.stroke==="earase"){
                this.mouse.previous ={
                    x: this.mouse.current.x,
                    y: this.mouse.current.y
                };
                this.currentMouse(event);
                if (this.mouse.down) {
                    this.draw(event);
                }

            }


        }
    }
});

