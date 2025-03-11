<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();


function hashPassword($password) {
    return hash('charlene256', $password);
}


$users = [];


for ($i = 0; $i < 10; $i++) {
    $email = $faker->email; 
    $users[] = [
        'User ID' => $faker->uuid, 
        'Full Name' => $faker->name, 
        'Email Address' => $email,
        'Username' => strtolower(explode('@', $email)[0]),
        'Password (Encrypted)' => hashPassword($faker->password), 
        'Account Created' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s') 
    ];
}


echo "<table border='1'>";
echo "<tr>
<th>User ID</th>
<th>Full Name</th>
<th>Email Address</th>
<th>Username</th>
<th>Password (Encrypted)</th>
<th>Account Created</th>
</tr>";

foreach ($users as $user) {
    echo "<tr>";
    foreach ($user as $detail) {
        echo "<td>" . htmlspecialchars($detail) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
