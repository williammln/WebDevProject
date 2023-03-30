function calculateBMI() {
  const heightInput = document.getElementById("height");
  const weightInput = document.getElementById("weight");
  const bmiIndicator = document.getElementById("bmi-indicator");
  const bmiResult = document.getElementById("bmi-result");

  const height = parseFloat(heightInput.value) / 100; // convert to meters
  const weight = parseFloat(weightInput.value);
  
  
  if (isNaN(height) || isNaN(weight) || height <= 0 || weight <= 0) {
    bmiResult.innerText = "Please enter valid height and weight values.";
    bmiIndicator.innerHTML = "";
    return;
  }

  const bmi = weight / (height * height);
  const roundedBMI = Math.round(bmi * 10) / 10;

  let bmiClass = "";
  let bmiImage = "";

  if (bmi < 18.5) {
    bmiClass = "underweight";
    bmiImage = "underweight.png";
  } else if (bmi < 25) {
    bmiClass = "normal";
    bmiImage = "normal.png";
  } else if (bmi < 30) {
    bmiClass = "overweight";
    bmiImage = "overweight.png";
  } else {
    bmiClass = "obese";
    bmiImage = "obese.png";
  }

  bmiIndicator.innerHTML = `<img src="${bmiImage}" alt="${bmiClass}">`;
  bmiResult.innerText = `Your BMI is ${roundedBMI} (${bmiClass}).`;
}


