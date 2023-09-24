const projects = document.querySelectorAll('.project');

const projectModalTitle = document.getElementById('projectModalTitle');
const projectDescription = document.getElementById('projectDescription');
const projectImages = document.getElementById('projectImages');
const projectStack = document.getElementById('projectStack');

projects.forEach(project => {
	project.addEventListener('click', () => {
		projectModalTitle.textContent = project.dataset.name;
		projectDescription.textContent = project.dataset.description;

		// Efface les anciennes images du modal
		projectImages.innerHTML = '';

		// Charge et affiche les images du projet
		const imagePaths = project.dataset.image.split(',');
		imagePaths.forEach(path => {
			const image = document.createElement('img');
			image.src = path.trim();
			projectImages.appendChild(image);
		});

		projectStack.textContent = project.dataset.descriptionstack;

		// Affiche le modal
		$('#projectModal').modal('show');
	});
});


// Sélectionnez les boutons "Close" par leur classe
const closeButtons = document.querySelectorAll('.close-button');

// Sélectionnez le modal par son ID
const projectModal = document.getElementById('projectModal');

// Ajoutez un gestionnaire d'événements à chaque bouton "Close"
closeButtons.forEach(button => {
	button.addEventListener('click', () => {
		// Fermez le modal en utilisant Bootstrap
		$('#projectModal').modal('hide');

		// Réinitialisez le modal
		projectModal.style.display = 'block';  // Réaffichez le modal
		document.body.classList.add('modal-open');  // Réajoutez la classe 'modal-open' au body
		projectModal.classList.add('show');  // Réajoutez la classe 'show' au modal
	});
});
