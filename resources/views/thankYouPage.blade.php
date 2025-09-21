<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شكراً لك - تأكيد الطلب</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .checkmark {
            stroke: #10b981;
            stroke-width: 3px;
            stroke-linecap: round;
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: draw 1s ease-in-out forwards;
        }

        @keyframes draw {
            to {
                stroke-dashoffset: 0;
            }
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            opacity: 0;
            animation: fall 3s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full text-center overflow-hidden">
        <!-- Confetti Container -->
        <div id="confetti-container" class="relative"></div>

        <!-- Checkmark Animation -->
        <div class="flex justify-center my-6">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="40" cy="40" r="35" fill="#fff" stroke="#10b981" stroke-width="3" />
                <path class="checkmark" d="M25 40l10 10 20-20" />
            </svg>
        </div>

        <!-- Thank You Message -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">شكراً لك!</h1>
        <p class="text-lg text-gray-600 mb-6 px-4">تم إنشاء طلبك بنجاح. سنقوم بمعالجته قريباً.</p>


        <!-- Product Image -->
        <div class="px-4 mb-6">
            <img src="{{ asset('assets/images/thanks.png') }}"
                alt="Modern order confirmation graphic depicting a successful e-commerce transaction with a sleek package icon, green checkmark, and confetti background in a clean, minimalist style"
                class="w-full h-auto rounded-lg shadow-md" />
        </div>

        <!-- Call to Action -->
        <div class="px-4 pb-6">
            <button onclick="window.location.href='{{ route('home') }}'"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                متابعة التسوق
            </button>
        </div>
    </div>

    <script>
        // Confetti Animation
        function createConfetti() {
            const container = document.getElementById('confetti-container');
            const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#f7dc6f', '#bb8fce'];
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.classList.add('confetti');
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 3 + 's';
                container.appendChild(confetti);
                setTimeout(() => {
                    container.removeChild(confetti);
                }, 3000);
            }
        }
        // Trigger confetti on page load
        window.onload = () => {
            createConfetti();
        };
    </script>
</body>

</html>
</content>
</create_file>
