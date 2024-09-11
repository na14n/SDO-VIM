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

$id = $_POST['id'];
$item_code = $_POST['school_id'] . '-' . $id;

$db->query('UPDATE school_inventory 
            SET school_id = :school_id, 
                item_code = :new_item_code
            WHERE item_code = :id;', [
    'id' => $_POST['id'] ?? null,
    'new_item_code' => $item_code,
    'school_id' => $_POST['school_id']
]);

$school_name = $db->query('
SELECT
    school_name
FROM schools
WHERE school_id = :school_id
', [
    'school_id' => $_POST['school_id']
]);

$custodian_id = $db->query('
SELECT 
    u.user_id
FROM 
    users u
INNER JOIN 
    schools s ON u.school_id = s.school_id
WHERE 
    s.school_id = :current_school_id;
', [
    'current_school_id' => $_POST['id_to_update']
])->get();

toast('Successfully allocated item ' . $_POST['id'] . ' to ' . $school_name . '.');

redirect('/coordinator/resources/unassigned');
