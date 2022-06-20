<form class="form-profile-img" action="./modules/upload.php" method="POST" enctype="multipart/form-data">
    <label for="profileimg__input">
        <div class="form__img__container">
            <img id="form__img" src=".<?php echo $profileimg_path ?>" alt="">   
            <div class="form__img__background">
                <div class="icon__container">
                    <div class="pencil-icon profile-icon">
                    
                    </div>
                </div>
            </div>
        </div>
        <input id="profileimg__input" type="file" name="file" style="display: none;" />
    </label>    
    <button name="submit" type="submit">Upload</button>
</form>