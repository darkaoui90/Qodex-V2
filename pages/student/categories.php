<?php 

require_once '../../config/database.php';
require_once '../../classes/Database.php';
require_once '../../classes/Security.php';
require_once '../../classes/Category.php';




$currentPage = 'dashboard';
$pageTitle = 'Dashboard';


$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

$connection = Database::getInstance();

$sql = $connection->query("SELECT c.* , q.*  ,count(qu.id) AS num_questions 
                        FROM categories c 
                        JOIN quiz q ON c.id = q.categorie_id 
                        JOIN questions qu ON q.id = qu.quiz_id 
                        GROUP BY q.id");

$categories = $sql->fetchAll();

$category = new Category();
$regroup = $category->regroup($categories);
// print_r($regroup);





// print_r($categories);

?>
<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>


<div class="pt-16">
    <div class="bg-gradient-to-r from-green-600 to-teal-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold mb-2">Categories</h1>
            <p class="text-green-100">Liste simple des categories et leurs quizzes.</p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <?php  foreach ($regroup as $categoryName => $category) { ?>
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900"><?= $categoryName ?></h3>
                        <p class="text-sm text-gray-500"><?= $category['description'] ?></p>
                    </div>
                    <span class="text-sm text-green-700 font-semibold"><?= count($category['quizzes']) ?></span>
                </div>
                <?php foreach ($category['quizzes'] as $quiz) { ?>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <li class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <span><?= $quiz['quiz_name'] ?></span>
                        <span class="text-gray-500"><?= $quiz['num_questions'] ?> questions · 12 min</span>
                    </li>
                </ul>
            </div>
            <?php } ?>
            <?php } ?>

            <!-- <div class="bg-white rounded-xl shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">JavaScript</h3>
                        <p class="text-sm text-gray-500">Frontend</p>
                    </div>
                    <span class="text-sm text-green-700 font-semibold">8 quizzes</span>
                </div>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <li class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <span>JS Fondamentaux</span>
                        <span class="text-gray-500">10 questions · 12 min</span>
                    </li>
                    <li class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <span>DOM & Events</span>
                        <span class="text-gray-500">12 questions · 15 min</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <span>ES6 & Async</span>
                        <span class="text-gray-500">9 questions · 11 min</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">PHP / MySQL</h3>
                        <p class="text-sm text-gray-500">Backend</p>
                    </div>
                    <span class="text-sm text-green-700 font-semibold">10 quizzes</span>
                </div>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <li class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <span>PHP OOP</span>
                        <span class="text-gray-500">8 questions · 10 min</span>
                    </li>
                    <li class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <span>PDO & Requetes</span>
                        <span class="text-gray-500">12 questions · 16 min</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <span>API & Securite</span>
                        <span class="text-gray-500">9 questions · 12 min</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> -->

<?php include '../partials/footer.php'; ?>


