<?php
include("../system/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="module.php" method="POST">
        <input type="submit" name="back" value="Back to home"><br><br>

        <label>Add module:</label><br>
        <input type="text" name="module_id" placeholder="Module id">
        <input type="text" name="module_name" placeholder="Module name">
        <select name="course_id">
            <?php
            $sql =
                "
                select * from course
                ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["course_id"] . "'>" . $row["course_name"] . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Add module" name="add-module">
    </form>

    <?php

    if (isset($_POST["add-module"])) {

        if (!empty($_POST["module_id"]) && !empty($_POST["module_name"])) {
            $id = $_POST["module_id"];
            $name = $_POST["module_name"];
            $courseid = $_POST["course_id"];

            $sql =
                "
            insert into module values
            ('$id', '$name', '$courseid');
            ";

            if ($conn->query($sql)) {
                echo "$name added";
            } else {
                echo "Failed to add";
            }
        }
    }

    if (isset($_POST["back"])) {
        header("Location: http://localhost/quizapp/index.php?");
    }
    ?>
</body>

</html>