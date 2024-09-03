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
use Core\Session;

$db = App::resolve(Database::class);

$items = [];

$items = $db->query('
    SELECT 
        item_code,
        item_article,
        item_desc,
        date_acquired,
        date_updated,
        item_unit_value,
        item_total_value,
        item_quantity,
        item_funds_source,
        item_status,
        item_active,
        item_inactive
    FROM school_inventory
    WHERE school_id = :id',
    [
        'id' => $_SESSION['user']['school_id'] ?? null
    ])->get();

$schoolName = $db->query('
    SELECT s.school_name 
    FROM schools s 
    WHERE s.school_id = :id',
    [
        'id' => $_SESSION['user']['school_id'] ?? null
    ])->find();

$schoolName = $schoolName['school_name'] ?? 'Unnamed School';

$histories = [];
$histories = $db->query('
SELECT h.action, h.modified_at, h.item_code, u.user_name
FROM school_inventory_history h
INNER JOIN users u ON h.user_id = u.user_id
INNER JOIN (
    SELECT item_code, MAX(modified_at) AS latest_update
    FROM school_inventory_history
    GROUP BY item_code
) latest ON h.item_code = latest.item_code AND h.modified_at = latest.latest_update;
')->get();

$statusMap = [
    1 => 'Working',
    2 => 'Need Repair',
    3 => 'Condemned'
];

view('custodian-inventory/index.view.php', [
    'id' => $_SESSION['user']['school_id'] ?? null,
    'histories' => $histories,
    'heading' => $schoolName,
    'items' => $items,
    'statusMap' => $statusMap,
    'errors' => Session::get('errors') ?? [],
    'old' => Session::get('old') ?? [],
]);
