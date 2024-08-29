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
use Http\Forms\SchoolEditForm;

$db = App::resolve(Database::class);

$form = SchoolEditForm::validate($attributes = [
    '_school_id' => $_POST['id_to_update'],
    'school_id' => $_POST['school_id'],
    'school_name' => $_POST['school_name'],
    'school_type' => $_POST['school_type'],
    'school_division' => $_POST['school_division'],
    'school_district' => $_POST['school_district'],
    'contact_name' => $_POST['contact_name'],
    'contact_no' => $_POST['contact_no'],
    'contact_email' => $_POST['contact_email'],
]);

$db->query('UPDATE schools
    SET
    school_id = :new_school_id
    WHERE school_id = :current_school_id
', [
    'new_school_id' => $_POST['school_id'],
    'current_school_id' => $_POST['id_to_update']
]);

$db->query(
    'UPDATE schools 
            SET 
            school_id = :school_id,
            school_name = :school_name,
            type_id = :school_type,
            division_id = :school_division,
            district_id = :school_district
            WHERE school_id = :id_to_update',
    [
        'school_id' => $_POST['school_id'],
        'school_name' => $_POST['school_name'],
        'school_type' => $_POST['school_type'],
        'school_division' => $_POST['school_division'],
        'school_district' => $_POST['school_district'],
        'id_to_update' => $_POST['id_to_update']
    ]
);

$db->query('UPDATE school_contacts
    SET
    contact_name = :contact_name,
    contact_no = :contact_no,
    contact_email = :contact_email
    WHERE school_id = :school_id
', [
    'contact_name' => $_POST['contact_name'],
    'contact_no' => $_POST['contact_no'],
    'contact_email' => $_POST['contact_email'],
    'school_id' => $_POST['school_id']
]);

redirect('/coordinator/schools');
