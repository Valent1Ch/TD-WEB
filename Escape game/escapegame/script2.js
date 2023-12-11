// Récupérer les éléments du DOM
const form = document.getElementById('player-form');
const playersContainer = document.getElementById('players-container');
const addPlayerBtn = document.getElementById('add-player-btn');
const showAvatarBtn = document.getElementById('show-avatar-btn');
const baseURL = 'http://127.0.0.1/escapegame/index.html';

// Gérer la soumission du formulaire
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupérer tous les champs de saisie des joueurs
  const playerInputs = playersContainer.querySelectorAll('input[name="player"]');

  // Vérifier si au moins un nom de joueur a été saisi
  let isValid = false;
  playerInputs.forEach((input) => {
    if (input.value.trim() !== '') {
      isValid = true;
    }
  });

  if (isValid) {
    // Construire l'URL avec les paramètres
    const url = new URL(baseURL);
    playerInputs.forEach((input) => {
      if (input.value.trim() !== '') {
        url.searchParams.append('player', input.value.trim());
      }
    });

    // Rediriger vers l'URL construite
    window.location.href = url;
  } else {
    // Afficher un message d'erreur ou effectuer une action appropriée
    alert('Veuillez entrer au moins un nom de joueur valide.');
  }
});

// Ajouter un écouteur d'événement pour le clic sur le bouton d'ajout de joueur
addPlayerBtn.addEventListener('click', function(event) {
  event.preventDefault(); // Empêche le comportement par défaut du bouton

  // Créer le champ de saisie pour un joueur supplémentaire
  const playerField = document.createElement('div');
  playerField.classList.add('player-field');

  const label = document.createElement('label');
  label.textContent = `Joueur ${playersContainer.children.length + 1}:`;

  const input = document.createElement('input');
  input.type = 'text';
  input.name = 'player';
  input.required = true;

  const avatarIcon = document.createElement('img');
  avatarIcon.classList.add('player-avatar');

  const deleteButton = document.createElement('button');
  deleteButton.textContent = 'Supprimer';
  deleteButton.addEventListener('click', function() {
    // Supprimer le joueur
    deletePlayer(playerField);
  });

  playerField.appendChild(label);
  playerField.appendChild(input);
  playerField.appendChild(avatarIcon);
  playerField.appendChild(deleteButton);

  playersContainer.appendChild(playerField);
});

// Supprimer l'écouteur d'événement click sur le bouton "Ajouter"
addPlayerBtn.removeEventListener('click', null);

// Afficher ou masquer le conteneur des icônes d'avatar
showAvatarBtn.addEventListener('click', function(event) {
  event.preventDefault(); // Empêche le comportement par défaut du bouton
  const avatarIcons = document.getElementById('avatar-icons');
  avatarIcons.style.display = avatarIcons.style.display === 'none' ? 'block' : 'none';
});

// Créer les icônes d'avatar
createAvatarIcons();

// Fonction pour créer et afficher les icônes d'avatar dans le conteneur des icônes
function createAvatarIcons() {
  const avatarIconsContainer = document.getElementById('avatar-icons');

  // Tableau contenant les noms des fichiers d'avatar
  const avatarNames = ['avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png', 'avatar5.png', 'avatar6.png', 'avatar7.png', 'avatar8.png', 'avatar9.png'];

  // Créer la grille pour les icônes d'avatar
  const avatarGrid = document.createElement('div');
  avatarGrid.classList.add('avatar-grid');
  avatarIconsContainer.appendChild(avatarGrid);

  // Boucle pour créer les balises <img> pour chaque avatar
  avatarNames.forEach(function(avatarName) {
    const img = document.createElement('img');
    img.src = `icons/${avatarName}`;
    img.alt = avatarName;

    const addButton = document.createElement('button');
    addButton.textContent = 'Ajouter';
    addButton.addEventListener('click', function(event) {
      event.preventDefault(); // Empêche le comportement par défaut du bouton
      const currentPlayerField = document.querySelector('.player-field:last-child input[name="player"]');
      const avatarIcon = currentPlayerField.parentNode.querySelector('.player-avatar');
      // Gérer l'ajout de l'avatar à côté du nom du joueur
      addAvatarToPlayer(avatarIcon, avatarName);
    });

    const avatarContainer = document.createElement('div');
    avatarContainer.classList.add('avatar-container');
    avatarContainer.appendChild(img);
    avatarContainer.appendChild(addButton);

    avatarGrid.appendChild(avatarContainer);
  });
}

// Fonction pour ajouter l'icône d'avatar au joueur correspondant
function addAvatarToPlayer(avatarIcon, avatarName) {
  const currentPlayerField = document.querySelector('.player-field:last-child input[name="player"]');
  if (currentPlayerField) {
    const playerName = currentPlayerField.value.trim();
    if (playerName !== '') {
      const playerData = {
        name: playerName,
        avatar: avatarName
      };
      localStorage.setItem(playerName, JSON.stringify(playerData));
      avatarIcon.src = `icons/${avatarName}`;
      avatarIcon.alt = avatarName;

      // Construire l'URL avec le paramètre d'avatar
      const url = new URL(baseURL);
      url.searchParams.append('player', playerName);
      url.searchParams.append('avatar', avatarName);

      // Rediriger vers l'URL construite
    
    }
  }
}

// Fonction pour supprimer un joueur
function deletePlayer(playerField) {
  playerField.remove();
}
