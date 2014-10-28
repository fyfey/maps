<?php

require_once 'config.php';

$lat = '52.073268999999996';
$lon = '1.280565';

// Map params
$type   = 'roadmap'; // roadmap, satellite, hybrid, terrain
$size   = '1024x768';
$zoom   = 13;
$scale  = 1;
$format = 'PNG'; // GIF, JPEG, PNG

// Feature params
$markers = [$lat.','.$lon];
$paths   = [];
$visible = [];

$url = sprintf(
    'https://maps.googleapis.com/maps/api/staticmap?center=%s,%s&zoom=%d&size=%s&maptype=%s&scale=%d&format=%s%s',
    $lat,
    $lon,
    $zoom,
    $size,
    $type,
    $scale,
    $format,
    '&markers='.implode($markers, '|')
);

$image = file_get_contents($url.'&key='.$key);

file_put_contents('map.'.strtolower($format), $image);
