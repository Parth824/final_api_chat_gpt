<?php

    if(isset($_GET['sub']))
    {
        setcookie($_GET['cookiname'],$_GET['cookivalue'],time() + 200,"/");
        echo @$_COOKIE[$_GET['cookiname']];
    }

?>




<html>
    <body>
        <form>
            <input type="text" name = "cookiname">
            <input type="text" name = "cookivalue">
            <input type="submit" name = "sub">
        </form>
    </body>
</html>