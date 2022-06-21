<?php 
    include("./modules/contacts.php");

    if(isset($_SESSION["user"])){
        $usersToShow = [];
        if(count($filter) > 0) {
            $usersToShow = $filter;
            echo "
                <li>
                    <form method=\"GET\" action=\"index.php\"><button>Remove filter</button></form>
                </li>
            ";
        } else {
            $usersToShow = $users;
        }

        foreach($usersToShow as $contact) {
            // var_dump($contact);
            $contactName = $contact["fullname"];
            $contactId = $contact["id"];
            $contactProfileImgId = $contact["profileimg_id"];
            $contactProfileImgPath = getProfileImgPath($conn, $contactProfileImgId);

            $last_message = $contact["last_message"]["text"];
            $last_message_timestamp = $contact["last_message"]["timestamp"];
            $last_message_timestamp = date_create($last_message_timestamp);
            $last_message_timestamp = date_format($last_message_timestamp, "d-m-Y H:i");
            // var_dump($contact);
            echo "
            <li class=\"chat chat1\" data-id=\"$contactId\">
                <div class=\"chat1-profile\">
                    <img src=\"./$contactProfileImgPath\" alt=\"\" class=\"chat1-profile-img\">
                </div>
    
                <div class=\"chat_right\">
                    <div class=\"chat-details\">
                        <span class=\"chat-name\">
                            $contactName
                        </span>
    
                        <span class=\"chat-time\">
                            $last_message_timestamp
                        </span>
                    </div>
    
                    <div class=\"chat-last-msg\">
                        
                        <span class=\"chat-last-msger-text\">
                            $last_message
                        </span>
                    </div>
                </div>
            </li>";
        }
    }
?>

<!-- <div class=\"chat-check check\"></div> -->