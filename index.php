<?php
echo 'PHP VERSION: ' . phpversion();

$db = [
    'host' => "db",
    'dbname' => "test_db",
    'username' => "test",
    'password' => "secret"
];

try {
    $conn = new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'], $db['username'], $db['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('SELECT * FROM users');
    $stmt->execute();
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

echo '<h1>A simple PHP environment using Docker!</h1>';

while ($row = $stmt->fetch()) {
    echo '<h2>My name is ' . $row['name'] . '.</h2>';
    echo '<h2>I\'m ' . $row['age'] . ' years old.</h2>';
    echo '<h2>' . ($row['gender'] == 'M' ? "Male" : "Female") . '</h2>';
    echo '<hr>';
}
