<?php

/*
 * Demonstration of how to CRUD a MESSAGE TABLE ENTRY using an SQL Database (SQlite3) via PHP.
 * ANY MESSAGE / PAYLOAD can contain a sub-record / payload simply by using an arbitrary 
 * delimiter, such as an ASCII TAB, a PIPE character ("|") (etc.)
 */

function openPDO() {
    $file_db = new PDO('sqlite:_dbturnstile.sqlt3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS messages (
                    id INTEGER PRIMARY KEY, 
                    ip TEXT, 
                    title TEXT, 
                    message TEXT, 
                    time INTEGER,
                    timecreated INTEGER,
                    timeupdated INTEGER
                    )");
    return $file_db;
}

function normalize($string) {
    return str_replace('"', "'", $string);
}

function countLines() {
    $file_db = openPDO();
    $result = $file_db->query("SELECT * FROM messages"); // (sigh)
    $val = $result->rowCount(); // (sigh)
    return $val;
}

function getRowID($ip, $time) {
    $file_db = openPDO();
    $result = $file_db->query("SELECT * FROM messages WHERE ip='$ip' AND time=$time ;");
    foreach ($result as $row) {
        return $row['id'];
    }
    return 0; // not found
}

function createRow($ip, $time, $title, $message) {
    while (getRowID($ip, $time) != 0) {
        $time++;
    }
    $ctime = time();
    $file_db = openPDO();
    $insert = "INSERT INTO messages (ip, title, message, time, timecreated) 
                VALUES (:ip, :title, :message, :time, :ctime)";
    $stmt = $file_db->prepare($insert);

    $title = normalize($title);
    $stmt->bindParam(':title', $title);
    $message = normalize($message);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':ip', $ip);
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':ctime', $ctime);
    $br = $stmt->execute();

    $verdect = "Success:";
    if ($br != true) {
        $verdect = "Error:";
    }
    $id = getRowID($ip, $time);
    return "$verdect|$id|$ip|$time";
}

function updateRow($id, $title, $message) {
    $file_db = openPDO();
    $ctime = time();
    $title = normalize($title);
    $message = normalize($message);
    $update = 'UPDATE messages SET title="' . $title . '", message="' . $message . '", timeupdated=$ctime 
                WHERE id=' . $id;
    $count = $file_db->exec($update);

    if ($count == 0) {
        return "Error: No Update";
    }
    if ($count > 1) {
        return "Warning: Multi Update";
    }
    return "Success: $id updated";
}

function readRow($id) {
    $file_db = openPDO();
    $result = $file_db->query("SELECT * FROM messages WHERE id=$id");
    foreach ($result as $row) {
        return $row;
    }
    return null;
}

function deleteRow($id) {
    $file_db = openPDO();
    $update = "DELETE from messages WHERE id=$id";
    $count = $file_db->exec($update);

    if ($count == 0) {
        return "Error: No Delete";
    }
    if ($count > 1) {
        return "Warning: Multi Delete";
    }
    return "Success: $id deleted";
}

?>
