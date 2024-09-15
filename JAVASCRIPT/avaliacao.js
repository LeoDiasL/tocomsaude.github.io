document.getElementById('enviarButton').addEventListener('click', function(event) {
    event.preventDefault();

    const mensagem = document.getElementById('mensagem').value.trim();
    const avaliacao = document.getElementById('avaliacao').value;

    let erros = [];

    if (mensagem === '') {
        erros.push('O campo "Escreva sua experiência" é obrigatório.');
    }

    if (avaliacao === '') {
        erros.push('Por favor, selecione uma nota para os serviços.');
    }

    if (erros.length > 0) {
        alert(erros.join('\n'));
    } else {
        alert('Feedback enviado com sucesso!');
    }
});