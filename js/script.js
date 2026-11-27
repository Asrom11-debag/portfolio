// scrips.js - JavaScript-lagret (beteendet)
// JS hittar sina element ENDAST via data-js-* krokar, aldrig via CSS-klasserna.
// Då kan CSS-utvecklaren byta namn på klasser utan att java scrips slutar fungera.

// 1.Visa och dölj meny (finns på alla sidor)
const menuButton = document.querySelector('[data-js-action="toggle-menu"]');
const menu = document.querySelector('[data-js-target="menu"]');

// Kontrollerar att både knappen och meny finns på sidan så att koden inte kraschar på sidor som inte har meny.
if (menuButton && menu) {
  menuButton.addEventListener("click", function () {
    // Läser av aria-expanded för att se om meny är öppen just nu
    if (menuButton.getAttribute("aria-expanded") === "true") {
      menuButton.setAttribute("aria-expanded", "false");
      // HTML-attributet hidden döljer elemntet för både skärm och skärmläsare.
      menu.hidden = true;
    } else {
      menuButton.setAttribute("aria-expanded", "true");
      menu.hidden = false;
    }
  });
}

// 2 och 3. Filtera kompetenser och projekt.
// Samma funtion används på båda sidorna bara namnen på krokarna skiljer sig åt. Därför skickar vi in namnen som argument till funktionen.
function setupFilter(actionName, targetName) {
    // querySelectorAll hämtar alla filterknappar som en lista. querySelector hämtar bara ett element, i det här fallet den container som innehåller alla rader/projekt.
  const buttons = document.querySelectorAll('[data-js-action="' + actionName + '"]');
  const target = document.querySelector('[data-js-target="' + targetName + '"]');
  
  // Hämtar bara de rader/projekt som ligger inuti rätt target och har data-category attributet. Det är viktigt att vi inte hämtar alla rader/projekt på sidan, utan bara de som ligger i rätt container.
  if (!target) {
    return; // Kroken finns inte på den här sidan.
  }

  //Hämtar bara de rader/projekt som ligger inuti rätt target och har data-catecory
  const items = target.querySelectorAll("[data-category]");

  for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function () {
        //dataset.catecory läser av värdet av värdet i HTML-attributet data-category
      const category = buttons[i].dataset.category;

      // Visa eller dölj varje rad/projekt.
      for (let j = 0; j < items.length; j++) {
        if (category === "alla" || items[j].dataset.category === category) {
          items[j].hidden = false;
        } else {
          items[j].hidden = true;
        }
      }

            // Markera vilken knapp som är vald.(viktigt för skärmläsare via aria-pressed och för att visa användaren vilken knapp som är vald)
      for (let k = 0; k < buttons.length; k++) {
        buttons[k].setAttribute("aria-pressed", "false");
      }
      buttons[i].setAttribute("aria-pressed", "true");
    });
  }
}

//Kör samma återanvändbara funktion för både komptenssidan och projektsidan 
setupFilter("filter-skills", "skill-list");
setupFilter("filter-projects", "project-list");


// 4. Kopiera e-postadressen (kontaktsidan)
const copyButton = document.querySelector('[data-js-action="copy-email"]');
const copyMessage = document.querySelector('[data-js-target="copy-message"]');

if (copyButton && copyMessage) {
  copyButton.addEventListener("click", function () {
    const email = copyButton.dataset.email;
    //Webbläsaren inbyggda API som kopierar texten till användaren urklipp
    navigator.clipboard.writeText(email);
    // text Content skriver ut bekräftelsen säkert som ren text i target-elementet.
    copyMessage.textContent = "E-postadressen " + email + " är kopierad.";
  });
}


// 5. Räkna tecken i meddelandet (kontaktsidan)
const messageField = document.querySelector('[data-js-action="count-characters"]');
const characterCount = document.querySelector('[data-js-target="character-count"]');

if (messageField && characterCount) {
    // Händelsen "input" körs varje gång användaren skriver in eller tar bort ett tecken i textfältet.
  messageField.addEventListener("input", function () {
    // HTML-attributet data-max-length skrivs om till camelCase (maxLength) i databaset
    const max = messageField.dataset.maxLength;
    characterCount.textContent = messageField.value.length + " av " + max + " tecken.";
  });
}