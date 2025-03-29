// Regex pour la modification de l'utilisateur
function validateFormModifier() {
    resetErrorMessages();

    var username = document.getElementById("username").value;
    if (username.trim() === "") {
        document.getElementById("errorEmptyUsername").style.display = "block";
        return false;
    }

    if (username.length < 6 || username.length > 18) {
        document.getElementById("errorLenUsername").style.display = "block";
        return false;
    }

    if (/[^a-zA-Z0-9]/.test(username)) {
        document.getElementById("errorSpecialCharUsername").style.display = "block";
        return false;
    }
    
    var firstName = document.getElementById("firstName").value
    if (firstName.trim() === "") {
        document.getElementById("errorEmptyFirstName").style.display = "block";
        return false;
    }

    if(!/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{1,50}$/.test(firstName)) {
        document.getElementById("errorFirstName").style.display = "block";
        return false;
    }
    
    var lastName = document.getElementById("lastName").value
    if (lastName.trim() === "") {
        document.getElementById("errorEmptyLastName").style.display = "block";
        return false;
    }

    if(!/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{1,50}$/.test(lastName)) {
        document.getElementById("errorLastName").style.display = "block";
        return false;
    }
    
    var phoneNumber = document.getElementById("phoneNumber").value
    if (phoneNumber.trim() === "") {
        document.getElementById("errorEmptyPhoneNumber").style.display = "block";
        return false;
    }

    if(!/^0\d(\s\d{2}){4}$/.test(phoneNumber)) {
        document.getElementById("errorPhoneNumber").style.display = "block";
        return false;
    }

    var address = document.getElementById("address").value
    if (address.trim() === "") {
        document.getElementById("errorEmptyAddress").style.display = "block";
        return false;
    }

    var postalCode = document.getElementById("postalCode").value
    if (postalCode.trim() === "") {
        document.getElementById("errorEmptyPostalCode").style.display = "block";
        return false;
    }

    if(!/^((0[1-9])|([1-8][0-9])|(9[0-5])|(2[abAB]))[0-9]{3}$/.test(postalCode)) {
        document.getElementById("errorPostalCode").style.display = "block";
        return false;
    }

    var selectedRole = document.querySelector('.toggle-btn.selected');
    if (!selectedRole) {
        document.getElementById("errorEmptyRole").style.display = "block";
        return false;
    }

    return true;
}

// Fonction pour cacher les messages d'erreur au chargement de la page
function resetErrorMessages() {
    document.getElementById("errorEmptyUsername").style.display = "none";
    document.getElementById("errorLenUsername").style.display = "none";
    document.getElementById("errorSpecialCharUsername").style.display = "none";
    document.getElementById("errorEmptyFirstName").style.display = "none";
    document.getElementById("errorFirstName").style.display = "none";
    document.getElementById("errorEmptyLastName").style.display = "none";
    document.getElementById("errorLastName").style.display = "none";
    document.getElementById("errorEmptyPhoneNumber").style.display = "none";
    document.getElementById("errorPhoneNumber").style.display = "none";
    document.getElementById("errorEmptyAddress").style.display = "none";
    document.getElementById("errorEmptyPostalCode").style.display = "none";
    document.getElementById("errorPostalCode").style.display = "none";
}   

// Fonction pour charger le rôle de l'utilisateur
switch (document.getElementById('role').dataset.role) {
    case "Admin":
        document.getElementById('role-admin').classList.add('selected');
        break;
    case "User":
        document.getElementById('role-user').classList.add('selected');
        break;
}
