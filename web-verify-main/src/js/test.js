const serviceTypeSelect = document.getElementById('service_type');
const maxPetsInput = document.getElementById('max_pets');
const numRoomsInput = document.getElementById('num_rooms');

serviceTypeSelect.addEventListener('change', () => {
  if (serviceTypeSelect.value === 'pet_sitting') {
    maxPetsInput.disabled = true;
    numRoomsInput.disabled = false;
  } else {
    maxPetsInput.disabled = false;
    numRoomsInput.disabled = true;
  }
});