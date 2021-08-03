<?php
    $room=$_POST['room'];

    if(strlen($room)>20 or strlen($room)<2){
        $message= "Room name must be between 2 to 20 characters!!";

        echo '<script type="text/javascript">';
        echo ' alert("' . $message . '");';
        echo 'window.location="http://localhost/Chatroom";';
        echo '</script>';
    }

    else if(!ctype_alnum($room)){
        $message= "Room name can contain alphanumeric characters!!";

        echo '<script type="text/javascript">';
        echo ' alert("' . $message . '");';
        echo 'window.location="http://localhost/Chatroom";';
        echo '</script>';

    }

    else {
        //connect to database
        include "db_connect.php";
    }
    
    //check room exist or not
    $sql = "SELECT * FROM `rooms` WHERE roomname = '$room';";
    $result = mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            $message= "Room already exist. Please choose different Room name";

            echo '<script type="text/javascript">';
            echo ' alert("' . $message . '");';
            echo 'window.location="http://localhost/Chatroom";';
            echo '</script>';
            

        }
        else {
            $sql = "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ( '$room', current_timestamp());";
            if(mysqli_query($conn,$sql)){
                $message= "Your room is ready, you can start chating now";

                echo '<script type="text/javascript">';
                echo ' alert("' . $message . '");';
                echo 'window.location="http://localhost/Chatroom/rooms.php?roomname=' . $room . '";';
                echo '</script>';
            
            }
        }
    }


?>