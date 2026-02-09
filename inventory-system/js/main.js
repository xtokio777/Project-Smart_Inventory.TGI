// Main JavaScript for InventoryHub

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add scroll animation effects
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe cards and sections
document.querySelectorAll('.card, .stat-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// Mobile menu toggle (for future mobile implementation)
function toggleMobileMenu() {
    const menu = document.querySelector('.navbar-menu');
    menu.classList.toggle('active');
}

// Add loading animation to forms
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function() {
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.style.opacity = '0.7';
            submitBtn.style.pointerEvents = 'none';
        }
    });
});

// Console welcome message
console.log('%c InventoryHub ', 'background: #3b82f6; color: white; font-size: 20px; font-weight: bold; padding: 10px;');
console.log('%c Professional Asset Management System ', 'font-size: 14px; color: #64748b;');
