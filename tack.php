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