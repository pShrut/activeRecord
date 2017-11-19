<?php

  function die_r($value) {
     echo '<pre>';
     print_r($value);
     echo '</pre>';
     }

   require_once 'database.php';

   $db = new Database();
    
   $getRow = $db->getRow("SELECT * FROM accounts WHERE id = ?", ["5"]);
   $getRows = $db->getRows("SELECT * FROM accounts");
   $insertRow = $db->insertRow("INSERT INTO accounts(fname, password, email)
   VALUE(?, ?, ?)", ["kriti", "566677","kp4545@njit.edu"]);
   $updateRow = $db->updateRow("UPDATE accounts SET lname = ?, password = ?
   WHERE id = ?", ["gabreeala", "7878787","7"]);
   $deleteRow = $db->deleteRow("DELETE FROM accounts WHERE id = ?", [8]);

   die_r($getRow);
   die_r($getRows);
   die_r($insertRow);
   die_r($updateRow);
   die_r($deleteRow);

   $db->Disconnect();
   ?>
