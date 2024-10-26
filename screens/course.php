<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="course.php" method="POST">
        <input type="submit" value="Back to home" name="back"><br><br>
        <label>Add course:</label><br>
        <input type="text" placeholder="Course id" name="courseid">
        <input type="text" placeholder="Course name" name="coursename">
        <input type="submit" name="add-course" value="Add course">
    </form>

    <?php
    include("../system/config.php");

    if (isset($_POST["add-course"])) {
        if (!empty($_POST["coursename"]) && !empty($_POST["courseid"])) {
            $coursename = $_POST["coursename"];
            $courseid = $_POST["courseid"];

            $sql = "insert into course (course_id, course_name) values
                ('$courseid', '$coursename');
            ";

            if ($conn->query($sql) == TRUE) {
                echo $coursename . " added";
            } else {
                echo "Failed to add";
            }
        }
    }


    if (isset($_POST["back"])) {
        header("Location: http://localhost/quizapp/index.php");
    }

    $conn->close();
    ?>
</body>

</html>