<section id="register" class="authentication__form <?php if(isset($_GET["fullname"])) echo "active"; ?>">
    <span class="form__title">Register</span>
    <form id="form__register" action="./modules/register.php" method="POST">
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