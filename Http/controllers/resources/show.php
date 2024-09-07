<?php

use Core\Database;
use Core\App;
use Core\Session;

$db = App::resolve(Database::class);

$resources = [];

$pagination = [
    'pages_limit' => 10,
    'pages_current' => isset($_GET['page']) ? (int)$_GET['page'] : 1,
    'pages_total' => 0,
    'start' => 0,
];

$resources_count = $db->query('
SELECT 
    COUNT(*) as total 
FROM 
    school_inventory
WHERE
	item_code LIKE :search_code OR
    item_article LIKE :search_article OR
    item_desc LIKE :search_desc
', [
    'search_code' => '%' . strtolower(trim($_POST['search'] ?? '')) . '%',
    'search_article' => '%' . strtolower(trim($_POST['search'] ?? '')) . '%',
    'search_desc' => '%' . strtolower(trim($_POST['search'] ?? '')) . '%',
])->get();

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
WHERE
	item_code LIKE :search_code OR
    item_article LIKE :search_article OR
    item_desc LIKE :search_desc
LIMIT :start,:end
', [
    'search_code' => '%' . strtolower(trim($_POST['search'] ?? '')) . '%',
    'search_article' => '%' . strtolower(trim($_POST['search'] ?? '')) . '%',
    'search_desc' => '%' . strtolower(trim($_POST['search'] ?? '')) . '%',
    'start' => (int)$pagination['start'],
    'end' => (int)$pagination['pages_limit'],
])->get();

$statusMap = [
    1 => 'Working',
    2 => 'Need Repair',
    3 => 'Condemned'
];

view('resources/index.view.php', [
    'statusMap' => $statusMap,
    'heading' => 'Resources',
    'resources' => $resources,
    'errors' => Session::get('errors') ?? [],
    'old' => Session::get('old') ?? [],
    'pagination' => $pagination,
    'search' => $_POST['search']
]);
