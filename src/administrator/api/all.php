<?php
    include('./connect.php');

    $querySubject = "SELECT * FROM subject";
    $queryComment = "SELECT * FROM comment";
    $queryDocument = "SELECT * FROM document";

    $subject = [];
    $comment = [];
    $document = [];

    foreach($conn -> query($querySubject) as $item){
        array_push($subject, $item);
    }

    foreach($conn -> query($queryComment) as $item){
        array_push($comment, $item);
    }

    foreach($conn -> query($queryDocument) as $item){
        array_push($document, $item);
    }

    $data = [
        "subject" => $subject,
        "document" => $document,
        "comment" => $comment
    ];
    
    echo json_encode($data);
?>