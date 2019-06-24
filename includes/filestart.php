<!DOCTYPE>
<html>
<?php include("includes/head.html"); ?>

<body class="has-background-grey-darker has-text-white">
    <div id="wrapper">
        <?php include("includes/nav.php"); ?>
        <div id="content">


            <div class="block">
                <div class="columns">
                    <div class="column"></div>
                    <div class="column is-half">
                        <?php
                        // fehlermeldung oder nachricht ausgeben
                        if (!empty($message)) {
                            echo "<div class=\"notification is-info\">" . $message . "<button class=\"delete\"></button></div>";
                        } else if (!empty($error)) {
                            echo "<div class=\"notification is-danger\">" . $error . "<button class=\"delete\"></button></div>";
                        }
                        ?>
