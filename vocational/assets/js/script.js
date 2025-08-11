function validate() {
  var name = document.forms.RegForm.Name.value;
  var email = document.forms.RegForm.EMail.value;
  var phone = document.forms.RegForm.Telephone.value;
  var city = document.forms.RegForm.City.value;

  var error_message = document.getElementById("error_message");
  error_message.style.padding = "10px";

  var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
  var regPhone = /^\d{10}$/;
  var regName = /\d+$/g;
  var regCity = /\d+$/g;

  var text;
  if (name == "" || regName.test(name)) {
    text = "Please Enter valid Name";
    error_message.innerHTML = text;
    return false;
  }

  if (email == "" || !regEmail.test(email)) {
    text = "Please Enter valid Email";
    error_message.innerHTML = text;
    return false;
  }

  if (phone == "" || !regPhone.test(phone)) {
    text = "Please Enter valid Mobile Number";
    error_message.innerHTML = text;
    return false;
  }

  if (city == "" || regCity.test(city)) {
    text = "Please Enter Correct City Name";
    error_message.innerHTML = text;
    return false;
  }
  error_message.style.display = "none";
  return true;
}
