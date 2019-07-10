<?php
require '../db.inc.php';


$data = array();

$sql = "SELECT * FROM eventi  ORDER BY id_eventi";
// $statement = $conn->prepare($sql);
// $statement->execute();
// $result = $statement->fetchAll();


// foreach ($result as $row) {
//     $data[] = array(
//         'id'   => $row["id_evento"],
//         'title'   => $row["titolo_evento"],
//         'start'   => $row["inizio_evento"],
//         'end'   => $row["fine_evento"]
//     );
// }






$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'id'   => $row["id_eventi"],
        'title'   => $row["titolo_evento"],
        'start'   => $row["inizio_evento"],
        'end'   => $row["fine_evento"]
    );
}
echo json_encode($data);
