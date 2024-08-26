<?php

function list_transactions() {
    global $database;

    $query = 'SELECT user_id, stock_id, quantity, price, timestamp, id FROM transaction';

    // prepare the query
    $statement = $database->prepare($query);

    // run the query
    $statement->execute();

    // fetch all transactions
    $transactions = $statement->fetchAll();

    // close the cursor
    $statement->closeCursor();

    return $transactions;
}

function insert_transaction($user_id, $stock_id, $quantity, $price) {
    global $database;

    $query = "INSERT INTO transaction (user_id, stock_id, quantity, price) "
           . "VALUES (:user_id, :stock_id, :quantity, :price)";

    // value binding in PDO protects against SQL injection
    $statement = $database->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->bindValue(":stock_id", $stock_id);
    $statement->bindValue(":quantity", $quantity);
    $statement->bindValue(":price", $price);

    $statement->execute();
    $statement->closeCursor();
}

function update_transaction($user_id, $stock_id, $quantity, $price, $id) {
    global $database;

    $query = "UPDATE transaction SET user_id = :user_id, "
            . "stock_id = :stock_id, "
            . "quantity = :quantity, "
            . "price = :price "
            . "WHERE id = :id";

    // value binding in PDO protects against SQL injection
    $statement = $database->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->bindValue(":stock_id", $stock_id);
    $statement->bindValue(":quantity", $quantity);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":id", $id);

    $statement->execute();
    $statement->closeCursor();
}

function delete_transaction($id) {
    global $database;

    $query = "DELETE FROM transaction WHERE id = :id";

    // value binding in PDO protects against SQL injection
    $statement = $database->prepare($query);
    $statement->bindValue(":id", $id);

    $statement->execute();
    $statement->closeCursor();
}