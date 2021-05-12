<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./timeline.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Mars</title>

</head>
<body>
    <?php require './header.php'; ?>   
    
       <video autoplay muted loop id="myVideo">
            <source src="../media/back.mp4" type="video/mp4">
        </video>
       
        <div class="timeline">
        
    
    <div class="container left" id="first">
        <div class="content">
        
        <p></p>
        </div>
    </div>
    <div class="container right"id="second">
        <div class="content">
        
        <p></p>
        </div>
    </div>
    <div class="container left"id="three">
        <div class="content">
        
        <p></p>
        </div>
    </div>
    <div class="container right"id="four">
        <div class="content">
        
        <p></p>
        </div>
    </div>
    
    
    <div class="container left">
    <div class="content">
        <img src="/media/image/mars.jpg" alt="Planete Mars">
      <h2>O1/03/2022</h2>
      <p>Planete Mars</p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
      <h2>station essence</h2>
      <p></p>
    </div>
  </div>
  <div class="container left">
    <div class="content">
      <h2>station essence</h2>
      <p></p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
      <h2>station essence</h2>
      <p></p>
    </div>
  </div>
  <div class="container left">
    <div class="content">
      <h2>station essence</h2>
      <p></p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
      <h2>station essence</h2>
      <p></p>
    </div>
  </div>
  <div class="container left">
    <div class="content">
    <img src="/media/image/lune.jpg" alt="La Lune"width='90' height="80">
      <h2>06/05/2021 au 07/05/2021</h2>
      <p>lune</p>
    </div>
  </div><div class="scene">
     <div class="rocket">

      <img  class="rock"src="/media/image/rocket.png" width='100' height='100'>
     </div>
</div>

  <div class="container right">
    <div class="content">
    <img src="/media/image/terre.jpg" alt="La Lune"width='160' height="150">
      <h2>05/05/2021</h2>
      <p>Depart</p>
    </div>
  </div>
 
<script>
    function stars()
    {
        let count = 20;
        let scene = document.querySelector('.scene');
        let i = 0;
        while(i < count)
        {
            let star = document.createElemement('i');
            let x = Math.floor(Math.random() * window.
            innerWidth);

            let duration = Math.random() * 1;
            let h = Math.random() * 100;

            star.style.left = x + 'px';
            star.style.width = 1 + 'px';
            star.style.height = 50+ h + 'px';
            star.style.animationDuration = duration + 's';

            scene.appendChield(star);
            i++

        }
    }
</script>

    
</body>
</html>