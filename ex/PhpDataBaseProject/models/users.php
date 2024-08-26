<?php


function list_stocks() {
    global $database;

    $query = 'SELECT symbol, name, current_price, id FROM stocks';
    // prepare query 
    $statement = $database->prepare($query);
    // run query
    $statement->execute();

    // fetch all rows as associative arrays
    $stocks = $statement->fetchAll(PDO::FETCH_ASSOC);

    // close cursor
    $statement->closeCursor();

    return $stocks;
}

function insert_stock($symbol, $name, $current_price) {
    global $database;

    $query = "INSERT INTO stocks (symbol, name, current_price) "
           . "VALUES (:symbol, :name, :current_price)";

    // value binding in PDO protects against SQL injection
    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $symbol);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":current_price", $current_price);

    $statement->execute();
    $statement->closeCursor();
}

function update_stock($symbol, $name, $current_price) {
    global $database;

    $query = "UPDATE stocks SET name = :name, current_price = :current_price "
           . "WHERE symbol = :symbol";

    // value binding in PDO protects against SQL injection
    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $symbol);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":current_price", $current_price);

    $statement->execute();
    $statement->closeCursor();
}

function delete_stock($symbol) {
    global $database;

    $query = "DELETE FROM stocks WHERE symbol = :symbol";

    // value binding in PDO protects against SQL injection
    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $symbol);

    $statement->execute();
    $statement->closeCursor();
}
?>