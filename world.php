<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_GET, "lookup", FILTER_SANITIZE_STRING);
$stmt = $conn->query("SELECT  countries.name, countries.continent,countries.independence_year,countries.head_of_state FROM countries WHERE countries.name LIKE '%$country%'");
$city_stmt = $conn-> query("SELECT cities.name, cities.district, cities.population FROM cities LEFT JOIN countries ON countries.code = cities.country_code  WHERE countries.name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results1 = $city_stmt -> fetchAll(PDO::FETCH_ASSOC);

?>
 
 <?php if ($city == "cities"):?>
  <table>
    <thead>
      <tr>
        <th> Name </th>
        <th> District </th>
        <th> Population </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results1 as $lookup): ?>
        <tr>
          <td><?php print $lookup["name"]; ?></td>
          <td><?php print $lookup["district"]; ?></td>
          <td><?php print $lookup["population"]; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php endif; ?>
  <?php if($city != "cities"): ?>

<table>

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
