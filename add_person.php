<?php
  include 'DB/function.php';
  $actions = new Functions();
  $data = json_decode(file_get_contents('php://input'), true) ?? $_POST ;
//  print_r($_SERVER);
//  die();

  $return_array = [];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SERVER['HTTP_TOKEN'])) {
      if ($_SERVER['HTTP_TOKEN']!= 1234) {
        $return_array['type'] = 'error';
        $return_array['message'] = 'token is not match';
      } else {
        if ($data != null) {
          if ($actions->add_person($data['name'], $data['age'], $data['birthday'])) {
            $return_array['type'] = 'success';
            $return_array['data'] = $data;
            $return_array['count'] = count($data);
            $return_array['token'] = $_SERVER['HTTP_TOKEN'];
          } else {
            $return_array['type'] = 'error';
            $return_array['message'] = 'insert error';
          };
        } else {
          $return_array['type'] = 'error';
          $return_array['message'] = 'data is null';
        };
      }
    } else {
      $return_array['type'] = 'error';
      $return_array['message'] = 'token is not found';
    };
  echo json_encode($return_array);
  } else {
    echo 'Request method error';
  };


