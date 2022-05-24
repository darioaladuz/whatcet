<section id="login" class="authentication__form <?php if(isset($_GET["wrongcredentials"])) echo "active"; ?>">
    <span class="form__title">Log In</span>
    <form id="form__log" action="./modules/login.php" method="POST">
        <label for="username">Username</label>
        <input name="username" required minlength="3" maxlength="16" type="text" placeholder="elonmusk777">
        <label for="password">Password</label>
        <input name="password" required minlength="8" maxlength="16" type="password" placeholder="********">
        <input type="hidden" name="type" id="type" value="login" />
        <input type="submit" name="log_submit" value="^" class="form__submit">
    </form>
</section>