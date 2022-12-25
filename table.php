<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

    <?php 
        $conn = mysqli_connect("localhost","root","","php_multiple_data");
        $query = "SELECT * FROM tbl_multiple_insert_data";
        $result = mysqli_query($conn,$query);
    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php

                     while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>