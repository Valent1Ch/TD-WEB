function updatePreview() {
  var htmlCode = document.getElementById("html-input").value;
  var preview = document.getElementById("preview");
  preview.innerHTML = htmlCode;
  preview.style.backgroundColor = "white";

  var parser = new DOMParser();
  var doc = parser.parseFromString(htmlCode, "text/html");
  var h1Element = doc.querySelector("h1");
  var pElement = doc.querySelector("p");
  var imgElements = doc.querySelectorAll("img");

  var elementFound = {
    h1: false,
    p: false,
    img: false
  };

  for (var i = 0; i < imgElements.length; i++) {
    if (imgElements[i].getAttribute("src") === "image.png") {
      elementFound.img = true;
      break;
    }
  }

  if (h1Element) {
    elementFound.h1 = true;
  }

  if (pElement) {
    elementFound.p = true;
  }

  if (elementFound.h1 && elementFound.p && elementFound.img) {
    showMessage("Contenu valide !");
    preview.style.color = ""; // Réinitialiser la couleur du texte
    showDialog("image.png");
  } else {
    showMessage("Contenu incomplet.");
  }
}

function showMessage(message) {
  var messageContainer = document.getElementById("message");
  messageContainer.textContent = message;
  messageContainer.style.display = "block"; // Afficher le message
}

function showDialog(imageSrc) {
  // Afficher la boîte de dialogue avec l'image réussie
}

function toggleExplication() {
  var explication = document.getElementById("texte-explication");
  var enigme = document.getElementById("enigme");
  var btnExplication = document.getElementById("btn-explication");

  if (explication.style.display === "none") {
    explication.style.display = "block";
    enigme.style.display = "none";
    btnExplication.textContent = "Masquer Explication";
  } else {
    explication.style.display = "none";
    enigme.style.display = "block";
    btnExplication.textContent = "Afficher Explication";
  }
}
