<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lovely Pet</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./css/backgroud.css">
  <link rel="stylesheet" href="./css/images.css">
  <link rel="stylesheet" href="./css/spec.css">
  <link rel="stylesheet" href="./css/font.css">
  
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Verified Clinic Details</h1>
        <div class="clinic-details" id="clinicDetails">
            <!-- This section will be populated with clinic details -->
        </div>
    </div>

    <script>
        // Assume the data is received from the previous webpage and stored in a JavaScript object
        var clinicData = {
            name: "Clinic Name",
            location: "Clinic Location",
            licenseNumber: "License Number",
            image1: "image1.jpg", // Path to image 1
            image2: "image2.jpg"  // Path to image 2
        };

        // Function to display clinic details
        function displayClinicDetails() {
            var clinicDetailsContainer = document.getElementById('clinicDetails');

            // Create elements to display clinic details
            var nameElement = document.createElement('p');
            nameElement.textContent = "Clinic Name: " + clinicData.name;
            clinicDetailsContainer.appendChild(nameElement);

            var locationElement = document.createElement('p');
            locationElement.textContent = "Location: " + clinicData.location;
            clinicDetailsContainer.appendChild(locationElement);

            var licenseElement = document.createElement('p');
            licenseElement.textContent = "License Number: " + clinicData.licenseNumber;
            clinicDetailsContainer.appendChild(licenseElement);

            // Create image elements for the clinic's images
            var image1Element = document.createElement('img');
            image1Element.src = clinicData.image1;
            clinicDetailsContainer.appendChild(image1Element);

            var image2Element = document.createElement('img');
            image2Element.src = clinicData.image2;
            clinicDetailsContainer.appendChild(image2Element);
        }

        // Call the function to display clinic details when the page loads
        displayClinicDetails();
    </script>
</body>
</html>