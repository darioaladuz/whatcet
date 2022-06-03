<?php 
    include("./modules/contacts.php");

    if(isset($_SESSION["user"])){
        $usersToShow = [];
        if(count($filter) > 0) {
            $usersToShow[0] = $filter;
            echo "
                <li>
                    <button>Remove filter</button>
                </li>
            ";
        } else {
            $usersToShow = $users;
        }

        // var_dump($usersToShow);

        foreach($usersToShow as $contact) {
            $contactName = $contact["fullname"];
            $contactUsername = $contact["username"];
            $contactProfileImgId = $contact["profileimg_id"];
            $contactProfileImgPath = getProfileImgPath($conn, $contactProfileImgId);
            echo "
            <li class=\"chat chat1\" data-username=\"$contactUsername\">
                <div class=\"chat1-profile\">
                    <img src=\"./$contactProfileImgPath\" alt=\"\" class=\"chat1-profile-img\">
                </div>
    
                <div class=\"chat_right\">
                    <div class=\"chat-details\">
                        <span class=\"chat-name\">
                            $contactName
                        </span>
    
                        <span class=\"chat-time\">
                            14:59
                        </span>
                    </div>
    
                    <div class=\"chat-last-msg\">
                        <div class=\"chat-check check\"></div>
                        <span class=\"chat-last-msger-text\">
                            Lorem ipsum blabla
                        </span>
                    </div>
                </div>
            </li>";
        }
    }
?>