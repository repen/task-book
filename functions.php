<?php


function init_db($path){
    file_put_contents($path, json_encode(array()));
}

function save_json($path, $data) {
    $current_array = load_json($path);
    $data["id_task"] = count($current_array);
    $current_array[] = $data;
    file_put_contents($path, json_encode($current_array));
}

function load_json($path) {
    $string = file_get_contents(getcwd() . "/" . $path);
    return json_decode($string, true);
}

function update_json($path, $data, $id_task) {
    $current_array = load_json($path);
    $current_array[$id_task] = $data;
    file_put_contents($path, json_encode($current_array));
}

//echo getcwd();
// init_db("temp.json");
