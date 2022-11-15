<?= $this->include('inc/header') ?>
<?php
$package_id = "";
foreach ($users as $row) {
    $package_id = $row->id;
}

echo $package_id;

$this->include('inc/footer') ?>