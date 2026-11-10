<?php
require_once("../config/auth.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Layout Experiment</title>
 <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
 <h1>Layout Experiment</h1>
 <p>Web Programming 1</p>
</header>
<div class="page-layout">
 <nav class="side-nav">
 <a href="index.php">Biodata</a>
 <a href="Layout.php">Layout Experiment</a>
 <a href="#profile">Profile</a>
 <a href="#skills">Skills</a>
 <a href="#goal">Learning Goal</a>
 </nav>
 <main>
 <section id="profile" class="card">
 <h2>Profile Summary</h2>
 <p>Saya sedang mempelajari HTML dan CSS untuk membangun website yang terstruktur dan mudah dibaca.</p>
 </section>
 <section id="skills" class="card">
 <h2>Skills</h2>
 <ul>
 <li>HTML</li>
 <li>CSS Basic</li>
 <li>Problem Solving</li>
 </ul>
 </section>
 <section id="goal" class="card">
 <h2>Learning Goal</h2>
 <p>Mampu mengubah struktur HTML menjadi berbagai tampilan menggunakan CSS.</p>
 </section>
 <section>
 <h2>Display Experiment</h2>
 <a class="demo-link" href="#">HTML</a>
 <a class="demo-link" href="#">CSS</a>
 <a class="demo-link" href="#">JavaScript</a>
</section>

 </main>
</div>
<footer>
 <p>Web Programming 1 - CSS Practice</p>
</footer>ramming 1 - CSS Practice</p>
</footer>
</body>
</html>