<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>Mars</title>
</head>
<body class="body">

<?php require './header.php'; ?>

<script>
			var canvas = document.createElement('canvas');
document.body.appendChild(canvas);
var ctx = canvas.getContext("2d");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
var particlesGroups = new Array(1024);
var screenScale = 1000;
var isReadyAnimation = false;
var nearClip = -1000;
var farClip = 1000;

function CreateParticles() {
    var canvasimg = document.createElement('canvas');
    var ctximg = canvasimg.getContext("2d");
    var img = new Image();
    img.crossOrigin = "";
    img.src = "https://ucarecdn.com/dc679688-6611-4c44-893a-926994b81ac9/heightmap2_fsrgmq.png";
    var ctximg = canvas.getContext("2d");
    img.onload = function () {
        var imgdata;
        ctximg.drawImage(img, 0, 0);
        imgdata = ctximg.getImageData(0, 0, 512, 512).data;
        ctximg.clearRect(0,0,512,512);
            for (var i = 0; i < 512; i++) {
                var particles = new Array();
                for (var j = 0; j < 512; j++) {
                    particles.push(new Particle((j - 256) * 8, -2*(imgdata[(i * 512 + j) * 4]) + 512));
                }
                particlesGroups[i] = (new ParticleGroup(particles, (511 - i) * 32));
                particlesGroups[1023-i] = (new ParticleGroup(particles, (1023 - i) * 32));
            }
        isReadyAnimation = true;
    }
}

var Vector = function (x, y, z) {
    this.x = x;
    this.y = y;
    this.z = z;
}
var globalPos = new Vector(0, 0, 0);

var Particle = function (x, y, z) {
    this.pos = new Vector(x, y, z);
}

var ParticleGroup = function (particles,z,color) {
    this.particles = particles;
    this.z = z;
}

ParticleGroup.prototype.IsInClippingPlane = function () {
    var z = this.z + globalPos.z;
    if (z > nearClip && z < farClip)
        return true;
    return false;
}

ParticleGroup.prototype.Draw = function (ctx) {
    ctx.beginPath();
    for (var i = 0; i < this.particles.length; i++) {
        var z = this.z + globalPos.z;
        var x = this.particles[i].pos.x * screenScale / (z + screenScale) + (canvas.width / 2) + globalPos.x;
        var y = this.particles[i].pos.y * screenScale / (z + screenScale) + (canvas.height / 4)  + globalPos.y;
        if (i == 0)
            ctx.moveTo(x, y);
        else ctx.lineTo(x, y);
    }
    ctx.stroke();
}

function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.strokeStyle = "red";
    var lastGroup = 0;
    if (isReadyAnimation) {
        for (var i = 0; i < particlesGroups.length; i++) {
            if (particlesGroups[i].IsInClippingPlane()) {
                particlesGroups[i].Draw(ctx);
            }
        }
        globalPos.z -= 24;
        if (globalPos.z < ((-512-128) * 32))
            globalPos.z+=(512) * 32;
    }
    requestAnimationFrame(loop);
}
CreateParticles();
loop();

		</script> 
       
</body>
</html>