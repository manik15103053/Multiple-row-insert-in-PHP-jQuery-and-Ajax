<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Multiple row insert in PHP jQuery and Ajax</title>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <center>
                   
                    <?php 
                        if(isset($_SESSION['status'])){
                    ?>
                    <h4 class="alert alert-success"><?php echo $_SESSION['status']?></h4>

                    <?php 
                        unset($_SESSION['status']);
                        }
                    ?>
                    <h3>Multiple row insert in PHP jQuery and Ajax</h3>
                    <a href="javascript:void(0)" class="btn btn-info" id="addBtn" style="margin-left: 60%;">Add</a>
                </center>
            </div>
            <div>
                <form  action="insert.php" method="POST">
                    <div class="main-form mt-3 border-bottom">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="from-group mb-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name[]" required='1' class="form-control" placeholder="Please Enter Your Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group mb-2">
                                    <label for="">Email</label>
                                    <input type="text" name="email[]" required='1' class="form-control" placeholder="Please Enter Your Email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group mb-2">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone[]" required='1' class="form-control" placeholder="Please Enter Your Phone">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div id="appendBtn"></div>
                        

                    <button type="submit" class=" btn btn-primary" style="margin-top: 10px;">Submit</button>

                </form>
            </div>
            <div class="card-body" id="table"></div>
        </div>
    </div>
</body>
</html>
<script>
   $(document).ready(function(){
        $("#addBtn").click(function(){
            $("#appendBtn").append(`
                    <div class="main-form mt-3 border-bottom">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="from-group mb-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name[]" required='1' class="form-control" placeholder="Please Enter Your Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group mb-2">
                                    <label for="">Email</label>
                                    <input type="text" name="email[]" required='1' class="form-control" placeholder="Please Enter Your Email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="from-group mb-2">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone[]" required='1' class="form-control" placeholder="Please Enter Your Phone">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="from-group mb-2">
                                    <br> 
                                    <button" type="button" id="removeBtn"  class=" btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
            
            `);
        });
   });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','#removeBtn',function(){
            $(this).closest(".main-form").remove();
        });
    });
</script>
<script>
    $(document).ready(function(){
        function loadTable(){
            $.ajax({
                type:'GET',
                url:'table.php',
                success:function(date){
                    $("#table").html(date);
                }
            });
        }

        loadTable()

        $('form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type:'post',
                url:'insert.php',
                data: $('form').serialize(),
                success:function(){
                    
                    alert("Data Inserted Successfully.");
                    loadTable()
                    $('form').trigger("reset");
                }
            });
        });
    });
</script>