<footer>
            <p style="font-size: 10px; margin-bottom: 300px;">faculté des sciences</p>
        </footer>
    </section>
    <script type="text/javascript">
        const list = document.querySelectorAll('.list');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('active')
            );
            this.classList.add('active');
        }

        list.forEach((item) =>
            item.addEventListener('click', activeLink)
        );


        /*	function handleClick(event) {
             // event.preventDefault(); // Empêcher le comportement par défaut de chargement de la nouvelle page
    
              // Ralentir le chargement en ajoutant un délai (par exemple, 2 secondes)
              setTimeout(function() {
                // Rediriger l'utilisateur vers la nouvelle page
                window.location.href = event.target.href;
                console.log(event.target.href)
              }, 200); // Délai en millisecondes (ici, 2000 ms = 2 secondes)
            }
    
            // Sélectionner tous les liens sur la page
            var links = document.querySelectorAll("a");
    
            // Ajouter l'événement de clic à chaque lien
            links.forEach(function(link) {
              link.addEventListener("click", handleClick);
            });*/

        var startX; // position X de départ du glissement

        document.addEventListener('mousedown', function (event) {
            startX = event.clientX; // Enregistre la position X de départ
        });

        document.addEventListener('mousemove', function (event) {
            if (startX) {
                var currentX = event.clientX; // Position X actuelle du glissement
                var diffX = startX - currentX; // Différence de position X par rapport au point de départ

                // Vérifie si le glissement horizontal est suffisamment long
                if (Math.abs(diffX) > 50) {
                    if (diffX > 0) {
                        // Glissement vers la gauche
                        console.log('Swipe gauche détecté !');
                    } else {
                        // Glissement vers la droite
                        console.log('Swipe droite détecté !');
                    }
                    startX = null; // Réinitialise la position de départ
                }
            }
        });

        document.addEventListener('mouseup', function (event) {
            startX = null; // Réinitialise la position de départ
        });



    </script>
</body>

</html>