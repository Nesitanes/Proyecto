<?php

$nombreDoctor = "Dr. Eduardo Alemán";
$nombreRecepcion = "Andrea Suria";

$pacientes = [
    1 => ["nombre" => "María García", "dui" => "02345673-1", "edad" => 18],
    2 => ["nombre" => "Grace Romero", "dui" => "023456923-1", "edad" => 25],
    3 => ["nombre" => "Eduardo Orellana", "dui" => "023456123-1", "edad" => 40],
    4 => ["nombre" => "Guillermo Menjívar", "dui" => "023456913-1", "edad" => 50],
    5 => ["nombre" => "Lionel Messi", "dui" => "023456913-1", "edad" => 30],
    6 => ["nombre" => "Ana Molina", "dui" => "023456193-1", "edad" => 35],
    7 => ["nombre" => "Christian Maradona", "dui" => "023456123-1", "edad" => 45],
];

$expedientes = [
    1 => [
        ["fecha"=>"11/2/2026","diagnostico"=>"Resfriado","medicado"=>"Con medicamento"],
        ["fecha"=>"10/9/2026","diagnostico"=>"Caries","medicado"=>"Sin medicamento"],
        ["fecha"=>"10/9/2026","diagnostico"=>"Asma","medicado"=>"Con medicamento"],
        ["fecha"=>"10/9/2026","diagnostico"=>"Resfriado","medicado"=>"Con medicamento"],
        ["fecha"=>"2/1/2026","diagnostico"=>"Rotura","medicado"=>"Sin medicamento"],
    ],
    2 => [
        ["fecha"=>"09/12/2026","diagnostico"=>"Control general","medicado"=>"Sin medicamento"],
        ["fecha"=>"08/22/2026","diagnostico"=>"Dolor muscular","medicado"=>"Con medicamento"],
    ],
    3 => [
        ["fecha"=>"08/15/2026","diagnostico"=>"Control general","medicado"=>"Sin medicamento"],
    ],
    4 => [
        ["fecha"=>"07/20/2026","diagnostico"=>"Dolor lumbar","medicado"=>"Con medicamento"],
    ],
    5 => [],
    6 => [],
    7 => [],
];
?>