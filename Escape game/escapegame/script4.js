var binaryNumbers = [];
var decodedWord = "";
var successValues = ["B", "I", "N", "A", "I", "R", "E"];

var table = document.getElementById("binaryTable");
var tbody = table.getElementsByTagName("tbody")[0];

var binaryDecoding = {
  "00010": 'B',
  "01001": 'I',
  "01110": 'N',
  "00001": 'A',
  "01001": 'I',
  "10010": 'R',
  "00101": 'E'
};

var currentInputIndex = 0;

function addBinaryNumber() {
  var binaryNumber = "";
  for (var i = 1; i <= 7; i++) {
    binaryNumber += document.getElementById("inputWord" + i).value;
  }

  if (binaryNumber.length === 7) {
    binaryNumbers.push(binaryNumber);

    var row = document.createElement("tr");
    var numberCell = document.createElement("td");
    var binaryCell = document.createElement("td");

    numberCell.textContent = binaryNumbers.length;
    binaryCell.textContent = binaryNumber;
    binaryCell.onclick = function() {
      fillInput(binaryNumber);
    };

    row.appendChild(numberCell);
    row.appendChild(binaryCell);

    tbody.appendChild(row);
    table.appendChild(tbody);

    for (var i = 1; i <= 7; i++) {
      document.getElementById("inputWord" + i).value = "";
    }

    checkSuccess(binaryNumber);
  } else {
    document.getElementById("result").innerHTML = "Le mot binaire doit comporter exactement 7 chiffres binaires. Veuillez réessayer.";
  }
}

function decodeBinary() {
  if (decodedWord === "") {
    var inputBinary = "";
    for (var i = 1; i <= 7; i++) {
      inputBinary += document.getElementById("inputWord" + i).value;
    }

    if (inputBinary.length === 7) {
      var letter = binaryDecoding[inputBinary];

      if (letter) {
        decodedWord = letter;
        binaryNumbers.push(inputBinary);

        var row = document.createElement("tr");
        var numberCell = document.createElement("td");
        var letterCell = document.createElement("td");
        var binaryCell = document.createElement("td");

        numberCell.textContent = binaryNumbers.length;
        letterCell.textContent = letter;
        binaryCell.textContent = inputBinary;
        binaryCell.onclick = function() {
          fillInput(inputBinary);
        };

        row.appendChild(numberCell);
        row.appendChild(letterCell);
        row.appendChild(binaryCell);

        tbody.appendChild(row);
        table.appendChild(tbody);

        for (var i = 1; i <= 7; i++) {
          document.getElementById("inputWord" + i).value = "";
        }

        document.getElementById("result").innerHTML = "Veuillez entrer le mot en binaire une seconde fois.";

        checkSuccess(inputBinary);
      } else {
        document.getElementById("result").innerHTML = "Le mot binaire est invalide. Veuillez réessayer.";
      }
    } else {
      document.getElementById("result").innerHTML = "Le mot binaire doit comporter exactement 7 chiffres binaires. Veuillez réessayer.";
    }
  } else {
    var inputBinary = "";
    for (var i = 1; i <= 7; i++) {
      inputBinary += document.getElementById("inputWord" + i).value;
    }

    if (inputBinary === binaryNumbers[binaryNumbers.length - 1]) {
      document.getElementById("result").innerHTML = "Félicitations ! Vous avez décrypté le mot binaire : " + decodedWord;
    } else {
      document.getElementById("result").innerHTML = "Le mot binaire est incorrect. Veuillez réessayer.";
    }
  }
}

function fillInput(binary) {
  var inputFields = document.getElementsByClassName("inputLetter");
  var currentInputField = inputFields[currentInputIndex];

  if (currentInputField.value === "") {
    currentInputField.value = binary;
    currentInputIndex++;
  }
}

function checkSuccess(inputBinary) {
  var isFormFilled = true;
  var inputFields = document.getElementsByClassName("inputLetter");

  for (var i = 0; i < inputFields.length; i++) {
    if (inputFields[i].value !== successValues[i]) {
      isFormFilled = false;
      break;
    }
  }

  if (isFormFilled) {
    document.getElementById("result").innerHTML = "Félicitations ! Vous avez rempli toutes les cases avec les bonnes valeurs.";
  } else {
    document.getElementById("result").innerHTML = "Le mot binaire est incorrect. Veuillez réessayer.";
  }
}


  if (isFormFilled) {
    document.getElementById("result").innerHTML = "Félicitations ! Vous avez rempli toutes les cases avec les bonnes valeurs.";
  } else {
    document.getElementById("result").innerHTML = "Le mot binaire est incorrect. Veuillez réessayer.";
  }

