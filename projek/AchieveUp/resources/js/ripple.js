document.addEventListener("DOMContentLoaded", function () {
    // Menambahkan efek ripple saat tombol diklik
    const buttons = document.querySelectorAll(".button-primary, .button-secondary");

    buttons.forEach(button => {
        button.addEventListener("click", function (e) {
            const rect = button.getBoundingClientRect();
            const ripple = document.createElement("span");
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            ripple.classList.add("ripple");
            button.appendChild(ripple);

            // Hapus ripple setelah animasi selesai
            ripple.addEventListener("animationend", () => {
                ripple.remove();
            });
        });
    });
});