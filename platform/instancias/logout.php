<?php
require_once '../clases/trivial.class.php';
session_destroy();
header("Location: ../index.php");
