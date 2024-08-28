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

$schools = [];

$schools = $db->query('
    SELECT 
        s.school_id,
        s.school_name,
        s.type_id,
        t.school_type AS type,
        d.school_division AS division,
        di.school_district AS district,
        sc.contact_id,
        sc.contact_name,
        sc.contact_no,
        sc.contact_email,
        s.date_added
    FROM schools s
    JOIN types t ON s.type_id = t.id 
    JOIN divisions d ON s.division_id = d.id
    JOIN districts di ON s.district_id = di.id
    LEFT JOIN school_contacts sc ON s.school_id = sc.school_id;
')->get();

view('schools/index.view.php', [
    'heading' => 'Schools',
    'schools' => $schools,
    'errors' => Session::get('errors') ?? [],
    'old' => Session::get('old') ?? [],
]);
