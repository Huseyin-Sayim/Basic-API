<?php
  include "DB/function.php";
  $actions = new Functions();
  $persons = $actions->index();



  if (isset($_GET['token']) && $_GET['token'] == 'huseyin123') {
    $return_array = [];
    $return_array['type'] = 'success';
    $return_array['data'] = $actions->index();
    $return_array['count'] = count($actions->index());

    echo json_encode($return_array);
  } else {
    echo 'yanlış token';
  };
