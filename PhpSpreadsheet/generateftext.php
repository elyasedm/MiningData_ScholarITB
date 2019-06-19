<?php
$id = '';
$nama = '';
$affiliation = '';
$total_cites = '';
$h_index = '';
$i10_index = '';
$fields = '';
$homepage = '';
for ($i = 1; $i <= 50; $i++) {
    $id .= ' User' . $i . '[[1]]';
    if ($i != 50) {
        $id .= ",";
    };
}
for ($i = 1; $i <= 50; $i++) {
    $nama .= 'User' . $i . '[[2]]';
    if ($i != 50) {
        $nama .= ",";
    };
}
for ($i = 1; $i < 51; $i++) {
    $affiliation .=  'User' . $i . '[[3]]';
    if ($i != 50) {
        $affiliation .= ",";
    };
}
for ($i = 1; $i < 51; $i++) {
    $total_cites .= 'User' . $i . '[[4]]';
    if ($i != 50) {
        $total_cites .= ",";
    };
}
for ($i = 1; $i < 51; $i++) {
    $h_index .= 'User' . $i . '[[5]]';
    if ($i != 50) {
        $h_index .= ",";
    };
}
for ($i = 1; $i < 51; $i++) {
    $i10_index .= 'User' . $i . '[[6]]';
    if ($i != 50) {
        $i10_index .= ",";
    };
}
for ($i = 1; $i < 51; $i++) {
    $fields .= 'User' . $i . '[[7]]';
    if ($i != 50) {
        $fields .= ",";
    };
}
for ($i = 1; $i < 51; $i++) {
    $homepage .= 'User' . $i . '[[8]]';
    if ($i != 50) {
        $homepage .= ",";
    };
}
echo ' c(' . $id . ')';
echo ' c(' . $nama . ')';
echo ' c(' . $affiliation . ')';
echo ' c(' . $total_cites . ')';
echo ' c(' . $h_index . ')';
echo ' c(' . $i10_index . ')';
echo ' c(' . $fields . ')';
echo ' c(' . $homepage . ')';
