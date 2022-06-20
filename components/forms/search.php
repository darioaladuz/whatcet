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

        $sql = "SELECT * FROM `users` WHERE `username` LIKE '%$search%'";
        $result = $conn->query($sql);
        $filter = array();
        while($row = $result->fetch_assoc()) {
            if($row["id"] !== $_SESSION["user"]["id"]){
                if(count($filter) === 0){
                    $filter[0] = $row;
                } else {
                    array_push($filter, $row);
                }
            }
        }
    }
?>