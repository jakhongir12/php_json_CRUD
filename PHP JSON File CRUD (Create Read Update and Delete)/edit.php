<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP PROJECT</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('members.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
    if(isset($_POST['save'])){
        $input = array(
            'id' => $_POST['id'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('members.json', $data);
 
        header('location: index.php');
    }
?>
    <div class="container">
        <h1 class="page-header text-center"></h1>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8"><a class="btn btn-primary" href="admin.php">Back</a>
                <form method="POST">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $row->id; ?>"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                value="<?php echo $row->firstname; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                value="<?php echo $row->lastname; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?php echo $row->email; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select name="gender" id="gender" class="form-control" required>
                                <!-- <option value="not choosen"></option> -->
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>



                    <input type="submit" name="save" value="Save" class="btn btn-primary">
                </form>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
</body>

</html>