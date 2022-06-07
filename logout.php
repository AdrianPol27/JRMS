<?php

  session_abort();
  session_destroy();
  header("location: .././gso/index.html");

?>