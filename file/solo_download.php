<?php 
    $id=$_GET['ID'];
    $type=$_GET['type'];
    $uid=$_GET['uid'];
    $conn = mysqli_connect('localhost', 'root', '', 'dbms_project');
    $sql = "SELECT * FROM files WHERE UID= '$uid'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $file_pointer = 'uploads/' . $id.'/'.$type.'/'.$uid;
    $filepath = $file_pointer.'/' . $file['Name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_pointer.'/' . $file['Name']));
        readfile($file_pointer.'/' . $file['Name']);
        exit;
    }
    else{
        echo "No Files Found!!!";
    }

?>
