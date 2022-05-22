<?php

  function get_data_correct($table, $fields, $parameters=null, $condition=null, $limit=null, $order=null) {
    global $db_connect;

    $query = "SELECT $fields
              FROM $table
              $condition
              $limit
              $order";

    $query = $db_connect->prepare($query);

    if($parameters != null) {
      $parameters = explode(',', $parameters);

      foreach($parameters as $parameter) {
        $temp = explode('=', $parameter);
        $query->bindParam(':'.$temp[0], $temp[1]);
      }
    }

    $query->execute();

    return $query->fetchAll();
  }

  function get_data_wrong($table, $fields, $parameters=null, $condition=null, $limit=null, $order=null) {
    global $db_connect;

    $query = "SELECT $fields
              FROM $table
              $condition
              $limit
              $order";

    return $db_connect->query($query)->fetchAll();
  }

  function redirect($url)
  {
    if(headers_sent()) {
      echo "<script>document.location.href='".$url."'</script>";
    } else {
      header("location: ".$url);
    }
  }
