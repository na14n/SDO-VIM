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
WHERE
    user_id = :user_id
ORDER BY
    date_added DESC
', [
    'user_id' => get_uid(),
])->get();

view('notifications/custodian/index.view.php', [
    'heading' => 'Notifications',
    'notifications' => $notifications,
]);