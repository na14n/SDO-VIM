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

$db->query('UPDATE 
    users u
    JOIN 
        user_requests r ON u.user_id = r.user_id  
    SET 
        u.user_name = :new_username,          
        r.user_status = 2                       
    WHERE 
        r.user_id = :id_to_update                
    AND 
        r.user_status = 1;',  [
    'new_username' => $_POST['new_username'],
    'id_to_update' => $_POST['id_to_update'],
]);

redirect('/coordinator/users');
