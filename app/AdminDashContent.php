<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
<main>
    <form action="AdminEmployeeList.php" method="post">
        <h1>Welcome!</h1>
        <button type="submit">Employee List</button>
    </form>
    <form action="AdminTasks.php" method="post">
        <button type="submit" >Tasks List</button>
    </form>
    <form action="AdminPatients.php" method="post">
        <button type="submit" >Patient List</button>
    </form>
    <form action="AdminMedicine.php" method="post">
        <button type="submit" >Medicine List</button>
    </form>
    <form action="AdminDeliveries.php" method="post">
        <button type="submit" >Current Deliveries</button>
        <footer><a href="index.php">Logout</a></footer>
    </form>
</main>
</body>
</html>