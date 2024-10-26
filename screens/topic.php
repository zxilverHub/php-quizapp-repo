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
    <form action="topic.php" method="POST">
        <input type="submit" name="back" value="Back to home"><br><br>
        <input type="text" placeholder="Topic id" name="topic_id">
        <input type="text" placeholder="Topic name" name="topic_name">
        <select name="module">
            <?php
            $sql =
                "
                    select course.course_name, module.module_id, module.module_name from course
                    join module
                    on course.course_id = module.course_id;
                ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["module_id"] . "'>" . $row["course_name"] . " (" . $row["module_name"] . ")</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Add topic" name="add">
    </form>

    <?php


    if (isset($_POST["back"])) {
        header("Location: http://localhost/quizapp/index.php");
    }

    if (isset($_POST["add"])) {
        if (!(empty($_POST["topic_id"]) && empty($_POST["topic_name"]))) {
            $id = $_POST["topic_id"];
            $name = $_POST["topic_name"];
            $moduleid = $_POST["module"];

            $sql =
                "
            insert into topic values
            ('$id', '$name', '$moduleid');
            ";

            if ($conn->query($sql) === TRUE) {
                echo "$name added";
            } else {
                echo "Failed";
            }
        }
    }

    $conn->close();
    ?>
</body>

</html>