<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../static/globals.css" />
    <link rel="stylesheet" href="../static/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StageConnect</title>
  </head>

  <body>
    <div class="desktop">

      <div class="siteweb">

      <?php include 'navbar.php'; ?>
      <?php include 'header.php'; ?>

      <!-- Durée de stage -->
      <div class="BarreDeRecherche2">
        <label class="text3" for="duree">Durée de Stage</label>
        <select id="duree" name="duree">
          <option value="">Choisir</option>
          <option value="2">2 mois</option>
          <option value="4">4 mois</option>
          <option value="6">6 mois</option>
        </select>
      </div>
            
      <!-- Date de début -->
      <div class="BarreDeRecherche3">
        <label class="text4" for="date_debut">Date de Début</label>
        <select id="date_debut" name="date_debut">
          <option value="">Choisir</option>
          <option value="2025-04-07">7 avril 2025</option>
          <option value="2025-05-01">1er mai 2025</option>
          <option value="2025-06-01">1er juin 2025</option>
        </select>
      </div>
      
      <!-- Gratification -->
      <div class="BarreDeRecherche4">
        <label class="text5" for="gratification">Gratification</label>
        <select id="gratification" name="gratification">
          <option value="">Choisir</option>
          <option value="non">Non rémunéré</option>
          <option value="min_400">Rémunéré (min 400€)</option>
          <option value="min_600">Rémunéré (min 600€)</option>
        </select>
      </div>
      <div class="rectangle10">
        <img class="buy" src="../static/assets/buy.jpg">
        <h1 class="text7">Bouygues-Télécom</h1>
        <p class="text8">Administrateur réseau (H/F)</p>
      </div>


      <?php include 'footer.php'; ?>

      </div>

    </div>
</body>
</html>