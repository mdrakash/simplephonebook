<?php
  include('php/dbconfig.php');
  session_start();
  if(!isset($_SESSION["username"])){
    header('location:index.php');
  };
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PhoneBook</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>



    <div class="container">
            <a class="btn btn-primary" href="php/function.php?logout=true" role="button" style="float:right">Logout</a>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add to Contuct List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                        if(isset($_SESSION['username'])){
                            $username= $_SESSION['username'];
                        }
                    ?>
                    <input type="hidden" id="username" value="<?php echo $username?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" autocomplete="off" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" autocomplete="off" class="form-control" id="phone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" onclick="adduser()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <h1 class="text-center">PhoneBook</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Contuct
        </button>
        <div id="displaytable">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javascript/index.js"></script>
    <script>


    </script>
</body>

</html>