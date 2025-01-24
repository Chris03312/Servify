(() => {
    'use strict';
  
    const forms = document.querySelectorAll('.needs-validation');
  
    forms.forEach((form) => {
      const currentPasswordInput = form.querySelector('#current-password');
      const newPasswordInput = form.querySelector('#new-password');
      const confirmPasswordInput = form.querySelector('#confirm-new-password');
  
      const passwordCriteria = {
        length: { regex: /.{8,16}/, message: '8-16 characters long', valid: false },
        uppercase: { regex: /[A-Z]/, message: 'At least one uppercase letter', valid: false },
        lowercase: { regex: /[a-z]/, message: 'At least one lowercase letter', valid: false },
        number: { regex: /\d/, message: 'At least one number', valid: false },
        special: { regex: /[@$!%*?&]/, message: 'At least one special character', valid: false },
      };
  
      const criteriaList = document.createElement('ul');
      criteriaList.classList.add('password-criteria');
      criteriaList.style.display = 'none';
  
      for (const key in passwordCriteria) {
        const li = document.createElement('li');
        li.id = `criteria-${key}`;
        li.textContent = passwordCriteria[key].message;
        li.style.color = 'red';
        criteriaList.appendChild(li);
      }
  
      newPasswordInput.parentNode.appendChild(criteriaList);
  
      // Validate current password
      currentPasswordInput.addEventListener('input', () => {
        const value = currentPasswordInput.value.trim();
        currentPasswordInput.setCustomValidity(value ? '' : 'This field is required');
      });
  
      // Show criteria and validate new-password on input
      newPasswordInput.addEventListener('input', () => {
        criteriaList.style.display = 'block';
        validateNewPassword();
      });
  
      // Hide criteria when the field is empty
      newPasswordInput.addEventListener('blur', () => {
        if (!newPasswordInput.value) {
          criteriaList.style.display = 'none';
        }
      });
  
      // Validate confirm-new-password on input
      confirmPasswordInput.addEventListener('input', validateConfirmPassword);
  
      // Function to validate new password
      function validateNewPassword() {
        const password = newPasswordInput.value;
        let allValid = true;
  
        for (const key in passwordCriteria) {
          const { regex } = passwordCriteria[key];
          const isValid = regex.test(password);
          passwordCriteria[key].valid = isValid;
  
          const criteriaElement = document.querySelector(`#criteria-${key}`);
          criteriaElement.style.color = isValid ? 'green' : 'red';
  
          if (!isValid) allValid = false;
        }
  
        // Set custom validity based on criteria
        newPasswordInput.setCustomValidity(allValid ? '' : 'Password does not meet all criteria');
      }
  
      // Function to validate confirm password
      function validateConfirmPassword() {
        if (newPasswordInput.value === confirmPasswordInput.value) {
          confirmPasswordInput.setCustomValidity('');
        } else {
          confirmPasswordInput.setCustomValidity('Passwords do not match');
        }
      }
  
      // Validate form on submit
      form.addEventListener('submit', (event) => {
        validateNewPassword(); // Ensure new-password is revalidated
        validateConfirmPassword(); // Ensure confirm-new-password is revalidated
  
        const allFieldsValid = form.checkValidity();
  
        // Check for empty or invalid fields
        form.querySelectorAll('input').forEach((input) => {
          const value = input.value.trim();
          if (value === '') {
            input.setCustomValidity('This field is required');
          }
        });
  
        if (allFieldsValid) {
          event.preventDefault();
          const modal = new bootstrap.Modal(document.getElementById('changePassConfirmationModal'));
          modal.show();
        } else {
          event.preventDefault();
          event.stopPropagation();
        }
  
        form.classList.add('was-validated');
      });
    });
  })();
  