
     // Prix par jour de location
     const pricePerDay = 2000; // Exemple : 100 € par jour
 
     // Fonction pour calculer le prix total
     function calculatePrice() {
         const startDateInput = document.getElementById('date_debut');
         const endDateInput = document.getElementById('date_fin');
         const totalPriceDisplay = document.getElementById('total-price');
         const montantButton = document.getElementById('montant');
 
         // Convertir les dates en objets Date
         const startDate = new Date(startDateInput.value);
         const endDate = new Date(endDateInput.value);
 
         // Vérifier si les deux dates sont valides
         if (startDateInput.value && endDateInput.value) {
             if (endDate >= startDate) {
                 // Calcul de la durée en jours
                 const timeDiff = endDate - startDate;
                 const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
 
                 // Calcul du prix total
                 const totalPrice = daysDiff * pricePerDay;
 
                 // Affichage du prix
                 totalPriceDisplay.textContent = totalPrice;
                    montantButton.value = totalPrice;

                
             } else {
                 totalPriceDisplay.textContent = "0";
                 montantButton.value = 0; // Remettre à 0 si date incorrecte
             }
         } else {
             totalPriceDisplay.textContent = "0";
             montantButton.value = 0; // Remettre à 0 si une date est vide
         }
     }
     // Gestion du menu déroulant
document.addEventListener("DOMContentLoaded", function() {
    const profileIcon = document.getElementById("profile-icon");
    const dropdownContent = document.getElementById("dropdown-content");

    // Afficher ou masquer le menu déroulant au clic sur l'icône de profil
    profileIcon.addEventListener("click", function(event) {
        event.stopPropagation(); // Empêche la propagation du clic
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });

    // Masquer le menu déroulant si on clique ailleurs sur la page
    document.addEventListener("click", function() {
        dropdownContent.style.display = "none";
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const voirDetailsButtons = document.querySelectorAll('.voir-details');
    const modifierButtons = document.querySelectorAll('.modifier');



    voirDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const details = this.nextElementSibling;
            details.style.display = details.style.display === 'block' ? 'none' : 'block';
        });
    });

    modifierButtons.forEach(button => {
        button.addEventListener('click', function() {
            const voitureBox = this.closest('.voiture-box');
            const details = voitureBox.querySelector('.details-voiture');
            const form = document.createElement('form');
            form.className = 'voiture-form';

            details.querySelectorAll('p').forEach(p => {
                const label = document.createElement('label');
                label.textContent = p.textContent.split(':')[0] + ': ';
                const input = document.createElement('input');
                input.type = 'text';
                input.value = p.textContent.split(':')[1].trim();
                form.appendChild(label);
                form.appendChild(input);
            });

            const submitButton = document.createElement('button');
            submitButton.type = 'submit';
            submitButton.textContent = 'Enregistrer';
            form.appendChild(submitButton);

            voitureBox.replaceChild(form, details);
            

        });
    });
});

