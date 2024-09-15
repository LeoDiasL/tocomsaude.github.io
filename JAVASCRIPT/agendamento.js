document.getElementById('agendarButton').addEventListener('click', function(event) {
    event.preventDefault();

    const data = document.getElementById('data').value;
    const especialidades = document.getElementById('especialidades').value;

    let erros = [];

    if (!data) {
        erros.push('Por favor, selecione uma data.');
    }

    if (!especialidades) {
        erros.push('Por favor, selecione uma especialidade.');
    }

    if (erros.length > 0) {
        alert(erros.join('\n'));
    } else {
        alert('Consulta agendada com sucesso!');
    }
});