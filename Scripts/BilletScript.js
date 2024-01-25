
function Onstart(){ 
    var myButton = document.getElementById("SubmitButton");
    var Resume = document.getElementById("ResumeCommande");
    Resume.style.display = "none"
    myButton.style.display = "none";

}

document.addEventListener("DOMContentLoaded", function() {
    // Get references to the input field and the button
    var inputField = document.getElementById("name");
    var myButton = document.getElementById("SubmitButton");
    // Add an event listener to the input field
    inputField.addEventListener("input", function() {
      // Check if the input field is empty
      if (inputField.value.trim() === "") {
        // If it's empty, hide the button
        myButton.style.display = "none";
      } else {
        // If there is input, show the button
        myButton.style.display = "block";
      }
  });


  myButton.addEventListener("click", function() {
    // Call your JavaScript function here
    yourFunction();
  });

  // Example function to be called on button click
  function yourFunction() {
    var Resume = document.getElementById("ResumeCommande");
    Resume.style.display = "block"
    // Add your custom functionality here
  }
});



function submitForm() {
  // Gather form data

  var formData = {
      user_name: document.getElementById('name').value,
      nombre_de_place: document.getElementById('nbplace').value,
      type_pass: document.querySelector('input[name="type-normale"]:checked') ? '0' : '1',
      jours: {
          vendredi: document.getElementById('jour1').checked,
          samedi: document.getElementById('jour2').checked,
          dimanche: document.getElementById('jour3').checked
      },
      user_message: document.getElementById('msg').value
  };

  var data= JSON.stringify(formData);
  request = new XMLHttpRequest();
  request.open("POST","./PHP/Billet.php",true);
  request.setRequestHeader("Content-Type","application/json");

  request.onreadystatechange = function () {
    if (request.readyState === XMLHttpRequest.DONE) {
        if (request.status === 200) {
            // Success! You can handle the response here
            console.log('Success:', request.responseText);
        } else {
            // Error handling
            console.error('Error:', request.status, request.statusText);
        }
    }
  };

  request.send(data);
}

function showSummary() {
  // Get values from form fields and construct a summary
  var name = document.getElementById("name").value;
  var nbplace = document.getElementById("nbplace").value;
  var typepass = document.getElementById("type-pass1").checked ? "0" : "1";
  var jours = [];
  if (document.getElementById("jour1").checked) jours.push("Vendredi");
  if (document.getElementById("jour2").checked) jours.push("Samedi");
  if (document.getElementById("jour3").checked) jours.push("Dimanche");
  var msg = document.getElementById("msg").value;

  // Create a summary string
  var summary = "Nom: " + name + "<br>";
  summary += "Nombre de places: " + nbplace + "<br>";
  summary += "Type de pass: " + typepass + "<br>";
  summary += "Jours sélectionnés: " + jours.join(", ") + "<br>";
  summary += "Commentaire: " + msg;

  submitForm();
  // Display the summary in the <p> element
  document.getElementById("ResumeCommande").innerHTML  = summary;




  
}