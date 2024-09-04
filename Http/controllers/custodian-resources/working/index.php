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

$resources = [];

$resources = $db->query('
    SELECT 
    si.item_code,
    si.item_article,
    s.school_name,
    si.item_status AS status,
    si.date_acquired
    FROM school_inventory si
    JOIN schools s ON s.school_id = si.school_id
    WHERE si.item_status = 1
    AND si.school_id = :id;
',
[
    'id' => $_SESSION['user']['school_id'] ?? null
])->get();

view('custodian-resources/working/index.view.php', [
    'heading' => 'Working Resources',
    'resources' => $resources,
]);
