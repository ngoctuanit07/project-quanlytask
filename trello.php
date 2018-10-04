<?php
require 'Trello/trello.php';
header("Content-Type: text/html; charset=UTF-8");

$key = '0e150f61c20e86cdd2fdf8c2f1d1bfb4';
$token = '152e8216d0433b2a4b50e5b73c7d2f917ed2c61b9d37e6586e79fab167b49601';

$trelloBoard = new TrelloBoard($key, $token);
$boardId = 'PM0zIwLg';
// Getting board info
$returnBoard = $trelloBoard->get($boardId);
// Getting list of members from board
$returnMember = $trelloBoard->get($boardId, 'members');

$member = new TrelloMember($key,$token);


$returnBoard = $member->get("tuannguyendev");

$memberBoard = $member->get("tuannguyendev","boards");

foreach ($memberBoard as $value){
    // print_r($value);
    if($value->name === "VietACorp"){
        $boardId = $value->id;
        //listBoard $returnMember = $trelloBoard->get($boardId, 'lists');
        $trelloCard = new TrelloCard($key,$token);
        $cards = $trelloBoard->get($boardId,"cards");
        foreach ($cards as $card){
            $idListCard = $card->idList;
            if("5baa071902495868600c83cd" === $idListCard){
                // print_r($card->name);
                echo $card->id.'+'. $card->name;
                $taskName = $card->name;
                $taskId = $card->id;
                $ngaytao = $card->dateLastActivity;
                /**
                 * Connect To MySql
                 */

                $servername = "80.241.210.190";
                $username = "admin_prod";
                $password = "M00nL1ght";
                $dbname = "demo88_linhkien";

// Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                //$queryCheck = "";

                $result = mysqli_query($conn,"select * from tbl_task where idtasktrello='{$taskId}'");

                //  print_r($conn->query($queryCheck)); die();
                if(mysqli_num_rows($result)){
                    //die('61');
                    echo "Tồn tại";
                }else{
                    $sql = "INSERT INTO tbl_task (tentask, ngayTao, idtasktrello)
              VALUES ('{$taskName}', '{$ngaytao}', '{$taskId}')";

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }



                $conn->close();
            }

        }


    }
}

