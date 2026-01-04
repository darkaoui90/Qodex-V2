# Qodex-V2

🎓 Quiz Platform – Student Interface (V2)

📌 Description :

This project is the Student module (V2) of a Quiz Platform built with PHP (OOP).
Students can browse categories, take active quizzes, submit answers securely, view scores, and access their personal history.

🛠️ Tech Stack : 

PHP 8+ (OOP)

MySQL

PDO (Prepared Statements)

HTML / CSS

Sessions & CSRF Protection

🔐 Features : 

Secure registration & login (hashed passwords)

Session management with role validation

View quiz categories

View active quizzes by category

Take quizzes (one attempt per quiz)

Server-side score calculation

View quiz results and personal history

🧱 Core Classes : 

User (student)

Category (read-only)

Quiz

Question (correct answer hidden)

Attempt (quiz attempt tracking)

Result (final score)

🛡️ Security

CSRF protection on all forms

PDO prepared statements

Input validation & sanitization

Protection against SQL Injection, XSS, Session Hijacking

Access control (Security::checkStudent())

🗄️ Database

Relational MySQL database with proper foreign keys:

users

categories

quizzes

questions

attempts

results

🚀 Setup
git clone https://github.com/darkaoui90/quiz-platform-v2.git


Import the .sql file

Configure database connection

Run on a local server (XAMPP / WAMP)

📄 License :

Educational project.

