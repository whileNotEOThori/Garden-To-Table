<?php
require_once("buyerfunctions.php");
session_start();

isBuyerSignedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden To Table</title>
    <?php require_once('stylingdependecies.php') ?>
</head>

<body>
    <!-- Header -->
    <?php require_once('buyerheader.php') ?>

    <!-- Cart modal -->
    <?php require_once('cartmodal.php') ?>

    <main>
        <section id="filterSort">
            <form action="filterSort.php" method="POST">
                <div class="row mt-3">
                    <div class="col col-4">
                        <!-- Filter Selection -->
                        <select class="form-select mb-3" id="filter" name="filter" aria-label="Filter Select " required>
                            <option>Filter</option>
                            <?php
                            if (isset($_SESSION['filterState']))
                                getFilterCategories();
                            else
                                getCategories();
                            ?>
                        </select>
                    </div>

                    <div class="col col-4">
                        <!-- Sort Selection -->
                        <select class="form-select mb-3" id="sort" name="sort" aria-label="Sort Select" required>
                            <?php getSortCriteria() ?>
                        </select>
                    </div>

                    <div class="col col-4">
                        <!-- filterSort Button -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" name="apply" value="apply" class="btn btn-success">Apply</button>
                            <button type="submit" name="reset" value="reset" class="btn btn-success">Reset</button>
                        </div>
                    </div>
            </form>
        </section>

        <section>
            <?php
            if (!isset($_SESSION['filterState']) && !isset($_SESSION['sortState'])) displayProductCards();
            else if ($_SESSION['filterState'] == "none" && $_SESSION['sortState'] == "none") displayProductCards();
            else if ($_SESSION['filterState'] != "none" && $_SESSION['sortState'] == "none") displayProductCardsFiltered();
            else if ($_SESSION['filterState'] == "none" && $_SESSION['sortState'] != "none") displayProductCardsSorted();
            else if ($_SESSION['filterState'] != "none" && $_SESSION['sortState'] != "none") displayProductCardsFilteredAndSorted();
            ?>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once('buyerfooter.php') ?>

    <!-- Sign out modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>