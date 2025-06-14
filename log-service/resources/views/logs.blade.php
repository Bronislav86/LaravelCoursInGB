<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Логи</title>
  <style>
    table {
      width: 70%;
      margin: 20px auto;
      border-spacing: 0;
      border-collapse: collapse;
      box-shadow: 8px 4px 100px rgba(255, 255, 255, 0.25);
    }

    td,
    th {
      padding: 10px;
      border: 1px solid black;
      text-align: center;
    }

    tr:nth-child(odd) {
      background-color: #f2f2f2;
    }

    .error {
      color: red;
      text-align: center;
      margin: 20px;
    }
  </style>
</head>

<body>
  <?php
  $db_server = '127.0.0.1';
  $db_user = "root";
  $db_password = "123456";
  $db_name = "homework_database";

  try {
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password, [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $sql = "SELECT id, time, duration, ip, url, method, input FROM logs";
    $statement = $db->prepare($sql);
    $statement->execute();

    $result_array = $statement->fetchAll(PDO::FETCH_ASSOC);
  ?>
    <table>
      <thead>
        <tr>
          <th>id</th>
          <th>time</th>
          <th>duration</th>
          <th>ip</th>
          <th>url</th>
          <th>method</th>
          <th>input</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result_array as $result_row): ?>
          <tr>
            <td><?= htmlspecialchars($result_row["id"]) ?></td>
            <td><?= htmlspecialchars($result_row["time"]) ?></td>
            <td><?= htmlspecialchars($result_row["duration"]) ?></td>
            <td><?= htmlspecialchars($result_row["ip"]) ?></td>
            <td><?= htmlspecialchars($result_row["url"]) ?></td>
            <td><?= htmlspecialchars($result_row["method"]) ?></td>
            <td><?= htmlspecialchars($result_row["input"]) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php
  } catch (PDOException $e) {
    echo "<div class='error'>Ошибка при подключении к базе данных: " . htmlspecialchars($e->getMessage()) . "</div>";
  }
  ?>
</body>

</html>