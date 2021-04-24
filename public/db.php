<?php

require __DIR__ . '/../vendor/autoload.php';

class NotesDB extends SQLite3 {
function __construct() {
$this->open('../notes.db');
}
}

function fetchNotes($db) {
$sql = "SELECT id, name, date FROM note";
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
echo "id = ". $row['id'] . ", ";
echo "name = ". $row['name'] . ", ";
echo "date = ". $row['date'] ."<br>";
}
}

$db = new NotesDB();
echo "<h1>Before</h1>";
fetchNotes($db);

$sql = "delete from note where id = 6 or id = 3";
$db->query($sql);

echo "<h1>After</h1>";

fetchNotes($db);

$db->close();
