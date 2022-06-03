<main class="chat_screen">
    <?php 
        // include("./modules/find_contact.php");


    ?>
    <header class="header chat-header">
        <div class="chat-user">
            <div class="arrow-back-icon chat-icon"></div>
            <img class="chat-user-img" alt="">

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