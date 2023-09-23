<?php

    include('Config/config.php');

    $config = new Config();

    if (isset($_REQUEST['btn_submit'])) {
        $res =  $config->Insert($_REQUEST['name'], $_REQUEST['age'], $_REQUEST['course']);
        if ($res) {
            echo "Insert recode...";
        }
    }

    if(isset($_REQUEST['btn_up']))
    {
        // echo $_REQUEST['id'];
        // echo $_REQUEST['name'];
        // echo $_REQUEST['course'];
        $res =  $config->update_all($_REQUEST['id'],$_REQUEST['name'], $_REQUEST['age'], $_REQUEST['course']);
        if ($res) {
            echo "update recode...";
        }
        else{
            echo "Not";
        }
    }

    if(isset($_REQUEST['btn_Delete']))
    {
        $id = $_REQUEST['id'];
        $res = $config->delete_All($id);
        if($res == 1)
        {
            echo "Delete recode...";
        }
        else
        {
            echo "Sorry try again....";
        }
    }


    $myData = $config->All_Data();

?>


<html>

<head>
    <title>
        Home Page
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <Div class="col">
        <Div class="Row">
            <Div class="col">
                <div class="mx-auto p-1" , style="height: 200px;">
                    <div class="container">
                        <form action="" method="POST">
                            <label>Name: </lable><br />
                            <input type="hidden" name="id" value=<?php if(isset($_REQUEST['btn_Updata'])){echo $_REQUEST['id'];}?>>
                                <input type="text" name="name" value=<?php if(isset($_REQUEST['btn_Updata'])){echo $_REQUEST['name'];}?>><br />
                                <label>age:</lable><br />
                                    <input type="number" name="age" value=<?php if(isset($_REQUEST['btn_Updata'])){echo $_REQUEST['age'];}?>><br />
                                    <label>Coures:</lable><br />
                                        <input type="text" name="course" value=<?php if(isset($_REQUEST['btn_Updata'])){echo $_REQUEST['course'];}?>><br /><br />
                                        <Button name=<?php if(isset($_REQUEST['btn_Updata'])){echo "btn_up";}else{echo "btn_submit";}?>><?php if(isset($_REQUEST['btn_Updata'])){echo "UPDATE";}else{echo "Submit";}?></Button>
                        </form>
                    </div>
                </div>
            </Div>
            <br />
            <br />
            <br />
            <br />
            <Div class="Row">
                <Div class="col-5 mx-auto p-5" , style="height: 300px;">
                    <Div class="container">
                        <Table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">age</th>
                                    <th scope="col">Course</th>
                                    <th scope="col"> Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($fech_data = mysqli_fetch_assoc($myData)) { ?>
                                    <tr>
                                        <td><?php echo $fech_data['id']; ?></td>
                                        <td><?php echo $fech_data['name']; ?></td>
                                        <td><?php echo $fech_data['age']; ?></td>
                                        <td><?php echo $fech_data['course']; ?></td>
                                        <td>
                                            <form accept="" method="POST">
                                                <input type="hidden" name="id" value=<?php echo $fech_data['id']; ?>>
                                                <input type="hidden" name="name" value=<?php echo $fech_data['name']; ?>>
                                                <input type="hidden" name="age" value=<?php echo $fech_data['age']; ?>>
                                                <input type="hidden" name="course" value=<?php echo $fech_data['course']; ?>>
                                                <button class="btn btn-success" name="btn_Updata">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="" method="Post">
                                                <input type="hidden" name="id" value=<?php echo $fech_data['id']; ?>>
                                                <button class="btn btn-danger" name="btn_Delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </Table>
                    </Div>
                </Div>
            </Div>
        </Div>
    </Div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>