<?php
require __DIR__ . '/../../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

use Core\Database;
use Core\App;

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

$html2pdf = new Html2Pdf('P', 'LEGAL', 'en', false, 'UTF-8', array(10, 10, 10, 10));

$date = date('m/d/Y h:i:s a', time());

$html = '
<page backtop="30mm" backbottom="30mm"> 
    <page_header> 
       <img src="../public/export-headers/sdo_header.png" style="width:75%;height:10%;" />             
    </page_header>
<h1>Schools Data</h1>
<h4>Generated on: ' . $date . '</h4>'; 

$html .= '
<table class="table table-striped" style="width: 100%; word-wrap: break-word; overflow-wrap: break-word;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Division</th>
            <th>District</th>
            <th>Contact Name</th>
            <th>Contact Number</th>
            <th>Contact Email</th>
            <th>Date Added</th>
        </tr>
    </thead>
    <tbody>';
    
// Loop through the $schools array and add rows to the table
foreach ($schools as $school) {
    $html .= '
        <tr>
            <td>' . htmlspecialchars($school['school_id']) . '</td>
            <td>' . htmlspecialchars($school['school_name']) . '</td>
            <td style="text-transform: capitalize;">' . htmlspecialchars($school['type']) . '</td>
            <td>' . htmlspecialchars($school['division']) . '</td>
            <td>' . htmlspecialchars($school['district']) . '</td>
            <td>' . htmlspecialchars($school['contact_name']) . '</td>
            <td>' . htmlspecialchars($school['contact_no']) . '</td>
            <td>' . htmlspecialchars($school['contact_email']) . '</td>
            <td>' . htmlspecialchars(formatTimestamp($school['date_added'])) . '</td>
        </tr>';
}

$html .= '
    </tbody>
</table>
</page>';

// Create a dynamic filename
$filename = 'sdo_valenzuela_school_data_' . date('Y-m-d') . '.pdf';

// Set the filename and output the PDF
$html2pdf->writeHTML($html);
$html2pdf->output($filename); 
?>
