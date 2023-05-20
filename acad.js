const nome = document.getElementById('nome');
const cpf = document.getElementById('cpf');
const mensagem = document.getElementById('mensagem');
const atividades = document.getElementsByName("exercicio");
const email = document.getElementById('email');
const form = document.getElementById('form');

const checkUsername = () => {
  let valid = false;
  const username = nome.value.trim();

  if (username == "") {
      showError(nome, 'Nome não pode ser em Branco.');
  } else if (username.trim().indexOf(' ') == -1) {
      showError(nome, 'Nome deve conter sobrenome.');
  } else {
      showSuccess(nome);
      valid = true;
  }
  return valid;
}

const checkCPF = () => {

  let valid = false;
  const cpfN = cpf.value.trim();

  if (cpfN == "") {
      showError(cpf, 'CPF não pode ser em Branco.');
  } else if (cpfN.replace(/\D/g, '').length != 11) {
      showError(cpf, 'CPF deve conter 11 caracteres');
  } else {
      showSuccess(cpf);
      valid = true;
  }
  return valid;
}

const checkAtividade = () => {

  let valid = false;

  for (let i = 0; i < atividades.length; i++) {
      atividades[i].parentElement.classList.remove('error');
      if (atividades[i].checked) {
          showSuccess(atividades[i]);
          valid = true;
      }
  }

  if (!valid) {
      for (let i = 0; i < atividades.length; i++) {
          showError(atividades[i], 'Um curso deve ser selecionado.');
      }
  }

  return valid;
}

const checkEmail = () => {
  let valid = false;
  const emailValue = email.value.trim();

  // verifica se o email contém o '@' a partir da segunda posição
  const atIndex = emailValue.indexOf('@');
  const dotIndex = emailValue.indexOf('.', atIndex);
  if (emailValue == "") {
      showError(email, 'Email não pode ser vazio');
  } else if (atIndex < 1) {
      showError(email, 'Email deve conter o "@" a partir da segunda posição.');
  } else if (dotIndex === -1 || dotIndex < (atIndex + 2) || dotIndex === emailValue.length - 1) {
      showError(email, 'Email deve conter um "." pelo menos duas posições após o "@" e não pode ser o último dígito.');
  } else {
      showSuccess(email);
      valid = true;
  }
  return valid;
}

const showError = (input, message) => {
  // get the form-field element
  const formField = input.parentElement;
  // add the error class
  formField.classList.remove('success');
  formField.classList.add('error');

  // show the error message
  const error = formField.querySelector('small');
  error.textContent = message;
};

const showSuccess = (input) => {
  // get the form-field element
  const formField = input.parentElement;

  // remove the error class
  formField.classList.remove('error');
  formField.classList.add('success');

  // hide the error message
  const error = formField.querySelector('small');
  error.textContent = '';
}

$(document).ready(function() {
  $('input[name="exercicio"]').on('click', function() {
    var selectedValue = $(this).val();
    var placeholderText = '';

    switch (selectedValue) {
      case 'Dança':
        placeholderText = 'Digite sua dúvida sobre dança';
        break;
      case 'musculação':
        placeholderText = 'Digite sua dúvida sobre musculação';
        break;
      case 'Spinning':
        placeholderText = 'Digite sua dúvida sobre spinning';
        break;
    }

    $('#coment').attr('placeholder', placeholderText);

    if ($(this).is(':checked')) {
      $('#Comentario').show();
    } else {
      $('#Comentario').hide();
    }
  });
});


function showNextImage() {
  var images = $("#fotos img");
  var currentIndex = 0;

  function fadeOutCurrentImage() {
    images.eq(currentIndex).fadeOut(500, function() {
      fadeInNextImage();
    });
  }

  function fadeInNextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    images.eq(currentIndex).fadeIn(500, function() {
      setTimeout(fadeOutCurrentImage, 1500);
    });
  }

  fadeOutCurrentImage();
}

$(document).ready(function() {
  showNextImage();
});
