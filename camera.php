<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styling.css"/>
    </head>
    <body>
        <div class="camera">
            <div>
            <video id="video" width="400" height="300"></video>
            <img id="photo" class="photo" src="img/manu2.png" alt="Photo"/>
            <ul><li><img id = "thumb1" src="img/manu2.png" width="50" height="50" alt="Photo"/>
            </li><li><img id = "thumb2" src="img/manu.png" width="50" height="50" alt="Photo"/>
            </li><li><img id = "thumb3" src="img/manu2.png" width="50" height="50" alt="Photo"/>
            </li><li><img id = "thumb3" src="img/manu2.png" width="50" height="50" alt="Photo"/>
            </li>
            </ul>

            </div>
            <a href="#" id="capture" class="ccb">Take Photo</a>
            <canvas id="canvas" width="400" height="300"></canvas>
            
        
        </div>
        <script src="js/photo.js"></script>
    </body>
</html>