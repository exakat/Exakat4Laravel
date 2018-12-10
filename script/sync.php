<?php

$project = $argv[1];

print "creating $project\n";

if (file_exists("../$project")) {
    die("$project already exists. Aborting\n");
}

shell_exec("cd ..; cp -r Skeleton $project");
unlink("../$project/script/create.php");

// process INI
$ini = file_get_contents("../$project/config.ini");
$ini = preg_replace("/Skeleton/", $project, $ini);
$ini = preg_replace("/last_build = \d+-\d+-\d+/", "last_build = ".date('Y-m-d'), $ini);
file_put_contents("../$project/config.ini", $ini);

print "New extension $project ready\n";

?>