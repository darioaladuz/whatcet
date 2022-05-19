<?php 
    session_start();
    include("./db.php");
    $username;
    $status;
    if($_SESSION["user"]){
        $username = $_SESSION["user"]["fullname"];
        $status = $_SESSION["user"]["status"];
        // echo $_SESSION['user']['profileimg_path'];
    }
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
    <?php echo "<script>console.log('$username')</script>"; ?> 
    <section id="authentication__screen" class="<?php if($_SESSION["user"]) echo "inactive"; ?>">
        <span id="authentication__title">WhatCet</span>
        <button class="authentication__btn btn--log">Log In</button>
        <span id="authentication__separate">or</span>
        <button class="authentication__btn btn--register">Register</button>

        <section id="login" class="authentication__form <?php if(isset($_GET["wrongcredentials"])) echo "active" ?>">
            <span class="form__title">Log In</span>
            <form id="form__log" action="./login.php" method="POST">
                <label for="username">Username</label>
                <input name="username" required minlength="3" maxlength="16" type="text" placeholder="elonmusk777">
                <label for="password">Password</label>
                <input name="password" required minlength="8" maxlength="16" type="password" placeholder="********">
                <input type="hidden" name="type" id="type" value="login" />
                <input type="submit" name="log_submit" value="^" class="form__submit">
            </form>
        </section>

        <section id="register" class="authentication__form <?php if(isset($_GET["fullname"])) echo "active"; ?>">
            <span class="form__title">Register</span>
            <form id="form__register" action="./register.php" method="POST">
                <?php if(isset($_GET["alreadyexists"])) echo "<span class=\"error\">Username or email already exists"; ?></span>
                <label for="fullname">Full Name (this is how other users will see you)</label>
                <input name="fullname" required minlength="3" maxlength="48" type="text" value="<?php if(isset($_GET["fullname"])) echo $_GET["fullname"] ?>">
                <label for="username">Username (this is how you will log in)</label>
                <input name="username" required minlength="3" maxlength="16" type="text" value="<?php if(isset($_GET["username"])) echo $_GET["username"] ?>">
                <label for="email">Email</label>
                <input name="email" required minlength="8" maxlength="16" type="email" value="<?php if(isset($_GET["email"])) echo $_GET["email"] ?>">
                <label for="password">Password</label>
                <input name="password" required minlength="8" maxlength="16" type="password">
                <label for="password2">Repeat password</label>
                <input name="password2" required minlength="8" maxlength="16" type="password">
                <input type="hidden" name="type" id="type" value="register" />
                <input type="submit" name="register_submit" value="^" class="form__submit">
            </form>

        </section>
    </section>
    <!-- <input style="display: none;" id="file" type="file"> -->

    <form class="form-profile-img" action="./upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" />
        <button name="submit" type="submit">Upload</button>
    </form>

    <aside id="sidebar">
        <header>
            <div class="user">
                <div class="user-header">
                    <div class="arrow-back-icon profile-arrow"></div>
                    <img class="user-img" src=".<?php echo $_SESSION['user']['profileimg_path']; ?>" alt="">
                    <button class="btn btn-modal-profileimg">change<div class="pencil-icon profile-icon"></div></button>

                    
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
                        <span class="user-profile-name-title">
                            Your name
                        </span>

                        <form class="user-profile-name-display" action="./update.php" method="POST">
                            <input id="fullname" name="fullname" class="profile-input user-name" value="<?php echo $username; ?>" placeholder="Full name" required minlength="3" maxlength="25">

                            <button class="btn btn-change-name">change</button>
                        </form>
                    </div>

                    <div class="user-profile-disclaimer">
                        <span class="user-profile-disclaimer-text">
                            This is not your username or pin. This name will be visible to your WhatCet contacts.
                        </span>
                    </div>

                    <form class="user-profile-status" action="./update.php" method="POST">
                        <span class="user-profile-status-title">Status</span>

                        <div class="user-profile-status-display">
                            <input id="status" name="status" class="profile-input user-status" value="<?php echo $status ?>" placeholder="What's on your mind?" required>
                    
                            <button class="btn btn-change-status">change</button>
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
                        <li><button><a href="logout.php">Log out</a></button></li>
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
                <li class="chat chat1">
                    <div class="chat1-profile">
                        <img src="./images/girl1.jpeg" alt="" class="chat1-profile-img">
                    </div>

                    <div class="chat_right">
                        <div class="chat-details">
                            <span class="chat-name">
                                Laura
                            </span>
    
                            <span class="chat-time">
                                14:59
                            </span>
                        </div>
    
                        <div class="chat-last-msg">
                            <div class="chat-check check"></div>
                            <span class="chat-last-msger-text">
                                Lorem ipsum blabla
                            </span>
                        </div>
                    </div>
                </li>
                <li class="chat chat2">
                    <div class="chat2-profile">
                        <img src="./images/girl2.jpeg" alt="" class="chat2-profile-img">
                    </div>
                    
                    <div class="chat_right">
                        <div class="chat-details">
                            <span class="chat-name">
                                Marina
                            </span>
                        
                            <span class="chat-time">
                                12:32
                            </span>
                        </div>
                        
                        <div class="chat-last-msg">
                            <div class="chat-check doublecheck"></div>
                            <span class="chat-last-msger-text">
                                Lorem ipsum blabla
                            </span>
                        </div>
                    </div>
                </li>
                <li class="chat chat3">
                    <div class="chat3-profile">
                        <img src="./images/guy.jpeg" alt="" class="chat3-profile-img">
                    </div>
                    
                    <div class="chat_right">
                        <div class="chat-details">
                            <span class="chat-name">
                                Paul
                            </span>
                        
                            <span class="chat-time">
                                yesterday
                            </span>
                        </div>
                        
                        <div class="chat-last-msg">
                            <div class="chat-check doublecheck bluecheck"></div>
                            <span class="chat-last-msger-text">
                                Lorem ipsum blabla
                            </span>
                        </div>
                    </div>
                </li>
                <li class="chat chat4">
                    <div class="chat4-profile">
                        <img src="./images/woman.jpeg" alt="" class="chat1-profile-img">
                    </div>
                    
                    <div class="chat_right">
                        <div class="chat-details">
                            <span class="chat-name">
                                Mama
                            </span>
                        
                            <span class="chat-time">
                                Thursday
                            </span>
                        </div>
                        
                        <div class="chat-last-msg">
                            <div class="chat-check doublecheck bluecheck"></div>
                            <span class="chat-last-msger-text">
                                Lorem ipsum blabla
                            </span>
                        </div>
                    </div>
                </li>
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