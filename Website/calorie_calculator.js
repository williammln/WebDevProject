// get the form element
const form = document.querySelector('form');

// add event listener for form submit
form.addEventListener('submit', function(e) {
  // prevent the form from submitting
  e.preventDefault();

  // get the user input values
  const genderRadio = document.querySelector('input[name="gender"]:checked');
  const gender = genderRadio ? genderRadio.value : null;
  const age = parseInt(document.querySelector('#age').value);
  const height = parseInt(document.querySelector('#height').value);
  const weight = parseInt(document.querySelector('#weight').value);
  const activityLevel = parseFloat(document.querySelector('#activity-level').value);
  const goalRadio = document.querySelector('input[name="goal"]:checked');
  const goal = goalRadio ? goalRadio.value : null;

  console.log('gender:', gender);
  console.log('age:', age);
  console.log('height:', height);
  console.log('weight:', weight);
  console.log('activityLevel:', activityLevel);
  console.log('goal:', goal);

  // calculate the BMR
  let bmr = 0;
  if (gender === 'male') {
    bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
  } else {
    bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
  }

  console.log('bmr:', bmr);

  // calculate the TDEE
  const tdee = bmr * activityLevel;

  console.log('tdee:', tdee);

  // calculate the calorie goal based on the user's goal
  let calorieGoal = 0;
  if (goal === 'lose') {
    calorieGoal = tdee - 500;
  } else if (goal === 'gain') {
    calorieGoal = tdee + 500;
  } else {
    calorieGoal = tdee;
  }

  console.log('calorieGoal:', calorieGoal);

  // display the results
  const resultsContainer = document.querySelector('#result');
  resultsContainer.style.display = 'block';
  console.log('resultsContainer:', resultsContainer);
  resultsContainer.innerHTML = `
    <h2>Your Results</h2>
    <div class="result-item">
      <span>BMR:</span>
      <span>${bmr.toFixed(2)}</span>
    </div>
    <div class="result-item">
      <span>TDEE:</span>
      <span>${tdee.toFixed(2)}</span>
    </div>
    <div class="result-item">
      <span>Calorie Goal:</span>
      <span>${calorieGoal.toFixed(2)}</span>
    </div>
  `;
});

