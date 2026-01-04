
<div class="pt-16">
  
    <div class="bg-gradient-to-r from-green-600 to-teal-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <h1 class="text-4xl font-bold mb-3">Quizzes disponibles</h1>
            <p class="text-lg text-green-100">Choisissez un quiz actif et demarrez votre session.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        

        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

<?php foreach ($regroup as $categoryName => $category): ?>
    <?php foreach ($category['quizzes'] as $quiz): ?>

      

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">

                
                <div class="flex items-center justify-between mb-4">
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                        <?= htmlspecialchars($categoryName) ?>
                    </span>
                    <span class="text-green-600 text-xs font-bold">
                        <i class="fas fa-circle text-[10px] mr-1"></i>Actif
                    </span>
                </div>

               
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    <?= htmlspecialchars($quiz['quiz_name']) ?>
                </h3>

               
                <p class="text-gray-600 text-sm mb-4">
                    <?= htmlspecialchars($category['description']?? '') ?>
                </p>

                
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <span><i class="fas fa-question-circle mr-1"></i><?= $quiz['num_questions'] ?? 0 ?></span>
                    <span><i class="fas fa-clock mr-1"></i><?= $quiz['duration'] ?? 15 ?> min</span>
                </div>

                
                 
                 <a href="../student/pass_quiz.php?quiz_id=<?= $quiz['quiz_id'] ?>">
                <button class="block w-full text-center bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
<i class="fas fa-play mr-2"></i>Demarrer
</button>
                 </a>

            </div>
        </div>

    <?php endforeach; ?>
<?php endforeach; ?>

</div>


            <!-- <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full">JavaScript</span>
                        <span class="text-green-600 text-xs font-semibold"><i class="fas fa-circle text-[10px] mr-1"></i>Actif</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">JS Fondamentaux</h3>
                    <p class="text-gray-600 text-sm mb-4">Variables, fonctions et logique de base.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span><i class="fas fa-question-circle mr-1"></i>10 questions</span>
                        <span><i class="fas fa-clock mr-1"></i>12 min</span>
                    </div>
                    <button class="block w-full text-center bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        <i class="fas fa-play mr-2"></i>Demarrer
                    </button>
                </div>
            </div> -->

            <!-- <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Backend</span>
                        <span class="text-green-600 text-xs font-semibold"><i class="fas fa-circle text-[10px] mr-1"></i>Actif</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">PHP OOP</h3>
                    <p class="text-gray-600 text-sm mb-4">Classes, objets et bonnes pratiques.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span><i class="fas fa-question-circle mr-1"></i>8 questions</span>
                        <span><i class="fas fa-clock mr-1"></i>10 min</span>
                    </div>
                    <button class="block w-full text-center bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        <i class="fas fa-play mr-2"></i>Demarrer
                    </button>
                </div>
            </div> -->

            <!-- <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">SQL</span>
                        <span class="text-green-600 text-xs font-semibold"><i class="fas fa-circle text-[10px] mr-1"></i>Actif</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">SQL & Jointures</h3>
                    <p class="text-gray-600 text-sm mb-4">Requetes, relations et jointures.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span><i class="fas fa-question-circle mr-1"></i>14 questions</span>
                        <span><i class="fas fa-clock mr-1"></i>18 min</span>
                    </div>
                    <button class="block w-full text-center bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        <i class="fas fa-play mr-2"></i>Demarrer
                    </button>
                </div>
            </div> -->

            <!-- <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-pink-100 text-pink-700 text-xs font-semibold rounded-full">UX/UI</span>
                        <span class="text-green-600 text-xs font-semibold"><i class="fas fa-circle text-[10px] mr-1"></i>Actif</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Design Systeme</h3>
                    <p class="text-gray-600 text-sm mb-4">Couleurs, typo et composants.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span><i class="fas fa-question-circle mr-1"></i>9 questions</span>
                        <span><i class="fas fa-clock mr-1"></i>11 min</span>
                    </div>
                    <button class="block w-full text-center bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        <i class="fas fa-play mr-2"></i>Demarrer
                    </button>
                </div>
            </div> -->

            <!-- <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-semibold rounded-full">Algorithmes</span>
                        <span class="text-green-600 text-xs font-semibold"><i class="fas fa-circle text-[10px] mr-1"></i>Actif</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Logique & Tri</h3>
                    <p class="text-gray-600 text-sm mb-4">Bases de complexite et algorithmes simples.</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span><i class="fas fa-question-circle mr-1"></i>11 questions</span>
                        <span><i class="fas fa-clock mr-1"></i>14 min</span>
                    </div>
                    <button class="block w-full text-center bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        <i class="fas fa-play mr-2"></i>Demarrer
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Info Panel -->
        <!-- <div class="mt-8 bg-white rounded-xl shadow-md p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-start gap-3">
                <div class="bg-green-100 text-green-700 p-3 rounded-lg">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Regles importantes</h3>
                    <p class="text-gray-600 text-sm">Une seule tentative par quiz, toutes les questions sont obligatoires.</p>
                </div>
            </div>
            <button class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">
                <i class="fas fa-book-open mr-2"></i>Voir les regles
            </button>
        </div>
    </div> -->
</div>

<?php include '../partials/footer.php'; ?>
