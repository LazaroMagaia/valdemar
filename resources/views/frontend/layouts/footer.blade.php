
<script>
    // Função para controlar o progresso e ocultar a notificação automaticamente após o tempo
function startProgress() {
  const progressBar = document.getElementById('progressBar');
  let width = 0; // Começa em 0%
  const interval = 80; // Intervalo de 80ms para incrementar a largura
  const totalTime = 8000; // Duração total em milissegundos
  const increment = (100 / (totalTime / interval)); // Incremento em porcentagem

  const timer = setInterval(() => {
      if (width >= 100) {
          clearInterval(timer); // Para a animação ao alcançar 100%
          setTimeout(() => {
              closeNotification(); // Fecha a notificação após o progresso
          }, 500); // Adiciona um pequeno atraso antes de fechar
      } else {
          width += increment; // Aumenta a largura
          progressBar.style.width = width + '%'; // Atualiza a largura da barra
      }
  }, interval);
}

// Inicia o progresso ao carregar
window.onload = startProgress;

</script>

<footer class="bg-gray-800 text-white p-4 mt-8 bottom-0">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Vagas de Emprego. Todos os direitos reservados.</p>
    </div>
</footer>