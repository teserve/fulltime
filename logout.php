<?php
//account logout
session_start();

session_unset();
session_destroy();
//direct to index page
header('location: index.html');
