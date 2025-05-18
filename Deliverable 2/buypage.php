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

    <main>
        <!--//////////////////////////////////////////////////////////////////////////  Testing //////////////////////////////////////////////////////////////////////////  -->
        <?php foreach ($_SESSION['cart'] as $productID => $quantity) {
            echo "ID: " . $productID . " = " . $quantity . "\n";
        } ?>
        <!--//////////////////////////////////////////////////////////////////////////  Testing //////////////////////////////////////////////////////////////////////////  -->

        <section id="filterSort">
            <form action="filterSort.php" method="POST">
                <div class="row mt-3">
                    <div class="col col-4">
                        <!-- Filter Selection -->
                        <select class="form-select mb-3" id="filter" name="filter" aria-label="Filter Select " required>
                            <option selected>Filter</option>
                            <?php getCategories() ?>
                        </select>
                    </div>

                    <div class="col col-4">
                        <!-- Sort Selection -->
                        <select class="form-select mb-3" id="sort" name="sort" aria-label="Sort Select" required>
                            <option selected>Sort</option>
                            <option value="price09">Price: Low To High</option>
                            <option value="price90">Price: High to Low</option>
                            <option value="nameAZ">Name: A-Z</option>
                            <option value="nameZA">Name: Z-A</option>
                        </select>
                    </div>

                    <div class="col col-4">
                        <!-- filterSort Button -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" name="apply" value="apply" class="btn btn-primary">Apply</button>
                            <button type="submit" name="reset" value="reset" class="btn btn-primary">Reset</button>
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