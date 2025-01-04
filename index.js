document.getElementById('login-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  fetch('process.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      action: 'login',
      email: email,
      password: password
    })
  })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        document.getElementById('login-page').style.display = 'none';
        document.getElementById('change-password-page').style.display = 'block';
      } else {
        alert(data.message);
      }
    });
});

document.getElementById('change-password-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const newPassword = document.getElementById('new-password').value;
  const retypePassword = document.getElementById('retype-password').value;

  fetch('process.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      action: 'change_password',
      new_password: newPassword,
      retype_password: retypePassword
    })
  })
    .then(response => response.json())
    .then(data => {
      alert(data.message);
    });
});
