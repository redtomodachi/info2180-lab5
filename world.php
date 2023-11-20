<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$stmt = $conn->query("SELECT  countries.name, countries.continent,countries.independence_year,countries.head_of_state FROM countries WHERE countries.name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
 
 <?php if(isset($country)): ?>

<table class = "countryinfo">

  <thead>
    <tr>
      <th> Name </th>
      <th> Continent </th>
      <th> Independence </th>
      <th> Head of State </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $country): ?>
      <tr>
        <td><?php print $country["name"]; ?></td>
        <td><?php print $country["continent"]; ?></td>
        <td><?php print $country["independence_year"]; ?></td>
        <td><?php print $country["head_of_state"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
