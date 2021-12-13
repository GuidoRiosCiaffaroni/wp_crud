<?php

  $query = 'SELECT * FROM '.$tabla_crud.' WHERE id = '.$id;
  $registros = $wpdb->get_results($query);

  // nombre de los campos de la tabla
  foreach ($registros as $registros) 
  {
    $id = $registros->id;
    $user_id = $registros->user_id; 
    $key_id = $registros->key_id; 
    $nint = $registros->nint;
    $date = $registros->date;
    $dir_file_linux = $registros->dir_file_linux;
    $dir_file_win = $registros->dir_file_win;
    $dir_file = $registros->dir_file;
    $status_id = $registros->status_id;
    $create_at = $registros->create_at;  
  }


    $wpdb->insert(
      $tabla_crud,
        array(
          'user_id'         => $user_id,
          'key_id'          => $key_id,
          'nint'            => $nint,
          'date'            => $date,
          'dir_file_linux'  => $dir_file_linux,
          'dir_file_win'    => $dir_file_win,
          'dir_file'        => $dir_file,
          'status_id'       => 0,
        )
    );

    $wpdb->update( $tabla_crud, 
      // Datos que se remplazarán
      array( 
        'status_id' => '0'
      ),
      // Cuando el ID del campo es igual al número $key_id
      array( 'key_id' => $key_id )
    );

    $query = "SELECT MAX(id) AS id FROM ".$tabla_crud." where wp_crud.key_id='".$key_id."'";
    $registros = $wpdb->get_results($query);
    foreach ($registros as $registros) {
    echo '=======================> '. $query . '</br>';
    echo '=======================> '. $registros->id . '</br>';
    }

  function update_edit()
  {



  }
?>