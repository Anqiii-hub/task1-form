<?php

$db_host = "localhost";
$db_name = "task1";
$db_user = "user1";
$db_pass = "pVb..o5/LeZftJXm";

// create connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// check connection
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}
echo "Connected successfully!";

// create table
$sql1 = "
CREATE TABLE `menu_items` (
  `item_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `item_text` varchar(255) NOT NULL,
  `item_link` varchar(255) NOT NULL,
  `item_target` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";
$sql2 = "
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY (`parent_id`);
";
$sql3 = "
ALTER TABLE `menu_items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT;
";
$sql4 = "
INSERT INTO `menu_items` (`item_id`, `parent_id`, `item_text`, `item_link`, `item_target`) VALUES
  (1, NULL, 'Home', '/', NULL),
  (2, NULL, 'Blog', 'blog/', NULL),
  (3, NULL, 'Reviews', 'reviews/', NULL),
  (4, NULL, 'Shop', 'shop/', '_BLANK'),
  (5, 2, 'How To', 'blog/how/', NULL),
  (6, 2, 'Technology', 'blog/tech/', NULL),
  (7, 2, 'Hacks', 'blog/hacks/', NULL);
";
$sql_array = array($sql1, $sql2, $sql3, $sql4);

foreach ($sql_array as $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
$conn->close();
