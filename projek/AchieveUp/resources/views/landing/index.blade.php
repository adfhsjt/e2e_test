{{-- filepath: d:\Laravel\AchieveUp\resources\views\landing\index.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AchieveUp - Memberdayakan Masa Depan Melalui Pembelajaran</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="font-poppins antialiased">
    @include('landing.header')
    @include('landing.hero')
    @include('landing.stats')
    @include('landing.categories')
    @include('landing.leaderboard')
    @include('landing.cta')
    @include('landing.footer')

    @vite('resources/js/app.js')

    <script>
        // Initialize animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';

            // Initialize intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);

            // Observe all elements with animate-on-scroll class
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });
    </script>

    <style>
        /* Modern CSS Variables */
        :root {
            --primary-500: #6041CE;
            --primary-600: #513C99;
            --primary-50: #F2EFFE;
            --primary-100: #E6DBFF;

            --secondary-500: #03045E;
            --secondary-600: #023E8A;

            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-900: #111827;

            --success-500: #10B981;
            --warning-500: #F59E0B;
            --error-500: #EF4444;

            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;

            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);

            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-normal: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 500ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Modern Utility Classes */
        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-primary {
            background: linear-gradient(135deg, var(--primary-500) 0%, var(--primary-600) 100%);
        }

        .gradient-soft {
            background: linear-gradient(135deg, var(--primary-50) 0%, #FBFAFF 50%, var(--primary-50) 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--primary-500) 0%, var(--primary-600) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Container System - Optimized for 1920x1080 */
        .container-main {
            max-width: 1440px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .container-wide {
            max-width: 1600px;
            margin: 0 auto;
            padding-left: 3rem;
            padding-right: 3rem;
        }

        .container-narrow {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        /* Section Padding */
        .section-padding {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .section-padding-lg {
            padding-top: 8rem;
            padding-bottom: 8rem;
        }

        /* Animation Classes */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(2rem);
            transition: all var(--transition-slow);
        }

        .animate-on-scroll.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .hover-lift {
            transition: all var(--transition-normal);
        }

        .hover-lift:hover {
            transform: translateY(-0.25rem);
            box-shadow: var(--shadow-xl);
        }

        .hover-scale {
            transition: all var(--transition-normal);
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        /* Button Components - Updated with rounded-md */
        .btn-primary {
            @apply px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-md shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105;
        }

        .btn-secondary {
            @apply px-6 py-3 border-2 border-purple-600 text-purple-600 font-semibold rounded-md transition-all duration-300 hover:bg-purple-600 hover:text-white hover:scale-105;
        }

        .btn-white {
            @apply px-6 py-3 bg-white text-purple-600 font-semibold rounded-md shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 hover:bg-gray-50;
        }

        .btn-outline-white {
            @apply px-6 py-3 border-2 border-white text-white font-semibold rounded-md transition-all duration-300 hover:bg-white hover:text-purple-600 hover:scale-105;
        }

        .card-modern {
            @apply bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg transition-all duration-500 hover:shadow-2xl hover:scale-105;
        }

        /* Responsive breakpoints */
        @media (min-width: 1920px) {
            .container-main {
                max-width: 1600px;
                padding-left: 4rem;
                padding-right: 4rem;
            }

            .container-wide {
                max-width: 1800px;
                padding-left: 4rem;
                padding-right: 4rem;
            }
        }
    </style>
</body>

</html>
