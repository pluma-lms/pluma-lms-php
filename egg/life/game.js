var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

ctx.canvas.width  = window.innerWidth;
ctx.canvas.height = window.innerHeight-5;

ctx.onclick = reset;
var width= c.width;
var height = c.height;

var pDirr = 0.2;
var pReproduce = 0.01;

var creatures= [];
var bacteria={x: width/2, y: height/2,  
    deltaX: 0, deltaY: 0, 
    red:0, blue:0, green:0};
newDir(bacteria);
creatures.push(bacteria);

setInterval(function(){ update();
 }, 32);
 
 function update()
 {
    ctx.clearRect(0, 0, c.width, c.height);
    for(var i=0; i<creatures.length;i++)
    {
        var anim = creatures[i];
        anim.x+=anim.deltaX;
        anim.y+=anim.deltaY;
        if(Math.random()<pDirr)
        {
            newDir(anim);
        }
        if(Math.random()<pReproduce)
        {
            reproduce(anim);
        }
        ctx.fillStyle = 'rgb('+anim.red+','+anim.blue+','+anim.green+')';
        //ctx.fillStyle = "rgb(255,165,0)";

        ctx.fillRect(anim.x,anim.y,4,4);
    }
 }
 
 function newDir(anim)
 {
     anim.deltaX= rand(-1,1);
     anim.deltaY= rand(-1,1);
 }
 
 function reproduce(parent)
 {
    var daughter={x: parent.x, y: parent.y, 
    deltaX: 0, deltaY: 0, 
    red:changeColor(parent.red),
    blue:changeColor(parent.blue),
    green:changeColor(parent.green)};
    newDir(daughter);
    creatures.push(daughter);
 }
 
 function rand(min, max)
 {
     return (Math.floor(Math.random()*(max-min+1))-min) * ((Math.floor(Math.random()*2)==0) ? -1:1);  
 }
 
 function changeColor(color)
 {
     color+=rand(-10,10);
     if(color>255)
     {
         color=255;
     }
     if(color<0)
     {
         color=0;
     }
     return color;
 }
 
 function reset()
 {
     alert("Antibiotics!");
     arr=null;
     arr.push(bacteria);
 }
