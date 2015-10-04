var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

ctx.canvas.width  = window.innerWidth;
ctx.canvas.height = window.innerHeight-5;

var scale = 10.0;
var gravity = 10;
var width= c.width * scale;
var height = c.height * scale;

var particles = [];

for(var i=0; i<rand(5,10); i++)
{
    var particle={x: 0.0+rand(0,width), y: 0.0+rand(0,height), mass: rand(50,50)};
    particles.push(particle);
}


setInterval(function(){ update();
 }, 32);
 

 function update()
 {
    ctx.clearRect(0, 0, c.width, c.height);
    for(var n=0; n<particles.length;n++)
    {
        var deltaX=0;
        var deltaY=0;
        var par = particles[n];
        for(var q=0; q<particles.length; q++)
        {
            if(q===n)
            {
                continue;
            }
            console.log(q);
            var puller = particles[q];
            var xDif = puller.x-par.x;
            var yDif= puller.y-par.y;
            var xRatio = Math.abs(xDif)/(Math.abs(xDif)+Math.abs(yDif));
            var force = gravity * puller.mass *  par.mass / (Math.abs(xDif) + Math.abs(yDif));
            deltaX = xRatio * force * (xDif>0?1:-1);
            deltaY = (1- xRatio) * force * (yDif>0?1:-1);
        }
        par.x=par.x+deltaX;
        par.y=par.y+deltaY;
        ctx.beginPath();
        ctx.arc(par.x / scale, par.y / scale,par.mass,par.mass, 0, 2*Math.PI);
        ctx.stroke();
    }
 }


    
 function rand(min, max)
 {
     return Math.floor(Math.random()*(max-min+1))+min;  
 }
