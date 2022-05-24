<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    include("./db.php");
    include("./modules/profile_img.php");
    $username;
    $status;
    $profileimg_path;
    if($_SESSION["user"]){
        $username = $_SESSION["user"]["fullname"];
        $status = $_SESSION["user"]["status"];
        // echo $_SESSION['user']['profileimg_path'];
    }
    $profileimg_id = $_SESSION['user']['profileimg_id'];

    $profileimg_path = getProfileImgPath($conn, $profileimg_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatCet</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/a85295bb64.js" crossorigin="anonymous"></script>
</head>
<body>
    <section id="authentication__screen" class="<?php if(isset($_SESSION['user'])) echo 'inactive'; ?>">
        <span id="authentication__title">WhatCet</span>
        <button class="authentication__btn btn--log">Log In</button>
        <span id="authentication__separate">or</span>
        <button class="authentication__btn btn--register">Register</button>

        <?php include("./components/forms/login.php"); ?> 

        <?php include("./components/forms/register.php"); ?>
    </section>
    <!-- <input style="display: none;" id="file" type="file"> -->

    <?php include("./components/forms/upload.php"); ?> 

    <aside id="sidebar">
        <header>
            <div class="user">
                <div class="user-header">
                    <div class="arrow-back-icon profile-arrow"></div>
                    <img class="user-img" src=".<?php echo $profileimg_path; ?>" alt="">
                    <button class="btn btn-change btn-modal-profileimg"><div class="pencil-icon profile-icon"></div></button>
                </div>
               
                <div class="user-profile">
                    <div class="user-profile-back">
                        <h2 class="user-profile-title">Profile</h2>
                    </div>
<!-- 
                    <div class="user-profile-img">
                        <img src="" alt="">
                    </div> -->

                    <div class="user-profile-name">
                        <p class="user-profile-name-title">
                            Your name
                        </p>

                        <form class="user-profile-name-display" action="./modules/update.php" method="POST">
                            <input id="fullname" name="fullname" class="profile-input user-name" value="<?php echo $username; ?>" placeholder="Full name" required minlength="3" maxlength="25">

                            <button class="btn btn-change btn-change-name"><div class="pencil-icon profile-icon"></div></button>
                        </form>
                    </div>

                    <div class="user-profile-disclaimer">
                        <p class="user-profile-disclaimer-text">
                            This is not your username or pin. This name will be visible to your WhatCet contacts.
                        </p>
                    </div>

                    <form class="user-profile-status" action="./modules/update.php" method="POST">
                        <p class="user-profile-status-title">Status</p>

                        <div class="user-profile-status-display">
                            <input id="status" name="status" class="profile-input user-status" value="<?php echo $status ?>" placeholder="What's on your mind?" required>
                    
                            <button class="btn btn-change btn-change-status"><div class="pencil-icon profile-icon"></div></button>
                        </div>
                    </form>
                </div>
            </div>

            
        
            <nav>
                <ul>
                    <li><button class="btn btn-status"><i class="fas fa-circler-notch"></i></button></li>
                    <!-- <li><button class="btn btn-new-chat"><i class="fas fa-comment-alt"></i></button></li> -->
                    <li><button class="btn btn-menu"><i class="fas fa-ellipsis-v"></i></button></li>
                </ul>
        
                <div class="dropdown dropdown-menu">
                    <ul>
                        <li>New group</li>
                        <li>Starred messages</li>
                        <li>Settings</li>
                        <li><button><a href="./modules/logout.php">Log out</a></button></li>
                    </ul>
                </div>
            </nav>
        </header>

        <section id="search-bar-container">
            <i class="fas fa-search"></i>
            <input type="text" id="search-bar" placeholder="Search or start new chat">
        </section>

        <section id="chats">
            <ul>
                <?php include("./components/contacts.php"); ?>
            </ul>
        </section>
    </aside>

    <section class="welcome-page">
        <div class="welcome-img">
            <img src="" alt="">
        </div>

        <div class="welcome-text">
            <h1>Welcome to WhatCet</h1>

            <p>You can start chatting with any of your contacts or start a new chat with someone.</p>
        </div>
    </section>

    <main class="chat_screen">
        <header class="header chat-header">
            <div class="chat-user">
                <div class="arrow-back-icon chat-icon"></div>
                <img src="./images/girl1.jpeg" alt="">

                <div class="chat-user-details">
                    <span class="chat-user-name">
                        Laura
                    </span>

                    <span class="chat-user-last-seen">
                        online
                    </span>
                </div>
            </div>

            <div class="chat-header-icons">
                <!-- <span class="chat-search">[]</span> -->
                <div class="chat-bar-icon video"></div> 

                <span class="chat-menu-btn"><i class="fas fa-ellipsis-v"></i></span>

                <div class="dropdown chat-dropdown-menu">
                    <ul>
                        <li>Contact info</li>
                        <li>Select messages</li>
                        <li>Close chat</li>
                        <li>Mute notifications</li>
                        <li>Clear messages</li>
                        <li>Delete chat</li>
                    </ul>
                </div>
            </div>
        </header>

        <section class="chat_window">
            <ul class="messages">
                <li class="message contact-message">
                    <span class="contact-message-text">
                        Hi
                    </span>
                
                    <div class="contact-message-details">
                        <span class="message-time">
                            14:11
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>
                <li class="message user-message">
                    <span class="user-message-text">
                        Hello
                    </span>
                
                    <div class="user-message-details">
                        <span class="message-time">
                            14:05
                        </span>
                
                        <div class="chat-check doublecheck bluecheck">
            
                        </div>
                    </div>
                </li>
                <li class="message user-message">
                    <span class="user-message-text">
                        sure dw
                    </span>
                
                    <div class="user-message-details">
                        <span class="message-time">
                            12:42
                        </span>
                
                        <div class="chat-check doublecheck bluecheck">
            
                        </div>
                    </div>
                </li>
                <li class="message contact-message">
                    <span class="contact-message-text">
                        TTYL gtg
                    </span>
                
                    <div class="contact-message-details">
                        <span class="message-time">
                            12:38
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>
                <li class="message user-message">
                    <span class="user-message-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, ullam.
                    </span>
                
                    <div class="user-message-details">
                        <span class="message-time">
                            12:24
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>

                <li class="message user-message">
                    <span class="user-message-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, ullam.
                    </span>
                
                    <div class="user-message-details">
                        <span class="message-time">
                            12:24
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>

                <li class="message contact-message">
                    <span class="contact-message-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, adipisci.
                    </span>
                
                    <div class="contact-message-details">
                        <span class="message-time">
                            12:10
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>

                <li class="message contact-message">
                    <span class="contact-message-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, adipisci.
                    </span>
                
                    <div class="contact-message-details">
                        <span class="message-time">
                            12:08
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>

                <li class="message user-message">
                    <span class="user-message-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, ullam.
                    </span>
                
                    <div class="user-message-details">
                        <span class="message-time">
                            12:05
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>

                <li class="message contact-message">
                    <span class="contact-message-text">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, adipisci.
                    </span>
                
                    <div class="contact-message-details">
                        <span class="message-time">
                            11:54
                        </span>
                
                        <!-- <div class="chat-check doublecheck">
                        </div> -->
                    </div>
                </li>
            </ul>
        </section>

        <section class="chat_video">
            <div class="video__container">
                <video width="100%" autoplay muted></video>
            </div>
            <footer class="chat_video_footer">
                <div class="icon--hangup__container">
                    <div class="chat-bar-icon icon--hangup"></div>
                </div>
            </footer>
        </section>

        <section class="chat-bar">
            <div class="chat-bar-btns">
                <!-- <span class="chat-bar-emojis-btn chat-btn"><img src="./assets/icons/emoticon.svg" alt=""></span> -->
                <div class="chat-bar-icon emoji"></div>
                <!-- <span class="chat-bar-sharer-btn chat-btn"><img src="./assets/icons/paperclip.svg" alt=""></span> -->
                <form action="/">
                    <label for="file">
                        <div class="chat-bar-icon clip"></div>
                    </label>
                    <input style="display: none" id="file" type="file">
                </form>

                <div class="dropdown sharer-dropdown">
                    <ul>
                        <li>Document</li>
                        <li>Location</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>

            <form action="" class="chat-bar-msg">
                <input type="text" class="chat-input" placeholder="Type a message">
            </form>

            <!-- <div class="chat-bar-mic">
                <span class="chat-bar-mic-btn chat-btn"><img src="./assets/icons/microphone.svg" alt=""></span>
            </div> -->

            <div class="chat-bar-icon mic"></div>
        </section>
    </main>
    <footer>Copyright © WhatCet, Dario Aladuz</footer>
    <script src="script.js"></script>
</body>
</html>