<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Vagas de Emprego</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
        function searchJobs() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const jobCards = document.querySelectorAll('.job-card');
            const noResultsMessage = document.getElementById('no-results-message');

            let hasResults = false;

            jobCards.forEach(card => {
                const jobTitle = card.querySelector('.job-title').textContent.toLowerCase();
                const jobType = card.querySelector('.job-type').textContent.toLowerCase();

                if (jobTitle.includes(searchInput) || jobType.includes(searchInput)) {
                    card.classList.remove('hidden');
                    hasResults = true;
                } else {
                    card.classList.add('hidden');
                }
            });

            // Exibir ou ocultar a mensagem de resultados
            if (hasResults) {
                noResultsMessage.classList.add('hidden');
            } else {
                noResultsMessage.classList.remove('hidden');
            }
        }
    </script>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body>