document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value.trim();
    const senha = document.getElementById('senha').value.trim();

    let erros = [];

    if (email === '') {
        erros.push('O campo "Email" é obrigatório.');
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        erros.push('Por favor, insira um email válido.');
    }

    if (senha === '') {
        erros.push('O campo "Senha" é obrigatório.');
    }

    if (erros.length > 0) {
        alert(erros.join('\n'));
    } else {
        alert('Login realizado com sucesso!');
    }
});