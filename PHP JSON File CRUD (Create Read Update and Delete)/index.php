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
    <div class="container">
        <h1 class="page-header text-center">PHP project</h1>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8"><a class="btn btn-primary" href="admin.php">Admin page</a>
                <form method="POST">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="id" name="id" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="not choosen"></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="save" value="Save" class="btn btn-primary">
                </form>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
    <?php
    if(isset($_POST['save'])){
        //open the json file
        $data = file_get_contents('members.json');
        $data = json_decode($data);
 
        //data in out POST
        $input = array(
            'id' => $_POST['id'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender']
        );
 
        //append the input to our array
        $data[] = $input;
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('members.json', $data);
 
        header('location: index.php');
    }
?>
</body>

</html>