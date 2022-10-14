<?php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$linkAPI = "https://blockchain.info/ticker";
$response = file_get_contents($linkAPI, false, stream_context_create($arrContextOptions));

// Mendecode prov.json
$data = json_decode($response, true);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Harga Bitcoin hari ini</title>
</head>
<body>
<H1>Harga Bitcoin hari ini</H1>
<table border="1" style="width: 100%">
    <thead>
        <tr>
            <th>mata uang</th>
            <th>harga beli bitcoin</th>
            <th>harga jual bitcoin</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row["symbol"] ?></td>
                <td><?= $row["buy"] ?></td>
                <td><?= $row["sell"] ?></td>
                
            </tr>
        <?php endforeach ?>

    </tbody>
</table>
</body>
</html>