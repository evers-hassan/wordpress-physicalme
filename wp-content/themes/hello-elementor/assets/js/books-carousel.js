document.addEventListener('DOMContentLoaded', function() {
  const carousels = document.querySelectorAll('.pm-books-carousel-wrapper');

  carousels.forEach(carousel => {
    const grid = carousel.querySelector('.pm-books-grid');
    const prevBtn = carousel.querySelector('.pm-books-scroll-btn.prev');
    const nextBtn = carousel.querySelector('.pm-books-scroll-btn.next');

    if (!grid || !prevBtn || !nextBtn) return;

    const scrollAmount = 300;
    let touchStartX = 0;
    let touchEndX = 0;

    function updateButtonStates() {
      const isAtStart = grid.scrollLeft === 0;
      const isAtEnd = Math.abs(grid.scrollWidth - grid.scrollLeft - grid.clientWidth) < 10;

      prevBtn.disabled = isAtStart;
      nextBtn.disabled = isAtEnd;

      updatePaginationDots();
    }

    function createPaginationDots() {
      const cards = grid.querySelectorAll('.pm-book-card');
      const cardWidth = cards[0].offsetWidth + 20; // width + gap
      const visibleCards = Math.round(grid.clientWidth / cardWidth);
      const totalPages = Math.ceil(cards.length / Math.max(1, visibleCards));

      if (totalPages <= 1) return;

      const paginationContainer = document.createElement('div');
      paginationContainer.className = 'pm-books-pagination';

      for (let i = 0; i < totalPages; i++) {
        const dot = document.createElement('button');
        dot.className = 'pm-books-dot';
        if (i === 0) dot.classList.add('active');

        dot.addEventListener('click', () => {
          const scrollPos = i * cardWidth * Math.max(1, visibleCards);
          grid.scrollTo({ left: scrollPos, behavior: 'smooth' });
          setTimeout(updateButtonStates, 300);
        });

        paginationContainer.appendChild(dot);
      }

      carousel.appendChild(paginationContainer);
      carousel.paginationContainer = paginationContainer;
    }

    function updatePaginationDots() {
      const paginationContainer = carousel.paginationContainer;
      if (!paginationContainer) return;

      const dots = paginationContainer.querySelectorAll('.pm-books-dot');
      const cards = grid.querySelectorAll('.pm-book-card');
      const cardWidth = cards[0].offsetWidth + 20;
      const visibleCards = Math.max(1, Math.round(grid.clientWidth / cardWidth));
      const currentPage = Math.round(grid.scrollLeft / (cardWidth * visibleCards));

      dots.forEach((dot, index) => {
        dot.classList.remove('active');
        if (index === currentPage) {
          dot.classList.add('active');
        }
      });
    }

    // Touch/Swipe functionality
    grid.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, false);

    grid.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    }, false);

    function handleSwipe() {
      const swipeThreshold = 50;
      const diff = touchStartX - touchEndX;

      if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
          // Swiped left, scroll right
          nextBtn.click();
        } else {
          // Swiped right, scroll left
          prevBtn.click();
        }
      }
    }

    // Button clicks
    prevBtn.addEventListener('click', () => {
      grid.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
      setTimeout(updateButtonStates, 300);
    });

    nextBtn.addEventListener('click', () => {
      grid.scrollBy({ left: scrollAmount, behavior: 'smooth' });
      setTimeout(updateButtonStates, 300);
    });

    grid.addEventListener('scroll', updateButtonStates);
    grid.addEventListener('touchend', updateButtonStates);

    // Initial setup
    createPaginationDots();
    updateButtonStates();

    // Update on window resize
    window.addEventListener('resize', () => {
      updateButtonStates();
    });
  });
});
