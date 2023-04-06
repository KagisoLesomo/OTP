<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = new mysqli('localhost', 'root', '', 'checkers');

function db_insert($table_name, $data)
{
    global $conn;
    $sql = "INSERT INTO $table_name ";

    $column_names = '(';
    $column_values = '(';

    echo "<pre>";

    $is_first = true;
    foreach ($data as $key => $value) {
        if ($is_first) {
            $is_first = false;
        } else {
            $column_names .= ',';
            $column_values .= ',';
        }
        $column_names .= $key;

        $gettype = gettype($value);
        if ($gettype == 'string') {
            $v = $conn->real_escape_string($value);
            $column_values .= "'$v'";
        } else {
            $column_values .= $value;
        }
    }
    $column_names .= ')';
    $column_values .= ')';

    $sql .= $column_names . " VALUES " . $column_values;

    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function login_user($username, $password)
{

    global $conn;

    $sql = "SELECT * FROM player WHERE username = '{$username}'";
    $res = $conn->query($sql);

    if ($res->num_rows < 1) {
        return false;
    }

    $row = $res->fetch_assoc();

    if (!password_verify($password, $row['password'])) {
        return false;
    }

    $_SESSION['player'] = $row;

    return true;
}