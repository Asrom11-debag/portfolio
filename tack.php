<?php

// Läs datan från formuläret. Nyckeln i $_POST är fältets name-attribut.
// ?? "" betyder: om fältet saknas används en tom text i stället.
$name    = $_POST["name"] ?? "";
$email   = $_POST["email"] ?? "";
$phone   = $_POST["phone"] ?? "";
$subject = $_POST["subject"] ?? "";
$reply   = $_POST["reply"] ?? "";
$message = $_POST["message"] ?? "";

// Gör om värdet från <select> till en text som går att läsa.
if ($subject == "jobb") {
    $subjectText = "ett jobberbjudande";
} elseif ($subject == "praktik") {
    $subjectText = "praktik eller LIA";
} elseif ($subject == "samarbete") {
    $subjectText = "ett samarbete i ett projekt";
} else {
    $subjectText = "något övrigt";
}
?> 

<!-- Härifrån är det vanlig HTML, med samma sidhuvud, meny och sidfot som de andra sidorna -->
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tack för ditt meddelande – Sam Lind</title>
  <meta name="description" content="Bekräftelse på att ditt meddelande till Sam Lind har skickats.">
  <link rel="icon" href="images/favicon.png" type="image/png">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js" defer></script>
</head>
<body>

  <a class="skip-link" href="#main">Hoppa till huvudinnehållet</a>

  <header class="site-header">
    <p class="site-header__name">
      <a class="site-header__link" href="index.html">Sam Lind – portfolio</a>
    </p>

    <nav class="main-nav" aria-label="Huvudmeny">
      <!-- JS: När man klickar på knappen ska menyn (data-js-target="menu") visas eller döljas.
           aria-expanded på knappen ska samtidigt ändras mellan "true" och "false". -->
      <button type="button" class="main-nav__toggle"
              data-js-action="toggle-menu"
              aria-expanded="true"
              aria-controls="main-menu">
        Meny
      </button>

    <ul class="main-nav__list" id="main-menu" data-js-target="menu">
        <li class="main-nav__item"><a class="main-nav__link" href="index.html">Om mig</a></li>
        <li class="main-nav__item"><a class="main-nav__link" href="kompetenser.html">Kompetenser</a></li>
        <li class="main-nav__item"><a class="main-nav__link" href="projekt.html">Projekt</a></li>
        <li class="main-nav__item"><a class="main-nav__link" href="utbildning.html">Utbildning och erfarenhet</a></li>
        <li class="main-nav__item"><a class="main-nav__link" href="certifikat.html">Certifikat och språk</a></li>
        <li class="main-nav__item"><a class="main-nav__link" href="kontakt.html">Kontakt</a></li>
      </ul>
    </nav>
  </header>

  <main class="page" id="main">
    <h1 class="page__title">Tack för ditt meddelande!</h1>

    <section class="thanks" aria-labelledby="thanks-heading">
      <h2 class="thanks__title" id="thanks-heading">Det här skickade du</h2>
      <!-- htmlspecialchars: om någon skriver HTML-kod i formuläret visas den som text och körs inte (skydd mot XSS) -->
      <p class="thanks__text">Hej <?php echo htmlspecialchars($name); ?>, tack för att du hörde av dig om <?php echo htmlspecialchars($subjectText); ?>.</p>

      <!-- if/else: olika text beroende på vilken radioknapp man valde (telefon eller e-post) -->
      <?php if ($reply == "telefon") { ?>
        <p class="thanks__text thanks__text--highlight">Jag ringer dig på <?php echo htmlspecialchars($phone); ?> så snart jag kan.</p>
      <?php } else { ?>
        <p class="thanks__text thanks__text--highlight">Jag svarar till <?php echo htmlspecialchars($email); ?> så snart jag kan.</p>
      <?php } ?>

      <!-- dl: en sammanfattning av allt som skickades, som par av namn och värde -->
      <dl class="thanks__summary">
        <dt class="thanks__label">Namn</dt>
        <dd class="thanks__value"><?php echo htmlspecialchars($name); ?></dd>
        <dt class="thanks__label">E-post</dt>
        <dd class="thanks__value"><?php echo htmlspecialchars($email); ?></dd>
        <dt class="thanks__label">Ämne</dt>
        <dd class="thanks__value"><?php echo htmlspecialchars($subjectText); ?></dd>
        <dt class="thanks__label">Svar via</dt>
        <dd class="thanks__value"><?php echo htmlspecialchars($reply); ?></dd>
        <dt class="thanks__label">Meddelande</dt>
        <dd class="thanks__value"><?php echo htmlspecialchars($message); ?></dd>
      </dl>

      <a class="thanks__link" href="kontakt.html">Tillbaka till kontaktsidan</a>
    </section>
  </main>

  <!-- FOOTER: sidfot, samma på alla sidor -->
  <footer class="site-footer">
    <p class="site-footer__text">© 2026 Sam Lind. Skolprojekt: portfolio för en fiktiv person.</p>
    <ul class="site-footer__list">
      <li class="site-footer__item"><a class="site-footer__link" href="mailto:sam.lind@example.com">Mejla Sam Lind</a></li>
      <li class="site-footer__item"><a class="site-footer__link" href="https://www.linkedin.com/">Sam Lind på LinkedIn</a></li>
      <li class="site-footer__item"><a class="site-footer__link" href="https://github.com/">Sam Lind på GitHub</a></li>
    </ul>
  </footer>
</body>
</html>