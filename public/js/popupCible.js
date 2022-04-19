document.addEventListener('DOMContentLoaded', () => {
    let popup = document.querySelector('#cible');
    let addCibleBtn = document.querySelector('#addCible');
    let formValider = document.querySelectorAll('.btn-validation-popup')[0];
    let fieldsetCible = document.querySelector('fieldset.cible');

    // INPUTS
    let latitude = document.querySelector('#form_latitudeN');
    let longitude = document.querySelector('#form_longitudeO');
    let libelle = document.querySelector('#form_libelle');

    let cibleArray = [];

    class Cible {
        constructor(latitude, longitude, libelle) {
            this.latitude = latitude;
            this.longitude = longitude;
            this.libelle = libelle;
        }
    }

    addCibleBtn.addEventListener('click', () => {
        popup.classList.add('show');
    })

    formValider.addEventListener('click', () => {
        if (latitude.value != "" && longitude.value != "" && libelle.value != "") {
            let cible = new Cible(latitude.value, longitude.value, libelle.value);
            cibleArray.push(cible);
            console.log(cibleArray);
            popup.classList.toggle('show');
            cibleArray.forEach(pointGPS => {
                fieldsetCible.innerHTML += `<div class="pointGPS">
                <p>Libellé : ${pointGPS.libelle}</p>
                <p>Latitude : ${pointGPS.latitude}</p>
                <p>Longitude : ${pointGPS.longitude}</p>
                </div>`;
            });
        } else {
            alert('Veuillez remplir tous les champs');
        }
    })



})