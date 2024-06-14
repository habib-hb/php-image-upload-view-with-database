<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Form</title>
</head>
<body>

    <h2>Upload Image</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Select image to upload:</label>
        <input type="file" name="image" id="image" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>



    <div>

        <?php

            // Backend Credentials
            $server_name = 'localhost';
            $user_name = 'weaponary';
            $password = 'weaponary';
            $dbname =  'image_upload';


            // Connecting with the database 
            $conn = new mysqli($server_name, $user_name , $password , $dbname);

            if ( $conn->connect_error ){
                die('Database connection failed.' . $conn->connect_error );
            }



            // Extracting all the images
            $sql = "SELECT image FROM images";
            $image_outputs = $conn->query($sql);

            if ( $image_outputs->num_rows  >  0 ){

            while ( $row = $image_outputs->fetch_assoc() ){
                 echo "<img src='" . htmlspecialchars($row['image']) . "' alt = 'Image' width='300px' /> <br><br>";   
            }

            } else {
                echo "There's no image available.";
            }
            


        ?>

    </div>



</body>
</html>