<?php

    $reply = $_POST["replyForum"];
    $questionId = $_POST["questionId"];
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';
    queryInfoForReply($reply, $questionId, $conn);
