<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Onyesha Location Yako na Anwani</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map { height: 400px; width: 100%; }
  </style>
</head>
<body>
  <h3>Ramani Yako</h3>
  <div id="map"></div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function(position) {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;

          const map = L.map("map").setView([lat, lng], 15);

          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "© Sam technology"
          }).addTo(map);

          L.marker([lat, lng]).addTo(map)
            .bindPopup("Upo hapa | You are here!")
            .openPopup();

          fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
            .then(response => response.json())
            .then(data => {
              console.log("Anwani:", data.display_name);
            })
            .catch(error => console.error("Kosa wakati ya kupata anwani:", error));
        },
        function(error) {
          console.error("Kosa: " + error.message);
        }
      );
    } else {
      alert("Geolocation haipatikani kwenye browser yako.");
    }
  </script>
</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Onyesha Location Yako na Anwani</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map { height: 400px; width: 100%; }
  </style>
</head>
<body>
  <h3>Ramani Yako</h3>
  <div id="map"></div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function(position) {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;

          console.log("Latitude: " + lat + ", Longitude: " + lng);

          const map = L.map("map").setView([lat, lng], 15);

          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "© Sam Technology"
          }).addTo(map);

          L.marker([lat, lng]).addTo(map)
            .bindPopup("Upo hapa!")
            .openPopup();

          fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
            .then(response => response.json())
            .then(data => {
              console.log("Anwani:", data.display_name);
            })
            .catch(error => console.error("Kosa wakati ya kupata anwani:", error));
        },
        function(error) {
          console.error("Kosa: " + error.message);
        },
        {
          enableHighAccuracy: true,
          timeout: 5000,
          maximumAge: 0
        }
      );
    } else {
      alert("Geolocation haipatikani kwenye browser yako.");
    }
  </script>
</body>
</html>
