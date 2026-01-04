<?php
require_once '../../config/database.php';
require_once '../../classes/Database.php';
require_once '../../classes/Security.php';
require_once '../../classes/Question.php';
require_once '../../classes/Quiz.php';

Security::requireStudent();

$quizId = isset($_GET['quiz_id']) ? intval($_GET['quiz_id']) : 0;

$questionObj = new Question();
$questions = $questionObj->getAllByQuiz($quizId);

$quizObj = new Quiz();
$quizInfo = $quizObj->getById($quizId);

include '../partials/header.php'; 
include '../partials/nav_student.php'; 
?>

<style>
	body { padding-bottom: 120px; }
	.quiz-container { max-width: 1000px; margin: 40px auto; padding: 30px; box-sizing: border-box; }
	.quiz-card { border: 3px solid #cbd5e1; border-radius: 12px; padding: 35px; background: #fff; box-shadow: 0 8px 24px rgba(16,24,40,0.08); }
	.question-card { border: 3px solid #2b6cb0; padding: 28px; border-radius: 10px; margin-bottom: 28px; background: linear-gradient(180deg, #f0f7ff, #fff); }
	.question-card h2 { margin: 0; font-size: 1.4rem; color: #0f172a; font-weight: 600; }
	.options { display: grid; grid-template-columns: 1fr; gap: 16px; }
	.option-btn { display: flex; align-items: center; gap: 16px; padding: 18px 20px; border-radius: 10px; border: 2px solid #e6eef8; background: #f8fbff; cursor: pointer; font-size: 1.05rem; transition: all 0.2s; }
	.option-btn:hover { background: #eef6ff; border-color: #2b6cb0; }
	.option-btn input { accent-color: #2b6cb0; width: 20px; height: 20px; cursor: pointer; }
	.option-btn.selected { background: #e1f0ff; border-color: #2b6cb0; font-weight: 500; }
	.quiz-footer { position: fixed; bottom: 0; left: 0; right: 0; background: #fff; border-top: 3px solid #cbd5e1; padding: 20px; display: flex; justify-content: space-between; gap: 20px; box-shadow: 0 -2px 8px rgba(0,0,0,0.1); }
	.quiz-footer button { background: #2b6cb0; color: #fff; border: none; padding: 16px 40px; border-radius: 8px; cursor: pointer; font-size: 1.1rem; font-weight: 600; transition: background 0.3s; }
	.quiz-footer button:hover { background: #1e4f7f; }
	@media(min-width:768px) { .options { grid-template-columns: repeat(2, 1fr); } }
</style>

<form id="quizForm" method="POST" action="../../actions/submit_quiz.php">
<input type="hidden" name="quiz_id" value="<?= $quizId ?>">
<div class="quiz-container">
	<?php foreach ($questions as $index => $q): ?>
	<div class="quiz-card" data-question="<?= $index ?>" style="<?= $index > 0 ? 'display:none;' : '' ?>">
		<div class="question-card">
			<h2>Question <?= $index + 1 ?> / <?= count($questions) ?>: <?= htmlspecialchars($q['question']) ?></h2>
		</div>

		<div class="options">
			<label class="option-btn">
				<input type="radio" name="answer_<?= $index ?>" value="1">
				<span><?= htmlspecialchars($q['option1']) ?></span>
			</label>
			<label class="option-btn">
				<input type="radio" name="answer_<?= $index ?>" value="2">
				<span><?= htmlspecialchars($q['option2']) ?></span>
			</label>
			<label class="option-btn">
				<input type="radio" name="answer_<?= $index ?>" value="3">
				<span><?= htmlspecialchars($q['option3']) ?></span>
			</label>
			<label class="option-btn">
				<input type="radio" name="answer_<?= $index ?>" value="4">
				<span><?= htmlspecialchars($q['option4']) ?></span>
			</label>
		</div>
	</div>
	<?php endforeach; ?>
</div>
</form>

<div class="quiz-footer">
	<button id="btn-back">← Back</button>
	<button id="btn-next">Next →</button>
</div>

<script>
	let currentQuestion = 0;
	const totalQuestions = <?= count($questions) ?>;

	document.querySelectorAll('.option-btn').forEach(btn => {
		btn.addEventListener('click', () => {
			const card = btn.closest('.quiz-card');
			card.querySelectorAll('.option-btn').forEach(b => b.classList.remove('selected'));
			btn.classList.add('selected');
			btn.querySelector('input').checked = true;
		});
	});

	function showQuestion(index) {
		document.querySelectorAll('.quiz-card').forEach((card, i) => {
			card.style.display = i === index ? 'block' : 'none';
		});
		document.getElementById('btn-back').style.display = index === 0 ? 'none' : 'block';
		document.getElementById('btn-next').textContent = index === totalQuestions - 1 ? 'Submit' : 'Next →';
	}

	document.getElementById('btn-back').addEventListener('click', () => {
		if (currentQuestion > 0) {
			currentQuestion--;
			showQuestion(currentQuestion);
		}
	});

	document.getElementById('btn-next').addEventListener('click', () => {
		if (currentQuestion < totalQuestions - 1) {
			currentQuestion++;
			showQuestion(currentQuestion);
		} else {
			document.getElementById('quizForm').submit();
		}
	});

	showQuestion(0);
</script>

<?php include '../partials/footer.php'; ?>