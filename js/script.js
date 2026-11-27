// scrips.js - JavaScript-lagret (beteendet)
// JS hittar sina element ENDAST via data-js-* krokar, aldrig via CSS-klasserna.
// Då kan CSS-utvecklaren byta namn på klasser utan att java scrips slutar fungera.

// 1.Visa och dölj meny (finns på alla sidor)
const menuButton = document.querySelector('[data-js-action="toggle-menu"]');
const menu = document.querySelector('[data-js-target="menu"]');