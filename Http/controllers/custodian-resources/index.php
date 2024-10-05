<?php

//  ==========================================
//           This is the Controller 
// ===========================================
// 
//  This is where you load the corresponding
//  view file for this route if available
// 
//   Use the view() function and feed the 
//   full path of the view.
// 
//   Being the controller file. This is where 
//   the data is get, manipulated, and/or
//   saved.
//      
//   You can pass variables to your view as the
//   second parameter of the view function.
//      
//   view('notes/{id}', ['notes' => $notes])
//
//   view variables are passed as keu-value
//   pairs as illustrated in the example above.
//

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$notificationCountQuery = $db->query('
    SELECT COUNT(*) AS total
    FROM notifications
    WHERE viewed IS NULL
    AND user_id = :user_id
',[
    'user_id' => get_uid()
])->find();

// Extract the total count
$notificationCount = $notificationCountQuery['total'];

if ($notificationCount > 5){
    $notificationCount = '5+';
};

$resources = [];

$pagination = [
    'pages_limit' => 10,
    'pages_current' => isset($_GET['page']) ? (int)$_GET['page'] : 1,
    'pages_total' => 0,
    'start' => 0,
];

$resources_count = $db->query('SELECT COUNT(*) as total FROM school_inventory')->get();
$pagination['pages_total'] = ceil($resources_count[0]['total'] / $pagination['pages_limit']);
$pagination['pages_current'] = max(1, min($pagination['pages_current'], $pagination['pages_total']));

$pagination['start'] = ($pagination['pages_current'] - 1) * $pagination['pages_limit'];

$resources = $db->paginate('
SELECT 
    si.item_code,
    si.item_article,
    s.school_name,
    si.item_status AS status,
    si.date_acquired
FROM 
    school_inventory si
LEFT JOIN 
    schools s ON s.school_id = si.school_id
LIMIT :start,:end
', [
    'start' => (int)$pagination['start'],
    'end' => (int)$pagination['pages_limit'],
])->get();

$resources = $db->query('
    SELECT 
       si.item_code,
       si.item_article,
       s.school_name,
       si.item_status AS status,
       si.date_acquired
       FROM school_inventory si
       JOIN schools s ON  s.school_id = si.school_id
       WHERE si.school_id = :id',
    [
        'id' => $_SESSION['user']['school_id'] ?? null
    ])->get();

    $statusMap = [
        1 => 'Working',
        2 => 'Need Repair',
        3 => 'Condemned'
    ];

view('custodian-resources/index.view.php', [
    'statusMap' => $statusMap,
    'heading' => 'Resources',
    'notificationCount' => $notificationCount,
    'resources' => $resources,
    'pagination' => $pagination
]);
