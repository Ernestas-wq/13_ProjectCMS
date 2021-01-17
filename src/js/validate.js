(function () {
  'use strict';
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.validated-form');
  const inputs = document.querySelectorAll('.form-control');
  // Loop over them and prevent submission
  Array.from(forms).forEach(function (form) {
    form.addEventListener(
      'submit',
      function (event) {
        inputs.forEach(input => {
          const value = input.value.trim();
          if (!value) {
            console.log('no input');
            event.preventDefault();
            event.stopPropagation();
          }
        });
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      },
      false
    );
  });
})();
