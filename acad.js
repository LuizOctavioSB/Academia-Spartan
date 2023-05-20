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

form.addEventListener('submit', function (e) {
  // prevent the form from submitting
  e.preventDefault();

  // validate forms
  let isUsernameValid = checkUsername();
  let isCPFValid = checkCPF();
  let isEmailValid = checkEmail();
  let isCursoValid = checkAtividade();
  let isFormValid = isUsernameValid && isCPFValid && isCursoValid && isEmailValid;

  if (isFormValid) {
    atividadesHTML = "";
    for (let i = 0; i < atividades.length; i++) {
      if (atividades[i].checked) {
        if (atividadesHTML != "") {
          atividadesHTML += ", ";
        }
        atividadesHTML += atividades[i].nextElementSibling.innerHTML;
      }
    }
    const div = document.createElement('div');
    div.innerHTML = `
      <p>É aluno?     ${document.querySelector('input[name="aluno"]:checked').value.trim()}</p>
      <p>Atividades:      ${atividadesHTML}</p>
      <p>CPF:         ${cpf.value.trim()}</p>
      <p>Nome:        ${nome.value.trim()}</p>
      <p>Email:       ${document.querySelector('#email').value.trim()}</p>
      <p>Nascimento:  ${document.querySelector('#Data').value.trim()}</p>
      <p>Telefone:   ${document.querySelector('#tel').value.trim()}</p>
      <p>Comentário:       ${document.querySelector('#coment').value.trim()}</p>
  `;
    mensagem.appendChild(div);
  }
});

$(document).ready(function() {
  // Hide all the images initially
  $("#fotos img").hide();

  // Function to display images one by one with a delay
  function displayImages() {
    var images = $("#fotos img");
    var index = 0;

    function showNextImage() {
      $(images[index]).fadeIn(500).delay(1500).fadeOut(500, function() {
        index++;
        if (index >= images.length) {
          index = 0; // Reinicia o índice para exibir as imagens novamente
        }
        showNextImage();
      });
    }

    showNextImage();
  }

  // Call the displayImages function
  displayImages();
});



