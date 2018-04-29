<?php require 'usercontrol.php';?>

<!DOCTYPE html>
<html>
    <head>
	<style>
	body {
	 font-family: "Helvetica Neue", Helevetica, Arial, sans-serif;
	 font-size: 14px;
	 background: cornflowerblue;
	}

	h2 {
	color: white;
	font-size: 60px;
	font-family: "Impact";
	font-style: normal;
	text-shadow:
	-5px -5px 0 #000,
	5 -5px 0 #000,
	-5px 5px 0 #000,
	5px 5px 0 #000;
	}

	div {
	color: white;
	font-weight: 300;
	font-size: 20px;
	font-family: "Impact";
	font-style: normal;
	text-shadow:
	-1px -1px 0 #000,
	1px -1px 0 #000,
	-1px 1px 0 #000,
	1px 1px 0 #000;
	}

	#myMeme {
	width: 300px;
	}

	</style>
	<meta charset="utf-8">
        <title>Meme Maker</title>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script>
       
        $(document).ready(function(){
                $(".submitter").click(function(e){
                        console.log("anything?");
            	
			var canvas = document.getElementById('myMeme');
            		var dataURL = canvas.toDataURL();
            		var description = document.getElementById('description').value;
			
			console.log(dataURL);
			
			console.log(dataURL); 
                        e.preventDefault();
			console.log("made it through default");	
                        
			$.ajax({
                                type: "POST",
				url: 'upload.php',
                                data: { 
                                        imgBase64: dataURL,
					desc: description
                                }
                        }).done(function(o) {
                                console.log('saved');
                        });
			
                        
                });     
        });
	</script>
	<script>
	var topInput, bottomInput, makeBtn, myImage, canvas, meme;
        // function called by addInputs to color and size text to the image
        function makeMeme(image, topInput, bottomInput) {
            canvas.width = image.width;
            canvas.height = image.height;
            meme.clearRect(0, 0, canvas.width, canvas.height);
            meme.drawImage(image, 0, 0);
            
            var fontSize = canvas.width / 8;
            meme.font = fontSize + 'px Impact';
            meme.fillStyle = 'white';
            meme.strokeStyle = 'black';
            meme.lineWidth = fontSize / 15;
            meme.textAlign = 'center';
            
            meme.textBaseline = 'top';
            meme.fillText(topInput, canvas.width / 2, 0, canvas.width);
            meme.strokeText(topInput, canvas.width / 2, 0, canvas.width);
            
            meme.textBaseline = 'bottom';
            meme.fillText(bottomInput, canvas.width / 2, canvas.height, canvas.width);
            meme.strokeText(bottomInput, canvas.width / 2, canvas.height, canvas.width);
        }
        
        // gets user inputted value from the text fields and image
        function getInputs() {
            topInput = document.getElementById("topText");
            bottomInput = document.getElementById("bottomText");
            myImage = document.getElementById("userImage");
            makeBtn = document.getElementById("make");
            canvas = document.getElementById("myMeme");
            meme = canvas.getContext('2d');
            canvas.width = canvas.height = 0;
        }

	function getCanvas(){
            addInputs();
            var canvas = document.getElementById('myMeme');
	    var dataURL = canvas.toDataURL();
	    console.log(dataURL);
	    return (document.getElementById('myMeme')).toDataURL();
        }        
        // adds user text inputs to a newly created image/meme
        function addInputs() {
            getInputs();
            var readFile = new FileReader();
            readFile.onload = function() {
                var image = new Image;
                image.src = readFile.result;
                makeMeme(image, topText.value, bottomText.value);  
            };
            readFile.readAsDataURL(myImage.files[0]);
        }

	function validate() {
          var txt3 = document.form1.description.value;
	  var fileName = document.getElementById("userImage").value;
	  if(text3==""){
	    alert("Please enter a title for ya meme.");
	  }
	  else if(fileName == "") {
	    alert("No image selected.");
	  }
	  else {
	    addInputs();
	  }
	}
    </script>

    </head>
    <body>
	<form method="post" action="http://172.17.149.139/MemeGenerator/logout.php">
        	<input type="submit" value="Log Out"/>
	</form>    
        <h2>meh meme maker &nbsp;
        <img src = https://i.redd.it/6z1xtxpi82ky.png style="width:120px;height:120px;">
        <img src = http://i0.kym-cdn.com/photos/images/newsfeed/001/134/408/565.png
        style = "width:120px;height:140px;">
        <img src = "http://i0.kym-cdn.com/photos/images/masonry/001/255/479/85b.png"
        style = "width:120px;height:120px;">
        </h2>
    
    <div id ="wrapper">
    	<form name = "form1" action = "">
        <p>Top Text</p>
	<input type = text id = "topText" name="toptxt"/>

        <p>Bottom Text</p>
        <input type = text id = "bottomText" name="bottxt"/>
	
	<p>Title</p>
	<input type = text id = "description" name="description"/>
	</from>
	<p>Select your image!</p>

	<input name="file" type = "file" id = "userImage" accept = "image/">
	<br><br>
   
	<br><button id = "make" onclick = "validate()">make meh meme!</button>
   
	<input type="button" Value="Post Meme" class="submitter"/>
 
    </div>
    
    <div>
        <br>
        <canvas id = "myMeme" title = "Right click -> &quot; Save image as..&quot;"></canvas>    
    </div>
        
    </body>
</html>
