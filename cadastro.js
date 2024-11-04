// Função para mostrar a próxima etapa
function mostrarEtapaProxima(etapa) {
    // Esconder todas as etapas
    const etapas = document.querySelectorAll('.etapa');
    etapas.forEach(function(element) {
        element.classList.remove('ativa');
    });

    // Mostrar a etapa correta
    document.getElementById('etapa' + etapa).classList.add('ativa');
}

// Mostrar a primeira etapa ao carregar a página
document.addEventListener('DOMContentLoaded', function() {
    mostrarEtapaProxima(1);
});