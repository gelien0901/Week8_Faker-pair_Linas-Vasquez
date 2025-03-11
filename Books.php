<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();


$genres = ['Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror'];


$books = [];


for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'Title' => $faker->words(3, true), 
        'Author' => $faker->name, 
        'Genre' => $genres[array_rand($genres)], 
        'Publication Year' => $faker->numberBetween(1900, 2024), 
        'ISBN' => $faker->isbn13, 
        'Summary' => $faker->paragraph 
    ];
}

echo "<table border='1'>";
echo "<tr>
<th>Title</th>
<th>Author</th>
<th>Genre</th>
<th>Publication Year</th>
<th>ISBN</th>
<th>Summary</th>
</tr>";

foreach ($books as $book) {
    echo "<tr>";
    foreach ($book as $detail) {
        echo "<td>" . htmlspecialchars($detail) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
