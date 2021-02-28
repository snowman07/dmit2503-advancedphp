<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Five: Chosen Multi Select</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="chosen.min.css">
    <script src="chosen.jquery.min.js"></script>
</head>

<body>
    <form action="" method="post">
        <select multiple name="skills[]" class="skills">
            <option>PHP</option>
            <option>jQuery</option>
            <option>AJAX</option>
            <option>JavaScript</option>
            <option>AngularJS</option>
            <option>Python</option>
        </select>
        <input type="submit" name="submit" vlaue="SUBMIT">
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.skills').chosen({
                width: '200px'
            });
        });
    </script>
    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['skills'])) {
            foreach ($_POST['skills'] as $selected) {
                echo '  ' . $selected;
            }
        } else {
            echo 'Please select the value.';
        }
    }
    ?>
</body>

</html>