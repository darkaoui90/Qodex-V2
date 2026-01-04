<?php


require_once '../../config/database.php';
require_once '../../classes/Database.php';
require_once '../../classes/Security.php';
require_once '../../classes/Category.php';




$currentPage = 'dashboard';
$pageTitle = 'Dashboard';


$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

Security::requireStudent();

$connection = Database::getInstance();

$sql = $connection->query("SELECT c.* , q.* , count(qu.id) AS num_questions 
                        FROM categories c 
                        JOIN quiz q ON c.id = q.categorie_id 
                        JOIN questions qu ON q.id = qu.quiz_id 
                        GROUP BY q.id");

$categories = $sql->fetchAll();

$category = new Category();
$regroup = $category->regroup($categories);

// print_r($categories);

?>
<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>

<?php include '../partials/quizzes.php'; ?>

