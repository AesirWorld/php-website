<?php
/*-------------------------------------
// Created by: Harrison aka CalciumKid
---------------------------------------
// Released Exclusively for the RAthena
// development boards. Please do not
// redistribute my work without
// permission and leave all credits in
// tact.
---------------------------------------
// !!!THIS WORK IS COPYRIGHTED!!!
// Contact: calciumkid@live.com.au
-------------------------------------*/
if (!defined('FLUX_ROOT')) exit;

//Configure variable as part of news table
$news = Flux::config('FluxTables.NewsTable');

//News id
$id = $params->get('id');

//If a news id was sent
if($id) {
    $sql = "SELECT title, body, link, author, created, modified FROM {$server->loginDatabase}.$news WHERE id = ? LIMIT 1";

    $sth = $server->connection->getStatement($sql);
    $sth->execute(array($id));
}
//Else fetch all
else {
    //SQL. Straight forward.
    $sql = "SELECT title, body, link, author, created, modified FROM {$server->loginDatabase}.$news ORDER BY id DESC ";
    //Limit to the amount of news articles defined in the config.
    $sql .= "LIMIT ".(int)Flux::config('LimitNews');

    $sth = $server->connection->getStatement($sql);
    $sth->execute();

}

$news = $sth->fetchAll();
?>
