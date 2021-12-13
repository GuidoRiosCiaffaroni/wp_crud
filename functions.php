<?php
function start_my_session()
{
  if( !session_id() ) {
    session_start();
  }
}

add_action('init', 'start_my_session');
?>