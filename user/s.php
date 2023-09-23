<html>
    <head>
        <script>
        function showdisp(str)
        {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status ==200)
                {
                    document.getElementById('live').innerHTML= this.responseText;
                }
                
            }
            xmlhttp.open("GET","new.php?q="+str,true);
                xmlhttp.send();
        }
        
        </script>
    </head>
    <body>
        <form >
            <input type="text" onkeyup="showdisp(this.value)">
            <div id="live"></div>
        </form>
    </body>
</html>