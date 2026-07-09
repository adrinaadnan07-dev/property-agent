document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('navbarToggle');
    const navMenu = document.getElementById('navbarMenu');

    if (toggleBtn && navMenu) {
        toggleBtn.addEventListener('click', function() {
            navMenu.classList.toggle('show');
        });

        document.addEventListener('click', function(e) {
            if (!toggleBtn.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('show');
            }
        });
    }

    const inquiryForm = document.querySelector('.contact-form');
    if (inquiryForm) {
        inquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghantar...';
            submitBtn.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.whatsapp_url) {
                    window.open(data.whatsapp_url, '_blank');
                    this.reset();
                }
            })
            .catch(err => {
                console.error('Error:', err);
                alert('Ralat berlaku. Sila cuba lagi.');
            })
            .finally(() => {
                submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Hantar';
                submitBtn.disabled = false;
            });
        });
    }

    const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.project-card, .feature-card, .service-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});
