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
