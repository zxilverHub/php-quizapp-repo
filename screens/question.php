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
    <form action="question.php" method="POST">
        <input type="submit" name="back" value="Back to home"><br><br>
        <label>Add to: </label><br>
        <select name="course">
            <?php
            $sql =
                "
                SELECT
                    course.course_name,
                    course.course_id,
                    module.module_name,
                    module.module_id,
                    topic.topic_id,
                    topic.topic_name
                FROM
                    course
                JOIN module JOIN topic ON 
                course.course_id = module.course_id AND 
                module.module_id = topic.module_id;
            ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["course_id"] . " " . $row["module_id"] . " " . $row["topic_id"] . "'>" .
                        $row["course_name"] . ", " . $row["module_name"] . ", " . $row["topic_name"] . "</option>";
                }
            }

            ?>
        </select>
        <br>
        <br>
        <label>Add question: </label><br>
        <textarea type="text" placeholder="Question" name="question" cols="50" rows="5"></textarea><br>
        <input type="text" placeholder="Answer" name="answer">
        <input type="submit" name="add-question" value="Add question">
    </form>

    <?php


    if (isset($_POST["back"])) {
        header("Location: http://localhost/quizapp/index.php");
    }

    if (isset($_POST["add-question"])) {
        if (!(empty($_POST["answer"]) || empty($_POST["question"]))) {
            $question = $_POST["question"];
            $answer = $_POST["answer"];
            $course = $_POST["course"];
            $data = explode(" ", $course);

            $topic_id = $data[2];

            $sql =
                "
            insert into question values
            (NULL, '$question', '$answer', '$topic_id');
            ";

            if ($conn->query($sql) === TRUE) {
                echo "$answer added";
            } else {
                echo "Failed to add";
            }
        }
    }

    $conn->close();
    ?>
</body>

</html>