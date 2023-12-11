let code = '';
let messageContainer;

function appendToDisplay(value) {
  const display = document.getElementById('display');
  display.value += value;
}

function clearDisplay() {
  const display = document.getElementById('display');
  display.value = '';
}

function submitCode() {
  const display = document.getElementById('display');
  code = display.value;
  display.value = '';

  if (code === '1234') {
    showMessage('Code valide ! Accès autorisé.');
    const image = document.createElement('img');
    image.src = 'qrcode.png'; // Remplacez par le chemin de l'image
    image.style.width = '200px';
    image.style.height = '200px';
    messageContainer.appendChild(image);
  } else if (code === '4567') {
    showMessage('Code valide ! Redirection en cours...');
    setTimeout(function() {
      window.location.href = 'zonehtml.html';
    }, 5000); // Compte à rebours de 5 secondes (5000 millisecondes)
  } else {
    showMessage('Code incorrect ! Accès refusé.');
  }
}

function showMessage(message) {
  if (messageContainer) {
    document.body.removeChild(messageContainer);
    messageContainer = null;
  }

  messageContainer = document.createElement('div');
  messageContainer.innerHTML = message;
  messageContainer.classList.add('message-container'); // Ajout de la classe CSS
  document.body.appendChild(messageContainer);

  if (message === 'Code incorrect ! Accès refusé.') {
    setTimeout(function() {
      document.body.removeChild(messageContainer);
      messageContainer = null;
    }, 3000);
  }
}

// Récupérer les paramètres de l'URL
const params = new URLSearchParams(window.location.search);
const playerNames = params.getAll('player');

// Afficher les noms des joueurs dans le conteneur
const playerNamesContainer = document.getElementById('player-names');
playerNames.forEach(function(name, index) {
  const playerNameElement = document.createElement('div');
  playerNameElement.classList.add('player-name');
  playerNameElement.textContent = name;

  // Récupérer l'avatar sélectionné précédemment depuis le stockage local
  const selectedAvatars = JSON.parse(localStorage.getItem(name));
  if (selectedAvatars && selectedAvatars.avatar) {
    const avatarIcon = document.createElement('img');
    avatarIcon.classList.add('player-avatar');
    avatarIcon.src = `icons/${selectedAvatars.avatar}`;
    avatarIcon.alt = selectedAvatars.avatar;
    playerNameElement.prepend(avatarIcon);
  }

  playerNamesContainer.appendChild(playerNameElement);
});

// Fonction pour ajouter l'icône d'avatar au joueur correspondant
function addAvatarToPlayer(avatarName) {
  const currentPlayerElement = document.querySelector('.player-name.selected');
  if (currentPlayerElement) {
    const playerName = currentPlayerElement.textContent;
    const playerField = currentPlayerElement.closest('.player-field');

    const playerNameElement = document.createElement('p');
    playerNameElement.textContent = playerName;

    const avatarIcon = document.createElement('img');
    avatarIcon.classList.add('player-avatar');
    avatarIcon.src = `icons/${avatarName}`;
    avatarIcon.alt = avatarName;

    playerField.appendChild(avatarIcon);
    playerField.appendChild(playerNameElement);

    // Sauvegarder l'avatar sélectionné dans le stockage local
    const playerData = {
      name: playerName,
      avatar: avatarName
    };
    localStorage.setItem(playerName, JSON.stringify(playerData));
  }
}

// Ajouter un écouteur d'événement sur les noms des joueurs pour les sélectionner
const playerNamesElements = document.querySelectorAll('.player-name');
playerNamesElements.forEach(function(playerNameElement) {
  playerNameElement.addEventListener('click', function() {
    playerNamesElements.forEach(function(element) {
      element.classList.remove('selected');
    });
    playerNameElement.classList.add('selected');
  });
});

// Récupérer l'avatar sélectionné précédemment depuis le formulaire de la page accueil.html
const selectedAvatar = params.get('avatar');

// Ajouter l'avatar sélectionné au joueur correspondant
if (selectedAvatar) {
  const currentPlayerElement = document.querySelector('.player-name.selected');
  if (currentPlayerElement) {
    addAvatarToPlayer(selectedAvatar);
  }
}
