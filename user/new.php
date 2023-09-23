<?php

    include('Config/config.php');
    
    $Config = new Config();

    $res =$Config->SelectDataall($_GET['q']);

    $k ="";

    $k = $k . "<table><tr><th>ID</th><th>Name</th><th>Salary</th></tr>";
    
    while($m = mysqli_fetch_assoc($res))
    {
        $k .= "<tr><td>";
        $k .= $m['e_id'];
        $k .= "</td><td>";
        $k .= $m['name'];
        $k .= "</td><td>";
        $k .= $m['salary'];
        $k .= "</td></tr>";
    }
    $k .="</table>";
    echo $k;
?>

