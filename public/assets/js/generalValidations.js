const Validator = function () {
  return {
    generalValidation: (id, rules, messages) => {
      //Recupero el formulario del DOM
      const form = $(`#${id}`);
      form.validate({
        rules,
        messages,
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.insertAfter(element);
          error.addClass('invalid-feedback');
          // element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        },
        submitHandler: function (form) {
          return true;
        }
      })
    }
  }
}();