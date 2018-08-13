<?php
require 'connect.php';

$query = "SELECT vatsimcid , rating from atc_roster";

if ($result = $db->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        

        $vatsimid = $row["vatsimcid"];
        $old_rating = $row["rating"];
        $status = $row["status"];
        $xml = simplexml_load_file("https://cert.vatsim.net/cert/vatsimnet/idstatus.php?cid=$vatsimid");
		$new_rating = $xml->user->rating;
		$fname = $xml->user->name_first;
        $lname = $xml->user->name_last;
        if($new_rating!=$old_rating)
        {
            $query2 = "UPDATE atc_roster set rating = '$new_rating' WHERE vatsimcid = '$vatsimid'";
            $new_result = $db->query($query2);
            if($status=="Resident")
            {
            $query3 = "INSERT into news(type,vatsimid,fname,lname,rating,status) values('rating','$vatsimid','$fname','$lname','$new_rating','$status')";
            $rup = $db->query($query3);
            }
        }
    }

    /* free result set */
    $result->free();
}

/* close connection */
$db->close();
?>