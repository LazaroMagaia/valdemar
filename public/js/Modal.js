document.addEventListener('DOMContentLoaded', () => {
    const modals = document.querySelectorAll('.modal');
    const openModalButtons = document.querySelectorAll('[data-modal-target]');
    const closeModalButtons = document.querySelectorAll('.modal-close');

    const showModal = (modal) => {
        modal.classList.remove('opacity-0', 'pointer-events-none', 'scale-90');
        modal.classList.add('opacity-100', 'scale-100');
    };

    const hideModal = (modal) => {
        modal.classList.remove('opacity-100', 'scale-100');
        modal.classList.add('opacity-0', 'pointer-events-none', 'scale-90');
    };

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetModal = document.querySelector(button.getAttribute('data-modal-target'));
            showModal(targetModal);
        });
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal');
            hideModal(modal);
        });
    });

    window.addEventListener('click', (event) => {
        if (event.target.classList.contains('modal')) {
            hideModal(event.target);
        }
    });
});