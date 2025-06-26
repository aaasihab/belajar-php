<?php

// untuk mengecek data null
echo("TANPA NULL COALESTING\n");
$data = [];
if (isset($data['action'])) {
    $action = $data['action'];
} else {
    $action = 'Nothing';
}
echo($action."\n");

echo("\nDENGAN NULL COALESTING\n");
$data = [
    'action' => 'Create'
];
$action = $data['action'] ?? 'nothing';
echo($action);

