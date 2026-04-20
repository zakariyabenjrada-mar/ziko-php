<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zakaria | Dev Web Fullstack</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #222;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }

        section {
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .atelier {
            background-color: #fff;
            margin-bottom: 15px;
            padding: 15px;
            border-left: 5px solid #007BFF;
        }

        .atelier h3 {
            margin: 0;
        }

        .links a {
            margin-right: 10px;
            text-decoration: none;
            color: #007BFF;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #222;
            color: white;
        }
    </style>
</head>

<body>

<header>
    <h1>Zakaria Benjrada</h1>
    <p>Développeur Web Fullstack</p>
</header>

<nav>
    <a href="#about">À propos</a>
    <a href="#ateliers">Ateliers PHP</a>
    <a href="#contact">Contact</a>
</nav>

<section id="about">
    <div class="container">
        <h2>À propos</h2>
        <p>
            Je suis Zakaria, stagiaire en développement digital, passionné par le développement web fullstack.
            Voici mes ateliers PHP réalisés pendant ma formation.
        </p>
    </div>
</section>

<section id="ateliers">
    <div class="container">
        <h2>Mes Ateliers PHP</h2>

        <!-- Atelier 1 -->
        <div class="atelier">
            <h3>Atelier 1</h3>
            <p><strong>Énoncé :</strong> Description de l'exercice ici...</p>

            <div class="links">
                <a href="/AT1AT1.docx">📄 Rapport</a>
                
            </div>
        </div>

        <!-- Atelier 2 -->
        <div class="atelier">
            <h3>Atelier 2</h3>
            <p><strong>Énoncé :</strong> Description de l'exercice ici...</p>

            <div class="links">
                <a href="At2.pdf">📄 Rapport</a>
                <a href="#">💻 GitHub</a>
            </div>
        </div>


        <!-- Atelier 3 -->
        <div class="atelier">
            <h3>Atelier 3</h3>
            <p><strong>Énoncé :</strong> Description de l'exercice ici...</p>

            <div class="links">
                <a href="#">📄 Rapport</a>
                <a href="#">💻 GitHub</a>
            </div>
        </div>




          <!-- Atelier 4 -->
        <div class="atelier">
            <h3>Atelier 4</h3>
            <p><strong>Énoncé :</strong> Description de l'exercice ici...</p>

            <div class="links">
                <a href="#">📄 Rapport</a>
                <a href="#">💻 GitHub</a>
            </div>
        </div>


        <!-- Tu peux copier ce bloc pour ajouter d'autres ateliers -->

    </div>
</section>

<section id="contact">
    <div class="container">
        <h2>Contact</h2>
        <p>Email : zakaria@email.com</p>
    </div>
</section>

<footer>
    <p>© 2026 Zakaria - Portfolio</p>
</footer>

</body>
</html>