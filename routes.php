<?php

// =========================================================
//          This is the list of your VALID ROUTES
// =========================================================
//  List your uri routes here with their corresponding HTTP 
//  methods listed in the Router File.
// 
// 
//  You can use get, post, patch, put, and destroy methods 
//  here. However, you need to manually append a hidden 
//  input on your form to explicitly use PATCH, PUT, and
//  DESTROY methods. You can do this by adding a text input 
//  with name="_method" and value of either of the explicitly
//  set methods; value="DESTROY".
// 
//  You can use slugs by enclosing the id using brackets {}. 
//
//     get('notes/{id}', 'notes/show.php')->only('auth')
// 
//  The given example above uses a slug and also a middleware 
//  for auth class.
//
// 
//  tldr; First specify the HTTP method then provide the
//  uri path as the first parameter, then the controller
//  for the path as the second paramter. Lastly, append
//  the only function and provide the middleware class
//  to be used in the route.
// 

$router->get('/', 'index.php')->only('guest');
$router->post('/', 'session/store.php')->only('guest');
$router->delete('/', 'session/destroy.php')->only('auth');

$router->get('/coordinator', 'coordinator/create.php')->only('coordinator');

$router->get('/coordinator/resources', 'resources/index.php')->only('coordinator');
$router->get('/coordinator/resources/new', 'resources/new/index.php')->only('coordinator');
$router->get('/coordinator/resources/working', 'resources/working/index.php')->only('coordinator');
$router->get('/coordinator/resources/repair', 'resources/repair/index.php')->only('coordinator');
$router->get('/coordinator/resources/condemned', 'resources/condemned/index.php')->only('coordinator');

$router->get('/coordinator/schools', 'schools/index.php')->only('coordinator');
//Create School
$router->post('/coordinator/schools', '/schools/store.php')->only('coordinator');
//Edit School Details
$router->patch('/coordinator/schools', '/schools/patch.php')->only('coordinator');
//Delete School
$router->delete('/coordinator/schools', '/schools/destroy.php')->only('coordinator');
//Export School Data to CSV
$router->post('/coordinator/schools/exportcsv', '/schools/export_school_csv.php')->only('coordinator');

$router->get('/coordinator/users', 'users/index.php')->only('coordinator');
//Create User
$router->post('/coordinator/users', 'users/store.php')->only('coordinator');
//Edit User Details
$router->patch('/coordinator/users', 'users/patch.php')->only('coordinator');
//Delete School
$router->delete('/coordinator/users', 'users/destroy.php')->only('coordinator');
//Change User Password
$router->patch('/coordinator/users/changePassword', '/users/changePassword.php')->only('coordinator');
//Export User Data to CSV
$router->post('/coordinator/users/exportcsv', '/users/export_user_csv.php')->only('coordinator');

$router->get('/coordinator/users/pending', 'users/pending/index.php')->only('coordinator');
$router->get('/coordinator/users/approved', 'users/approved/index.php')->only('coordinator');
$router->get('/coordinator/users/denied', 'users/denied/index.php')->only('coordinator');
$router->get('/custodian', 'custodian/create.php')->only('custodian');

// Custodian Routes
$router->get('/coordinator/users/pending', 'users/pending/index.php')->only('coordinator');
$router->get('/coordinator/users/approved', 'users/approved/index.php')->only('coordinator');
$router->get('/coordinator/users/denied', 'users/denied/index.php')->only('coordinator');
$router->get('/custodian', 'custodian/create.php')->only('custodian');

// Custodian Routes
$router->get('/coordinator/users/pending', 'users/pending/index.php')->only('coordinator');
$router->get('/coordinator/users/approved', 'users/approved/index.php')->only('coordinator');
$router->get('/coordinator/users/denied', 'users/denied/index.php')->only('coordinator');
$router->get('/custodian', 'custodian/create.php')->only('custodian');

$router->get('/403', 'http_errors/403.php');
$router->get('/404', 'http_errors/404.php');
$router->get('/500', 'http_errors/500.php');
