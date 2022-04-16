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
    <form action="PharmacistProfile.php" method="post">
        <h1>Welcome!</h1>
        <button type="submit">Profile</button>
    </form>
    <form action="PharmacistTasks.php" method="post">
        <button type="submit" >Tasks</button>
    </form>


    <form action="PharmacistPrescription.php" method="post">
        <button type="submit" >Medicine List</button>
    </form>

    <form action="PharmacistDeliveries.php" method="post">
        <button type="submit" >Current Deliveries</button>
        <footer><a href="index.php">Logout</a></footer>
    </form>
</main>
</body>
</html>