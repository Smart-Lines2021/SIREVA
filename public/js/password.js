function getPassword() {
    var password_length = 12;
    var allowedValuesString = '';
    var uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var lowercase = 'abcdefghijklmnopqrstuvwxyz';
    var numbers = '0123456789';
    var symbols = '!@#$%^&amp;*()_+';
    allowedValuesString += uppercase + lowercase + numbers + symbols;
    let password = '';
    for (let i = 0; i < password_length; i++) {
        let random = Math.floor(Math.random() * allowedValuesString.length);
        password += allowedValuesString[random];
    }
    return password;
}

function mostrarPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }