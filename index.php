<?php
/**
 * Point d'entrée de l'application
 * Redirige vers le bon dashboard selon le rôle
 */

require_once 'config/database.php';


if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_role'] === 'enseignant') {
        header('Location: pages/teacher/dashboard.php');
    } else {
        header('Location: pages/student/dashboard.php');
    }
    exit();
}


header('Location: pages/auth/login.php');
exit();