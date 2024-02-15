<?php
echo 'PHP VERSION: ' . phpversion();
$connect = mysqli_connect(
    'db',
    'test',
    'secret',
    'test_db'
);

$query = 'SELECT * FROM users';
$result = mysqli_query($connect, $query);

echo '<h1>A simple PHP environment using Docker!</h1>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<h2>My name is ' . $row['name'] . '.</h2>';
    echo '<h2>I\'m ' . $row['age'] . ' years old.</h2>';
    echo '<h2>' . ($row['gender'] == 'M' ? "Male" : "Female") . '</h2>';
    echo '<hr>';
}
