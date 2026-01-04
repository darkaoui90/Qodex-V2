<?php
require_once '../config/database.php';
require_once '../classes/Database.php';
require_once '../classes/Security.php';
require_once '../classes/Question.php';
require_once '../classes/Result.php';

Security::requireStudent();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizId = isset($_POST['quiz_id']) ? intval($_POST['quiz_id']) : 0;
    $studentId = $_SESSION['user_id'];
    
    $questionObj = new Question();
    $questions = $questionObj->getAllByQuiz($quizId);
    
    $score = 0;
    foreach ($questions as $index => $question) {
        $userAnswer = isset($_POST['answer_' . $index]) ? intval($_POST['answer_' . $index]) : 0;
        if ($userAnswer == $question['correct_option']) {
            $score++;
        }
    }
    
    $resultObj = new Result();
    $resultObj->save($quizId, $studentId, $score, count($questions));
    
    header('Location: ../pages/student/result_detail.php?quiz_id=' . $quizId . '&score=' . $score . '&total=' . count($questions));
    exit();
}
