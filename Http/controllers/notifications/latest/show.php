<?php

use Core\Database;
use Core\App;
use Core\Session;

$db = App::resolve(Database::class);

$notifications = [];

$notifications = $db->query('
SELECT
    user_id,
    viewed,
    title,
    message,
    date_added
FROM
    notifications
ORDER BY
    date_added DESC
LIMIT 5
')->get();

echo json_encode([
    'status' => 'success',
    'data' => $notifications
]);
