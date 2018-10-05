<?php

$sql = "SELECT * FROM users";

if ($_GET['sort'] == 'name')
{
    $sql .= " ORDER BY name";
}
elseif ($_GET['sort'] == 'desc')
{
    $sql .= " ORDER BY Description";
}
elseif ($_GET['sort'] == 'recorded')
{
    $sql .= " ORDER BY DateRecorded";
}
elseif($_GET['sort'] == 'added')
{
    $sql .= " ORDER BY DateAdded";
}

$>