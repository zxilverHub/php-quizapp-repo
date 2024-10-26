<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="POST">
        <label>Select a column: </label><br>
        <select name="todo">
            <option value="course">Course</option>
            <option value="module">Module</option>
            <option value="topic">Topic</option>
            <option value="question">Question</option>
        </select>
        <input type="submit" value="Go" name="go">
        <input type="submit" value="View data" name="view">
    </form>


    <?php
    include("./system/config.php");

    if (isset($_POST["go"])) {
        $colname = $_POST["todo"];
        header("Location: http://localhost/quizapp/screens/$colname.php");
        exit();
    }

    ?>

</body>

</html>