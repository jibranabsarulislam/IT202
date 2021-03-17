function passVisToggle() {
  var passEntry = document.getElementById("pass");
  var check = document.getElementById("check");
  if (passEntry.type === "password") {
    passEntry.type = "text";
    check.checked = true;
  } else {
    passEntry.type = "password";
    check.checked = false;
  }
}

function toggleTran() {
  var choice = document.getElementById("listTransactions");
  var div = document.getElementById("listTran");
  if (choice.checked) {
    document.getElementById("accNum").required = true;
    document.getElementById("numTran").required = true;
    div.style.display = "block";
  } else {
    document.getElementById("accNum").required = false;
    document.getElementById("numTran").required = false;
    div.style.display = "none";
  }
}

function toggleClear() {
  var clear = document.getElementById("clear");
  var divi = document.getElementById("clearAcc");
  if (clear.checked) {
    divi.style.display = "block";
  } else {
    divi.style.display = "none";
  }
}

function enableButton() {
  var but = document.getElementById("submitChoice");
  but.disabled = false;
}

function clearClear() {
  var toClear = document.getElementById("clearAccNum");
  toClear.value = "";
}
function clearLT() {
  var toClear = document.getElementById("accNum");
  toClear.value = "";
  toClear = document.getElementById("numTran");
  toClear.value = "";
}
