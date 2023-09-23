<?php


    include('Config/config.php');
    $id;
    $name;
    $password;
    $Config = new Config();

    $Config->CreatTbale();

    if(isset($_POST['btn']))
    {
       $res= $Config->InserData($_POST['name'],$_POST['Salary']);

       if($res)
       {
        echo "Succfully";
       }
       else
       {
        echo "unSuccfilly";
       }
    }
    if(isset($_POST['btn1']))
    {
        echo $_POST['id'];
        echo $_POST['name'];
        echo $_POST['Salary'];

       $res= $Config->update($_POST['id'],$_POST['name'],$_POST['Salary']);
        
       if($res)
       {
        echo "Succfully";
       }
       else
       {
        echo "unSuccfilly";
       }
    }
    if(isset($_POST['btn_update']))
    {
       $res = $Config->SelectDataone($_POST['id']);
        $k = mysqli_fetch_assoc($res);
        var_dump($k['name']);
        $id = $_POST['id'];
        $name = $k['name'];
        $password =$k['salary'];
    }    

    $AllData= $Config->SelectData();

?>



<html>
    <body>
        <div>
        <form method="POST">
            <input type="hidden" name = "id" value= <?php echo @ $id?>>
            Name: <input type="text" name="name" value=<?php if(isset($_POST['btn_update']))
            {
                echo "$name";
            }else{
                echo "";
            }?>>
            Salary :<input type="text" name= "Salary" value=<?php if(isset($_POST['btn_update']))
            {
                echo "$password";
            }else{
                echo "";
            }?>>

            <button type = 'submit' name=<?php if(isset($_POST['btn_update']))
            {
                echo "btn1";
            }else{
                echo "btn";
            }?> value=<?php if(isset($_POST['btn_update']))
            {
                echo "$name";
            }else{
                echo "";
            }?>><?php if(isset($_POST['btn_update']))
            {
                echo "Update";
            }else{
                echo "Submit";
            }?></button>
        </form>
        <a href="s.php">serch</a>
        </div>
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    </tr>
                    <?php
                        while($res1 = mysqli_fetch_assoc($AllData))
                        {
                    ?><br/>
                        <tr>
                        <td><?php echo $res1['e_id'];?></td>
                        <td><?php echo $res1['name'];?></td>
                        <td><?php echo $res1['salary'];?></td>
                        <form action="" method="POST">
                          <td>  <input type="hidden" name ="id" value=<?php echo $res1['e_id']; ?>></td>
                           <td> <input type="submit" name="btn_update"> </td>
                        </form>
                        </tr>
                    <?php } ?>
                

            </table>
        </div>
    </body>
</html>