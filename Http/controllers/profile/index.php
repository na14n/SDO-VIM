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

$userInfo =[];

$userInfo = $db->query('
    SELECT 
    users.user_name,
    users.user_id,
    schools.school_name
    FROM 
        users
    JOIN 
        schools ON users.school_id = schools.school_id
    WHERE 
        users.user_id = :id;',
    [
        'id' => $_SESSION['user']['user_id'] ?? null
    ])->get();

view('profile/index.view.php', [
    'heading' => 'User Profile',
    'userInfo' => $userInfo,
    'errors' => Session::get('errors') ?? [],
    'old' => Session::get('old') ?? [],
]);
