<?php

function die_r($value){
    echo '<pre>';
     print_r($value);
     echo '</pre>';
    }

            require_once 'database.php';

	    $db = new Database();

	    $getRow = $db->getRow("SELECT * FROM todos WHERE id = ?", ["5"]);
	    $getRows = $db->getRows("SELECT * FROM todos");
	    $insertRow = $db->insertRow("INSERT INTO todos(ownerid, owneremail,
	    id) VALUE(?, ?, ?)", ["455", "eri@njit.edu", "13"]);
	    $updateRow = $db->updateRow("UPDATE todos SET message = ?, isdone =
	    ? WHERE id = ?", ["hello", "1", "9"]);
	    $deleteRow = $db->deleteRow("DELETE FROM todos WHERE id = ?", [8]);


	    die_r($getRow);
	    die_r($getRows);
	    die_r($insertRow);
	    die_r($updateRow);
	    die_r($deleteRow);


	    $db->Disconnect();
	    ?>
