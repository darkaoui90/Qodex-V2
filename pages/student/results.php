<?php 

require_once '../../config/database.php';
require_once '../../classes/Database.php';
require_once '../../classes/Security.php';
require_once '../../classes/Category.php';



$currentPage = 'dashboard';
$pageTitle = 'Dashboard';


$teacherId = $_SESSION['user_id'];
$userName = $_SESSION['user_nom'];
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
        <!-- Historique -->
        <div class="bg-white rounded-xl shadow-sm p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">Historique recent</h2>
                <span class="text-sm text-gray-500">3 derniers quizzes</span>
            </div>
            <ul class="space-y-3 text-sm">
                <li class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <div>
                        <p class="font-semibold text-gray-900">HTML & Semantique</p>
                        <p class="text-gray-500">Termine le 04/01/2026</p>
                    </div>
                    <span class="text-green-700 font-semibold">18 / 20</span>
                </li>
                <li class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <div>
                        <p class="font-semibold text-gray-900">PHP OOP</p>
                        <p class="text-gray-500">Termine le 03/01/2026</p>
                    </div>
                    <span class="text-green-700 font-semibold">16 / 20</span>
                </li>
                <li class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-gray-900">SQL & Jointures</p>
                        <p class="text-gray-500">Termine le 02/01/2026</p>
                    </div>
                    <span class="text-red-600 font-semibold">9 / 20</span>
                </li>
            </ul>
        </div>

        <!-- Resultats -->
        <div class="bg-white rounded-xl shadow-sm p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">Tous les resultats</h2>
                <span class="text-sm text-gray-500">Total: 6 quizzes</span>
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
                        <tr>
                            <td class="px-4 py-3 font-semibold text-gray-900">HTML & Semantique</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Frontend</span></td>
                            <td class="px-4 py-3 text-green-700 font-semibold">18 / 20</td>
                            <td class="px-4 py-3 text-gray-500">04/01/2026</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Reussi</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-semibold text-gray-900">PHP OOP</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Backend</span></td>
                            <td class="px-4 py-3 text-green-700 font-semibold">16 / 20</td>
                            <td class="px-4 py-3 text-gray-500">03/01/2026</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Reussi</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-semibold text-gray-900">SQL & Jointures</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">SQL</span></td>
                            <td class="px-4 py-3 text-red-600 font-semibold">9 / 20</td>
                            <td class="px-4 py-3 text-gray-500">02/01/2026</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">Echoue</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-semibold text-gray-900">JS Fondamentaux</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-700">JavaScript</span></td>
                            <td class="px-4 py-3 text-green-700 font-semibold">15 / 20</td>
                            <td class="px-4 py-3 text-gray-500">30/12/2025</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Reussi</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-semibold text-gray-900">Design Systeme</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-pink-100 text-pink-700">UX/UI</span></td>
                            <td class="px-4 py-3 text-green-700 font-semibold">17 / 20</td>
                            <td class="px-4 py-3 text-gray-500">29/12/2025</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Reussi</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-semibold text-gray-900">Algorithmes</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-indigo-100 text-indigo-700">Algo</span></td>
                            <td class="px-4 py-3 text-red-600 font-semibold">8 / 20</td>
                            <td class="px-4 py-3 text-gray-500">28/12/2025</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">Echoue</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
