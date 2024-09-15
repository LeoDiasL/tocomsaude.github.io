    document.getElementById('formulario').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const nome = document.getElementById('nome').value.trim();
    const nascimento = document.getElementById('nascimento').value.trim();
    const rg = document.getElementById('rg').value.trim();
    const telefone = document.getElementById('telefone').value.trim();
    const email = document.getElementById('email').value.trim();
    const senha = document.getElementById('senha').value.trim();

    let erros = [];

    if (nome === '') {
        erros.push('O campo Nome é obrigatório.');
    }

    if (nascimento === '' || !/^\d{2}\/\d{2}\/\d{4}$/.test(nascimento)) {
        erros.push('A Data de Nascimento deve estar no formato DD/MM/AAAA.');
    }

    if (rg === '' || !/^\d{8}-\d{1}$/.test(rg)) {
        erros.push('O RG deve estar no formato 00000000-0.');
    }

    if (telefone === '' || !/^\(\d{2}\)\d{5}-\d{4}$/.test(telefone)) {
        erros.push('O Telefone deve estar no formato (00)00000-0000.');
    }


    if (email === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        erros.push('O Email deve ser um endereço de e-mail válido.');
    }

    if (senha === '') {
        erros.push('O campo Senha é obrigatório.');
    }

    if (erros.length > 0) {
        alert(erros.join('\n'));
    } else {
        alert('Formulário enviado com sucesso!');
    }
});
