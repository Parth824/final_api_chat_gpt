<html>
    <head>
        <script>
            function getstr(str)
            {
                var httpXML = new XMLHttpRequest();
                
                httpXML.onreadystatechange = function(){
                    if(httpXML.readyState==4 && httpXML.status==200)
                    {
                        document.getElementById("liveserch").innerHTML = this.responseText;
                    }
                }
                httpXML.open("GET","database.php?q="+str,true);
                httpXML.send();
            }
        </script>
    </head>
    <body>
        <form>
            <input type="text" onkeyup="getstr(this.value)">
            <div id = "liveserch">
            </div>
        </form>
    </body>
</html>