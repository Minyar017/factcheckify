document
  .getElementById("forgotPasswordForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var email = document.getElementById("email").value;

    // You can add your validation logic here

    // Example: Check if email is not empty
    if (email.trim() === "") {
      showMessage("Veuillez entrer votre adresse emai.", "error");
      return false;
    }

    // Example: Check if email format is valid
    if (!isValidEmail(email)) {
      showMessage("Veuillez saisir une adresse e-mail valide.", "error");
      return false;
    }

    // If all validations pass, you can proceed further
    // Here, you can send a request to your backend for password reset

    // Example: Simulate sending a reset link
    setTimeout(function () {
      showMessage(
        "Un lien de réinitialisation du mot de passe a été envoyé à votre adresse e-mail..",
        "succès"
      );
      document.getElementById("forgotPasswordForm").reset();
    }, 2000);
  });

function showMessage(message, type) {
  var messageElement = document.getElementById("message");
  messageElement.textContent = message;
  messageElement.className = type; // Set class for styling
}

function isValidEmail(email) {
  // Simple email validation regex
  var emailRegex = /\S+@\S+\.\S+/;
  return emailRegex.test(email);
}
