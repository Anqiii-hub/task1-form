<nav class="menu">
    <?php
    $db_host = "localhost";
    $db_name = "task1";
    $db_user = "user1";
    $db_pass = "pVb..o5/LeZftJXm";

    // create connection to database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // check connection
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    echo "Connected successfully!";

    // select level menu items
    $sql = "SELECT item_text FROM menu_items";
    $result = $conn->query($sql);
    $menu = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "item_text: " . $row["item_text"]. "<br>";
            $menu[] = $row["item_text"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    echo "=======================================================";
    ?>

    <!--DRAW MENU ITEMS-->
    <div id="sidebar-menu">
        <div class="outer">
            <div>Personal details</div>
            <button id="sidebar-manu-btn">button</button>
        </div>

        <div class="level_menu">
            <?php
                foreach ($menu as $menu_items) {
                    echo $menu_items. "<hr>";
            }
            ?>
        </div>
    </div>

</nav>
