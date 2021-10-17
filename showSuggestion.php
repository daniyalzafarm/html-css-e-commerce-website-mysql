<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>mystore.pk</title>


    <?php include_once "./links.php" ?>
</head>

<body>
    <?php include_once "admin_header.php" ?>

    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col my-4">
                    <h3 class="text-center secondary-color">SUGGESTIONS</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="suggestion">
        <div class="container">
            <div class="row">
                <div class="col my-5">
                    <?php

                    include 'config.php';
                    $sql = "SELECT * FROM suggestion";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<p class='suggestionname'>" . $row['fname'] . " " . $row['lname'] . "</p>";
                            echo "<p class='suggestiontext'>" . $row['suggestion'] . "</p>";
                        }
                    }

                    ?>


                </div>

            </div>
        </div>
    </section>

    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./admin_footer.php" ?>
</body>

</html>