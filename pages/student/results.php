<?php 

require_once '../../config/database.php';
require_once '../../classes/Database.php';
require_once '../../classes/Security.php';
require_once '../../classes/Result.php';

Security::requireStudent();

$studentId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];

$resultObj = new Result();
$results = $resultObj->getMyResults($studentId);

$currentPage = 'results';
$pageTitle = 'Mes Resultats';
?>


<?php include '../partials/header.php'; ?>

<?php include '../partials/nav_student.php'; ?>

<div class="pt-16">
    
    <div class="bg-gradient-to-r from-green-600 to-teal-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold mb-2">Mes resultats</h1>
            <p class="text-green-100">Historique personnel et scores des quizzes passes.</p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        
        <div class="bg-white rounded-xl shadow-sm p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">Historique recent</h2>
                <span class="text-sm text-gray-500"><?= min(3, count($results)) ?> derniers quizzes</span>
            </div>
            <ul class="space-y-3 text-sm">
                <?php foreach (array_slice($results, 0, 3) as $result): 
                    $percentage = round(($result['score'] / $result['total_questions']) * 100);
                ?>
                <li class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <div>
                        <p class="font-semibold text-gray-900"><?= htmlspecialchars($result['quiz_titre']) ?></p>
                        <p class="text-gray-500">Termine le <?= date('d/m/Y', strtotime($result['created_at'])) ?></p>
                    </div>
                    <span class="<?= $percentage >= 50 ? 'text-green-700' : 'text-red-600' ?> font-semibold"><?= $result['score'] ?> / <?= $result['total_questions'] ?></span>
                </li>
                <?php endforeach; ?>
                <?php if (empty($results)): ?>
                <li class="text-center text-gray-500 py-4">Aucun quiz passé pour le moment</li>
                <?php endif; ?>
            </ul>
        </div>

       
        <div class="bg-white rounded-xl shadow-sm p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">Tous les resultats</h2>
                <span class="text-sm text-gray-500">Total: <?= count($results) ?> quizzes</span>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">Quiz</th>
                            <th class="px-4 py-3 text-left">Categorie</th>
                            <th class="px-4 py-3 text-left">Score</th>
                            <th class="px-4 py-3 text-left">Date</th>
                            <th class="px-4 py-3 text-left">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach ($results as $result): 
                            $percentage = round(($result['score'] / $result['total_questions']) * 100);
                            $passed = $percentage >= 50;
                        ?>
                        <tr>
                            <td class="px-4 py-3 font-semibold text-gray-900"><?= htmlspecialchars($result['quiz_titre']) ?></td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700"><?= htmlspecialchars($result['categorie_nom']) ?></span></td>
                            <td class="px-4 py-3 <?= $passed ? 'text-green-700' : 'text-red-600' ?> font-semibold"><?= $result['score'] ?> / <?= $result['total_questions'] ?></td>
                            <td class="px-4 py-3 text-gray-500"><?= date('d/m/Y', strtotime($result['created_at'])) ?></td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full <?= $passed ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>"><?= $passed ? 'Reussi' : 'Echoue' ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($results)): ?>
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">Aucun resultat disponible</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
