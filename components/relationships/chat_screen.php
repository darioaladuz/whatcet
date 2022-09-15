<main class="chat_screen">
    <?php 
        // include("../../modules/find_contact.php");
    ?>
    <header class="header chat-header">
        <div class="chat-user">
            <div class="arrow-back-icon chat-icon"></div>
            <img class="chat-user-img" alt="">

            <div class="chat-user-details">
                <span class="chat-user-name">
                    
                </span>

                <span class="chat-user-last-seen">
                    
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
            <?php include("./components/emojis.php"); ?>
            <!-- <span class="chat-bar-emojis-btn chat-btn"><img src="./assets/icons/emoticon.svg" alt=""></span> -->
            <div class="chat-bar-icon emoji">
                
            </div>
            
            <!-- <span class="chat-bar-sharer-btn chat-btn"><img src="./assets/icons/paperclip.svg" alt=""></span> -->
            <form action="./modules/share_file.php" method="POST" enctype="multipart/form-data">
                <label for="file">
                    <div class="chat-bar-icon clip"></div>
                </label>
                <input name="image" style="display: none" id="file" type="file">
                <!-- <input type="submit" name="submit"> -->
            </form>

            <div class="dropdown sharer-dropdown">
                <ul>
                    <li>Document</li>
                    <li>Location</li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>

        <form action="../../modules/sendMessage.php" method="POST" class="chat-bar-msg">
            <input type="text" name="message" class="chat-input" placeholder="Type a message">
            <button type="submit" name="submit"><div class="chat-bar-icon send"></div></button>
        </form>

        <!-- <div class="chat-bar-mic">
            <span class="chat-bar-mic-btn chat-btn"><img src="./assets/icons/microphone.svg" alt=""></span>
        </div> -->

        <!-- <div class="chat-bar-icon mic"></div> -->
    </section>
</main>