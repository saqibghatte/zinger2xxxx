<?php

require('includes/config.php');
if(isset($_POST['name'])&&isset($_POST['tat'])&&!isset($_POST['getnum']))
{
    $name = secure($_POST['name']);
    $tat = secure($_POST['tat']);

    $sql="SELECT * FROM `members_list` WHERE `FullName` LIKE '%$name%' AND `tat_pandi` = $tat";
    if($result = $mysqli->query($sql))
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<option onclick = \"alert('Hello World');\" value='" . $row['FullName'] . "'>";
        }
    }
}

if(isset($_POST['name'])&&isset($_POST['tat'])&&isset($_POST['getnum']))
{
    $name = secure($_POST['name']);
    $tat = secure($_POST['tat']);
    $data = array();
    
    $sql="SELECT * FROM `members_list` WHERE `FullName` = '$name' AND `tat_pandi` = $tat LIMIT 1";
    if($result = $mysqli->query($sql))
    {
        while ($row = $result->fetch_assoc())
        {
            
            if($row['contact_no']!="")
            {
                $contact = "******" . substr($row['contact_no'], -4); 
            }
            array_push($data,$contact);
            array_push($data,$row['emailId']);
        }
    }
    
    echo json_encode($data);
}
?>
    