<?php


include("dataconnection.php");

if(isset($_POST["btn"]))
{
    $name = $_POST["username"];
    $email = $_POST["useremail"];
    $cmt = $_POST["comment"];

    $sql = mysqli_query($connect,"INSERT INTO Comment(name_com,email_com,text_com) VALUES ('$name','$email','$cmt') ");  //Allow user to make query in database
                                    //Attribute (Fname,....from table database)    //VALUES (from Declaration)

    if($sql)
    {
        ?>
        <script>
            alert("RESPONSES SUBMITTED !"); //BASIC WAYS FOR CHECKING
        </script>
        <?php
    }


}

?>