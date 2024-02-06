// login.js
document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (!username || !password) {
      alert("Por favor, preencha todos os campos.");
      return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "insert_user.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          alert(xhr.responseText);
          // Você pode redirecionar o usuário para outra página após o login bem-sucedido, se necessário.
        } else {
          alert("Erro: " + xhr.statusText);
        }
      }
    };

    // Envie os dados no formato URL-encoded
    const formData = `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`;
    xhr.send(formData);
  });
