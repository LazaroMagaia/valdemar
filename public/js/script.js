function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("main-content");

  sidebar.classList.toggle("-translate-x-full"); // Abre/Fecha sidebar no mobile
  mainContent.classList.toggle("w-full"); // Expande conteúdo principal no mobile
  mainContent.classList.toggle("md:w-[calc(100%-16rem)]"); // Ajusta para espaço da sidebar no desktop
}

function toggleDropdown(dropdownId) {
  const dropdown = document.getElementById(dropdownId);
  dropdown.classList.toggle("hidden");
}



function closeNotification() {
  const notification = document.getElementById('notification');
  notification.style.opacity = '0';  // Oculta a notificação
}
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
