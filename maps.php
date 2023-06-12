<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="numberForm" method="post" action="insert.php">
  <label for="number">Enter a number:</label>
  <input type="number" name="number" id="number" required>
  <button type="submit">Generate Input Boxes</button>
</form>

<div id="inputBoxes"></div>

</body>
</html>