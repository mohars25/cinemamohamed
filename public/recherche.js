document
  .getElementById("searchActorButton")
  .addEventListener("click", function () {
    const searchTerm = document.getElementById("searchActorInput").value;

    fetch(`search_actor.php?nom=${encodeURIComponent(searchTerm)}`)
      .then((response) => response.json())
      .then((data) => {
        const actorDetails = document.getElementById("actorDetails");
        actorDetails.innerHTML = "";
        if (data) {
          actorDetails.innerHTML = `
                    <h3>Informations de l'acteur</h3>
                    <p>Nom : ${data.nom}</p>
                    <p>Prénom : ${data.prenom}</p>
                    <p>Sexe : ${data.sexe}</p>
                    <p>Date de naissance : ${data.date_naissance}</p>
                    
                `;
        } else {
          actorDetails.innerHTML = "<p>Aucun acteur trouvé.</p>";
        }
      })
      .catch((error) => console.error("Erreur:", error));
  });
