<!DOCTYPE HTML> 
<html> 
    <head> 
        <title> 
            Get the ID of the clicked button
            using JavaScript
        </title>
    </head> 
      
    <body style = "text-align:center;"> 
      
        <h1 style = "color:green;" > 
            GeeksForGeeks 
        </h1>
  
        <p id = "GFG_UP" style = 
            "font-size: 15px; font-weight: bold;">
        </p>
          
        <button id="1" onClick="GFG_click(this.id)">
            Button1
        </button>
          
        <button id="2" onClick="GFG_click(this.id)">
            Button2
        </button>
          
        <button id="3" onClick="GFG_click(this.id)">
            Button3
        </button>
  
        <p id = "GFG_DOWN" style = 
            "color:green; font-size: 20px; font-weight: bold;">
        </p>
          
        <script>
            var el_up = document.getElementById("GFG_UP");
            var el_down = document.getElementById("GFG_DOWN");
            el_up.innerHTML = "Click on button to get ID";
          
            function GFG_click(clicked) {
                var id = clicked;
            }
            el_down.innerHTML = "ID = "+id;      
        </script> 
    </body> 
</html>                    