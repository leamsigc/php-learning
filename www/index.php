<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$errors = [];
$missing = [];


if (isset($_POST['submit'])) {
    $requiredFields = ['name', 'email', 'msg'];
    $expectedValues = ['name', 'email', 'msg'];
    // Essential part of the script 
    require './includes/ProcessMail.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php for submit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" integrity="sha512-EZLkOqwILORob+p0BXZc+Vm3RgJBOe1Iq/0fiI7r/wJgzOFZMlsqTa29UEl6v6U6gsV4uIpsNZoV32YZqrCRCQ==" crossorigin="anonymous" />
    <style>
        .warning {
            color: #FFC107;
        }

        .danger {
            color: tomato;
        }
    </style>
</head>

<body>
    <section class="container">
        <h1>Contact us</h1>
        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
            <?php if ($errors || $missing) : ?>
                <div class="row">
                    <p class="warning">Please fiy the fallowing information</p>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="six columns">
                    <label for="name">Name:</label>
                    <input class="u-full-width" type="text" placeholder="name..." id="name" name="name" <?php
                                                                                                        if ($missing || $errors) {
                                                                                                            echo 'value="' . htmlentities($name) . '"';
                                                                                                        }
                                                                                                        ?>>
                    <?php if ($missing &&  in_array('name', $missing)) : ?>
                        <p class="danger">Please enter the name is missing</p>
                    <?php endif; ?>
                </div>
                <div class="six columns">
                    <label for="email">Your email</label>
                    <input class="u-full-width" type="email" placeholder="test@mailbox.com" id="email" name="email" <?php
                                                                                                                    if ($missing || $errors) {
                                                                                                                        echo 'value="' . htmlentities($email) . '"';
                                                                                                                    }
                                                                                                                    ?>>
                    <?php if ($missing &&  in_array('email', $missing)) : ?>
                        <p class="danger">Please enter the email is missing</p>
                    <?php endif; ?>
                </div>
            </div>
            <label for="msg">Message</label>
            <textarea class="u-full-width" placeholder="Hi Dave …" id="msg" name="msg"><?php
                                                                                        if ($missing || $errors) {
                                                                                            echo  htmlentities($msg);
                                                                                        }
                                                                                        ?></textarea>
            <?php if ($missing &&  in_array('msg', $missing)) : ?>
                <p class="danger">Please enter the message is missing</p>
            <?php endif; ?>
            <input class="button-primary" type="submit" value="Send comments" name="submit">
        </form>
        <pre>
            <?php
            if ($_GET) {
                echo 'Content of the $_GET array ; <br/>';
                print_r($_GET);
            } elseif ($_POST) {
                echo 'Content of the $_POST array ; <br/>';
                print_r($_POST);
            }

            print_r($missing);
            ?>
        </pre>
    </section>
</body>

</html>