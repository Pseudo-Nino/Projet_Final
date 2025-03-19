document.addEventListener('DOMContentLoaded', function () {
    const roleInputs = document.querySelectorAll('input[name="role"]');
    const nomLabel = document.querySelector('label[for="nom"]');
    const nomInput = document.getElementById('nom');
    const prenomLabel = document.querySelector('label[for="prenom"]');
    const prenomInput = document.getElementById('prenom');
    const etablissementLabel = document.querySelector('label[for="etablissement"]');
    const etablissementSelect = document.getElementById('etablissement');
    const promotionLabel = document.querySelector('label[for="promotion"]');
    const promotionSelect = document.getElementById('promotion');

    roleInputs.forEach(function (input) {
        input.addEventListener('change', function () {
            if (this.value === 'entreprise') {
                // Modification pour entreprise
                nomLabel.textContent = "Nom Entreprise";
                nomInput.placeholder = "Nom de l'entreprise";
                prenomLabel.textContent = "Domaine Entreprise";
                prenomInput.placeholder = "Domaine d'activité";

                etablissementLabel.textContent = "Position de l'entreprise";
                etablissementSelect.innerHTML = `
                    <option value="France">France</option>
                    <option value="International">International</option>
                `;

                promotionLabel.textContent = "Présentation de l'entreprise";
                promotionSelect.innerHTML = `
                    <option value="PME">PME</option>
                    <option value="Grande Entreprise">Grande Entreprise</option>
                    <option value="Start-up">Start-up</option>
                `;
            } else if (this.value === 'pilote') {
                // Modification pour pilote
                nomLabel.textContent = "Nom";
                nomInput.placeholder = "Votre nom";
                prenomLabel.textContent = "Prénom";
                prenomInput.placeholder = "Votre prénom";

                etablissementLabel.textContent = "Établissement :";
                etablissementSelect.innerHTML = `
                    <option value="Aix-en-Provence">Aix-en-Provence</option>
                    <option value="Angoulême">Angoulême</option>
                    <option value="Arras">Arras</option>
                    <option value="Bordeaux">Bordeaux</option>
                    <option value="Brest">Brest</option>
                    <option value="Caen">Caen</option>
                    <option value="Châteauroux">Châteauroux</option>
                    <option value="Dijon">Dijon</option>
                    <option value="Grenoble">Grenoble</option>
                    <option value="La Rochelle">La Rochelle</option>
                    <option value="Le Mans">Le Mans</option>
                    <option value="Lille">Lille</option>
                    <option value="Lyon">Lyon</option>
                    <option value="Montpellier">Montpellier</option>
                    <option value="Nancy">Nancy</option>
                    <option value="Nantes">Nantes</option>
                    <option value="Nice">Nice</option>
                    <option value="Orléans">Orléans</option>
                    <option value="Paris-Nanterre">Paris-Nanterre</option>
                    <option value="Pau">Pau</option>
                    <option value="Reims">Reims</option>
                    <option value="Rouen">Rouen</option>
                    <option value="Saint-Nazaire">Saint-Nazaire</option>
                    <option value="Strasbourg">Strasbourg</option>
                    <option value="Toulouse">Toulouse</option>
                `;

                promotionLabel.textContent = "Promotion";
                promotionSelect.innerHTML = `
                    <option value="Pilote CPI A1">Pilote CPI A1</option>
                    <option value="Pilote CPI A2">Pilote CPI A2</option>
                    <option value="Pilote Info A3">Pilote Info A3</option>
                    <option value="Pilote Info A4">Pilote Info A4</option>
                `;
            } else {
                // Remise par défaut (étudiant)
                nomLabel.textContent = "Nom";
                nomInput.placeholder = "Votre nom";
                prenomLabel.textContent = "Prénom";
                prenomInput.placeholder = "Votre prénom";

                etablissementLabel.textContent = "Établissement :";
                etablissementSelect.innerHTML = `
                    <option value="Aix-en-Provence">Aix-en-Provence</option>
                    <option value="Angoulême">Angoulême</option>
                    <option value="Arras">Arras</option>
                    <option value="Bordeaux">Bordeaux</option>
                    <option value="Brest">Brest</option>
                    <option value="Caen">Caen</option>
                    <option value="Châteauroux">Châteauroux</option>
                    <option value="Dijon">Dijon</option>
                    <option value="Grenoble">Grenoble</option>
                    <option value="La Rochelle">La Rochelle</option>
                    <option value="Le Mans">Le Mans</option>
                    <option value="Lille">Lille</option>
                    <option value="Lyon">Lyon</option>
                    <option value="Montpellier">Montpellier</option>
                    <option value="Nancy">Nancy</option>
                    <option value="Nantes">Nantes</option>
                    <option value="Nice">Nice</option>
                    <option value="Orléans">Orléans</option>
                    <option value="Paris-Nanterre">Paris-Nanterre</option>
                    <option value="Pau">Pau</option>
                    <option value="Reims">Reims</option>
                    <option value="Rouen">Rouen</option>
                    <option value="Saint-Nazaire">Saint-Nazaire</option>
                    <option value="Strasbourg">Strasbourg</option>
                    <option value="Toulouse">Toulouse</option>
                `;

                promotionLabel.textContent = "Promotion";
                promotionSelect.innerHTML = `
                    <option value="CPI A1">CPI A1</option>
                    <option value="CPI A2">CPI A2</option>
                    <option value="Info A3">Info A3</option>
                    <option value="Info A4">Info A4</option>
                `;
            }
        });
    });
});

