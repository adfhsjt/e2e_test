<section class="relative -mt-16 z-10">
    <div class="container-narrow">
        <div
            class="flex flex-col lg:flex-row w-full max-w-4xl mx-auto px-8 py-8 items-center gap-6 rounded-3xl gradient-primary shadow-2xl animate-on-scroll">
            <div class="flex flex-col items-center gap-2 flex-1 group hover-scale cursor-default">
                <p class="text-3xl lg:text-4xl font-bold text-white counter" data-target="1000">0</p>
                <p class="text-sm lg:text-base font-medium text-white/90 text-center">Mahasiswa Berprestasi</p>
            </div>

            <div class="w-full h-px lg:w-px lg:h-14 bg-white/30"></div>

            <div class="flex flex-col items-center gap-2 flex-1 group hover-scale cursor-default">
                <p class="text-3xl lg:text-4xl font-bold text-white counter" data-target="4">0</p>
                <p class="text-sm lg:text-base font-medium text-white/90 text-center">Program Studi</p>
            </div>

            <div class="w-full h-px lg:w-px lg:h-14 bg-white/30"></div>

            <div class="flex flex-col items-center gap-2 flex-1 group hover-scale cursor-default">
                <p class="text-3xl lg:text-4xl font-bold text-white counter" data-target="500">0</p>
                <p class="text-sm lg:text-base font-medium text-white/90 text-center">Prestasi Tercatat</p>
            </div>
        </div>
    </div>
</section>

<script>
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + (target >= 100 ? '+' : '');
        }, 16);
    }

    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.counter');
                counters.forEach((counter, index) => {
                    setTimeout(() => animateCounter(counter), index * 200);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });

    document.addEventListener('DOMContentLoaded', () => {
        const statsSection = document.querySelector('.counter').closest('section');
        if (statsSection) statsObserver.observe(statsSection);
    });
</script>
