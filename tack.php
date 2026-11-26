<?php
// Läs datan från formuläret. Nyckeln i $_POST är fältets name-attribut.
// ?? "" betyder: om fältet saknas används en tom text i stället.
$name    = $_POST["name"] ?? "";
$email   = $_POST["email"] ?? "";
$phone   = $_POST["phone"] ?? "";
$subject = $_POST["subject"] ?? "";
$reply   = $_POST["reply"] ?? "";
$message = $_POST["message"] ?? "";