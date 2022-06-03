<section id="search-bar-container">
    <form action="" method="POST">
        <i class="fas fa-search"></i>
        <input type="text" id="search-bar" name="search" placeholder="Search or start new chat">
        <input type="submit" name="submit_search" />
    </form>
</section>

<?php 
    if(isset($_POST["search"])){
        $search = $_POST["search"];

        $sql = "SELECT * FROM `users` WHERE `username` = '$search'";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();

        $filter = $result;
    }
?>