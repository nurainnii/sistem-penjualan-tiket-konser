<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NgonserYu - Concert Ticket Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            --black: #000000;
            --dark-gray: #222222;
            --primary: #1DCD9F;
            --primary-dark: #169976;
        }
        
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--black);
            color: white;
            overflow-x: hidden;
        }
        
        .form-container {
            background-color: rgba(34, 34, 34, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            overflow: hidden;
        }
        
        .btn-primary {
            background-color: var(--primary);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(29, 205, 159, 0.4);
        }
        
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        .btn-primary:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
        
        .input-field {
            background-color: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(29, 205, 159, 0.2);
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .tab-active {
            color: var(--primary);
            position: relative;
        }
        
        .tab-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--primary);
            animation: slideIn 0.3s ease forwards;
        }
        
        @keyframes slideIn {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }
        
        .concert-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), 
                        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 800 800'%3E%3Cstyle%3E.st0%7Bfill:%23222222;%7D .st1%7Bfill:%231DCD9F;%7D%3C/style%3E%3Crect width='800' height='800' fill='%23000000'/%3E%3Cpath class='st1' d='M0,600 Q200,500 400,600 T800,600 L800,800 L0,800 Z' opacity='0.3'/%3E%3Ccircle class='st1' cx='700' cy='200' r='100' opacity='0.2'/%3E%3Ccircle class='st0' cx='100' cy='300' r='150' opacity='0.3'/%3E%3C/svg%3E");
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .concert-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(29, 205, 159, 0.1), transparent 70%);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .slide-up {
            animation: slideUp 0.5s ease forwards;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .music-wave {
            display: flex;
            align-items: flex-end;
            height: 30px;
            gap: 2px;
        }
        
        .music-wave span {
            width: 3px;
            background-color: var(--primary);
            border-radius: 3px;
            animation: wave 1.2s infinite ease-in-out;
        }
        
        .music-wave span:nth-child(1) { animation-delay: 0.0s; height: 10px; }
        .music-wave span:nth-child(2) { animation-delay: 0.1s; height: 15px; }
        .music-wave span:nth-child(3) { animation-delay: 0.2s; height: 20px; }
        .music-wave span:nth-child(4) { animation-delay: 0.3s; height: 25px; }
        .music-wave span:nth-child(5) { animation-delay: 0.4s; height: 30px; }
        .music-wave span:nth-child(6) { animation-delay: 0.5s; height: 25px; }
        .music-wave span:nth-child(7) { animation-delay: 0.6s; height: 20px; }
        .music-wave span:nth-child(8) { animation-delay: 0.7s; height: 15px; }
        .music-wave span:nth-child(9) { animation-delay: 0.8s; height: 10px; }
        
        @keyframes wave {
            0%, 100% { transform: scaleY(1); }
            50% { transform: scaleY(1.5); }
        }
        
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background-color: var(--primary);
            border-radius: 50%;
            opacity: 0.3;
            animation: fall linear infinite;
        }
        
        @keyframes fall {
            0% { transform: translateY(-100px); }
            100% { transform: translateY(100vh); }
        }
    </style>
<style>*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }/* ! tailwindcss v3.4.16 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}.pointer-events-none{pointer-events:none}.absolute{position:absolute}.relative{position:relative}.inset-y-0{top:0px;bottom:0px}.left-0{left:0px}.right-0{right:0px}.mx-auto{margin-left:auto;margin-right:auto}.mb-2{margin-bottom:0.5rem}.mb-5{margin-bottom:1.25rem}.mb-6{margin-bottom:1.5rem}.mb-8{margin-bottom:2rem}.mt-1{margin-top:0.25rem}.mt-2{margin-top:0.5rem}.mt-3{margin-top:0.75rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.block{display:block}.inline-block{display:inline-block}.flex{display:flex}.hidden{display:none}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-5{width:1.25rem}.w-full{width:100%}.max-w-md{max-width:28rem}.flex-1{flex:1 1 0%}.items-center{align-items:center}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.rounded-xl{border-radius:0.75rem}.border-b{border-bottom-width:1px}.border-t{border-top-width:1px}.border-gray-700{--tw-border-opacity:1;border-color:rgb(55 65 81 / var(--tw-border-opacity, 1))}.p-4{padding:1rem}.p-8{padding:2rem}.py-3{padding-top:0.75rem;padding-bottom:0.75rem}.pl-10{padding-left:2.5rem}.pl-3{padding-left:0.75rem}.pr-3{padding-right:0.75rem}.pr-4{padding-right:1rem}.pt-6{padding-top:1.5rem}.text-center{text-align:center}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xs{font-size:0.75rem;line-height:1rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.tracking-wider{letter-spacing:0.05em}.text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.transition-colors{transition-property:color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.hover\:text-gray-300:hover{--tw-text-opacity:1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.hover\:underline:hover{-webkit-text-decoration-line:underline;text-decoration-line:underline}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}</style></head>
<body>
    <div class="min-h-screen flex items-center justify-center p-4 concert-bg">
        <div class="particles" id="particles"><div class="particle" style="left: 35.3556%; width: 3.11622px; height: 3.11622px; opacity: 0.127741; animation-duration: 27.9786s; animation-delay: 3.55881s;"></div><div class="particle" style="left: 30.1229%; width: 2.19979px; height: 2.19979px; opacity: 0.155015; animation-duration: 24.216s; animation-delay: 2.33935s;"></div><div class="particle" style="left: 5.58245%; width: 3.6071px; height: 3.6071px; opacity: 0.368799; animation-duration: 21.6953s; animation-delay: 4.67725s;"></div><div class="particle" style="left: 87.7251%; width: 2.93075px; height: 2.93075px; opacity: 0.290501; animation-duration: 25.9677s; animation-delay: 3.84254s;"></div><div class="particle" style="left: 19.5396%; width: 3.67522px; height: 3.67522px; opacity: 0.238965; animation-duration: 20.4834s; animation-delay: 2.34545s;"></div><div class="particle" style="left: 76.9619%; width: 4.14443px; height: 4.14443px; opacity: 0.353501; animation-duration: 10.7652s; animation-delay: 0.0262581s;"></div><div class="particle" style="left: 98.2611%; width: 2.52257px; height: 2.52257px; opacity: 0.214557; animation-duration: 15.8691s; animation-delay: 1.61672s;"></div><div class="particle" style="left: 91.6088%; width: 5.16239px; height: 5.16239px; opacity: 0.297783; animation-duration: 17.6496s; animation-delay: 1.19923s;"></div><div class="particle" style="left: 93.5656%; width: 4.22767px; height: 4.22767px; opacity: 0.126351; animation-duration: 20.2264s; animation-delay: 4.91558s;"></div><div class="particle" style="left: 53.6428%; width: 4.01668px; height: 4.01668px; opacity: 0.114185; animation-duration: 25.8305s; animation-delay: 2.47005s;"></div><div class="particle" style="left: 7.67664%; width: 2.85857px; height: 2.85857px; opacity: 0.193308; animation-duration: 22.88s; animation-delay: 2.88815s;"></div><div class="particle" style="left: 21.1212%; width: 3.80439px; height: 3.80439px; opacity: 0.179052; animation-duration: 25.4256s; animation-delay: 4.25819s;"></div><div class="particle" style="left: 73.1825%; width: 5.4901px; height: 5.4901px; opacity: 0.321871; animation-duration: 16.2681s; animation-delay: 4.51182s;"></div><div class="particle" style="left: 90.1993%; width: 3.0308px; height: 3.0308px; opacity: 0.126932; animation-duration: 26.839s; animation-delay: 4.61289s;"></div><div class="particle" style="left: 60.4034%; width: 5.54666px; height: 5.54666px; opacity: 0.393837; animation-duration: 17.9786s; animation-delay: 1.69089s;"></div><div class="particle" style="left: 89.4572%; width: 2.25783px; height: 2.25783px; opacity: 0.34733; animation-duration: 23.7142s; animation-delay: 0.77973s;"></div><div class="particle" style="left: 21.0038%; width: 2.25061px; height: 2.25061px; opacity: 0.256184; animation-duration: 16.0931s; animation-delay: 4.01465s;"></div><div class="particle" style="left: 88.1088%; width: 5.59579px; height: 5.59579px; opacity: 0.352108; animation-duration: 21.0901s; animation-delay: 4.86755s;"></div><div class="particle" style="left: 21.0508%; width: 3.84598px; height: 3.84598px; opacity: 0.169577; animation-duration: 26.8196s; animation-delay: 0.573454s;"></div><div class="particle" style="left: 52.2239%; width: 2.17911px; height: 2.17911px; opacity: 0.395284; animation-duration: 27.4972s; animation-delay: 0.359934s;"></div><div class="particle" style="left: 81.987%; width: 2.96131px; height: 2.96131px; opacity: 0.318217; animation-duration: 22.3888s; animation-delay: 4.51357s;"></div><div class="particle" style="left: 22.1572%; width: 2.04481px; height: 2.04481px; opacity: 0.317238; animation-duration: 21.1028s; animation-delay: 4.34689s;"></div><div class="particle" style="left: 4.01171%; width: 4.04859px; height: 4.04859px; opacity: 0.299903; animation-duration: 11.6221s; animation-delay: 4.51306s;"></div><div class="particle" style="left: 16.4274%; width: 4.37375px; height: 4.37375px; opacity: 0.219911; animation-duration: 28.3129s; animation-delay: 1.60177s;"></div><div class="particle" style="left: 34.864%; width: 3.98111px; height: 3.98111px; opacity: 0.293139; animation-duration: 18.0724s; animation-delay: 4.91471s;"></div><div class="particle" style="left: 45.5446%; width: 4.83706px; height: 4.83706px; opacity: 0.168625; animation-duration: 23.5942s; animation-delay: 3.05434s;"></div><div class="particle" style="left: 93.7137%; width: 4.54352px; height: 4.54352px; opacity: 0.164299; animation-duration: 13.2655s; animation-delay: 3.51843s;"></div><div class="particle" style="left: 10.1719%; width: 4.56199px; height: 4.56199px; opacity: 0.103606; animation-duration: 24.3906s; animation-delay: 1.417s;"></div><div class="particle" style="left: 73.3167%; width: 3.50455px; height: 3.50455px; opacity: 0.185584; animation-duration: 18.4155s; animation-delay: 2.41387s;"></div><div class="particle" style="left: 44.8652%; width: 5.64137px; height: 5.64137px; opacity: 0.398121; animation-duration: 15.0313s; animation-delay: 2.79526s;"></div></div>
        
        <div class="form-container w-full max-w-md p-8 slide-up">
            <div class="text-center mb-8">
                <div class="inline-block floating">
                    <div class="music-wave mx-auto">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto mt-2">
                        <path d="M30 10C18.954 10 10 18.954 10 30C10 41.046 18.954 50 30 50C41.046 50 50 41.046 50 30C50 18.954 41.046 10 30 10ZM40 32.5C40 33.88 38.88 35 37.5 35H22.5C21.12 35 20 33.88 20 32.5V27.5C20 26.12 21.12 25 22.5 25H37.5C38.88 25 40 26.12 40 27.5V32.5ZM37.5 17.5H22.5C21.12 17.5 20 18.62 20 20C20 21.38 21.12 22.5 22.5 22.5H37.5C38.88 22.5 40 21.38 40 20C40 18.62 38.88 17.5 37.5 17.5ZM37.5 37.5H22.5C21.12 37.5 20 38.62 20 40C20 41.38 21.12 42.5 22.5 42.5H37.5C38.88 42.5 40 41.38 40 40C40 38.62 38.88 37.5 37.5 37.5Z" fill="#1DCD9F"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold mt-3 tracking-wider">NgonserYu</h1>
                <p class="text-gray-400 text-sm">Beli tiket konser favoritmu sekarang!</p>
            </div>
            
            <div class="flex mb-6 border-b border-gray-700">
                <button id="login-tab" class="tab-active flex-1 py-3 font-medium text-center focus:outline-none transition-all">Login</button>
                <button id="register-tab" class="flex-1 py-3 font-medium text-center text-gray-400 focus:outline-none transition-all">Register</button>
            </div>
            
            <!-- Login Form -->
            <div id="login-form" class="animate__animated animate__fadeIn">
                <form>
                    <div class="mb-5">
                        <label for="login-email" class="block text-sm font-medium mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input type="email" id="login-email" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="your@email.com" required="">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="login-password" class="block text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" id="login-password" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="••••••••" required="">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="toggle-password" class="text-gray-400 hover:text-gray-300 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-end mt-1">
                            <a href="#" class="text-sm text-gray-400 hover:text-primary transition-colors">Lupa password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary w-full py-3 rounded-xl font-medium text-white">
                        Login
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-400">Belum punya akun? <button id="switch-to-register" class="text-primary font-medium hover:underline">Register</button></p>
                </div>
            </div>
            
            <div id="register-form" class="hidden animate__animated">
                <form>
                    <div class="mb-5">
                        <label for="register-name" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="register-name" minlength="3" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="register-email" class="block text-sm font-medium mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input type="email" id="register-email" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="your@email.com" required="">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="register-password" class="block text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" id="register-password" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="••••••••" required="">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="toggle-register-password" class="text-gray-400 hover:text-gray-300 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Password minimal 8 karakter</p>
                    </div>
                    <button type="submit" class="btn-primary w-full py-3 rounded-xl font-medium text-white">
                        Buat Akun
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-400">Sudah punya akun? <button id="switch-to-login" class="text-primary font-medium hover:underline">Login</button></p>
                </div>
            </div>
            
            <div class="mt-8 pt-6 border-t border-gray-700 text-center">
                <p class="text-xs text-gray-500">Dengan melanjutkan, kamu menyetujui <a href="#" class="text-gray-400 hover:text-primary">Syarat &amp; Ketentuan</a> dan <a href="#" class="text-gray-400 hover:text-primary">Kebijakan Privasi</a> kami</p>
            </div>
        </div>
    </div>
    
    <script>
        // Create particles
        const particles = document.getElementById('particles');
        for (let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.width = `${Math.random() * 4 + 2}px`;
            particle.style.height = particle.style.width;
            particle.style.opacity = `${Math.random() * 0.3 + 0.1}`;
            particle.style.animationDuration = `${Math.random() * 20 + 10}s`;
            particle.style.animationDelay = `${Math.random() * 5}s`;
            particles.appendChild(particle);
        }
        
        // Tab switching functionality with animations
        const loginTab = document.getElementById('login-tab');
        const registerTab = document.getElementById('register-tab');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const switchToRegister = document.getElementById('switch-to-register');
        const switchToLogin = document.getElementById('switch-to-login');
        
        function showLoginForm() {
            registerForm.classList.add('animate__fadeOutRight');
            setTimeout(() => {
                registerForm.classList.add('hidden');
                registerForm.classList.remove('animate__fadeOutRight');
                loginForm.classList.remove('hidden');
                loginForm.classList.add('animate__fadeInLeft');
                setTimeout(() => {
                    loginForm.classList.remove('animate__fadeInLeft');
                }, 500);
            }, 300);
            
            loginTab.classList.add('tab-active');
            registerTab.classList.remove('tab-active');
            registerTab.classList.add('text-gray-400');
            loginTab.classList.remove('text-gray-400');
        }
        
        function showRegisterForm() {
            loginForm.classList.add('animate__fadeOutLeft');
            setTimeout(() => {
                loginForm.classList.add('hidden');
                loginForm.classList.remove('animate__fadeOutLeft');
                registerForm.classList.remove('hidden');
                registerForm.classList.add('animate__fadeInRight');
                setTimeout(() => {
                    registerForm.classList.remove('animate__fadeInRight');
                }, 500);
            }, 300);
            
            registerTab.classList.add('tab-active');
            loginTab.classList.remove('tab-active');
            loginTab.classList.add('text-gray-400');
            registerTab.classList.remove('text-gray-400');
        }
        
        loginTab.addEventListener('click', showLoginForm);
        registerTab.addEventListener('click', showRegisterForm);
        switchToRegister.addEventListener('click', showRegisterForm);
        switchToLogin.addEventListener('click', showLoginForm);
        
        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('login-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                `;
            } else {
                passwordInput.type = 'password';
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                `;
            }
        });
        
        document.getElementById('toggle-register-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('register-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                `;
            } else {
                passwordInput.type = 'password';
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                `;
            }
        });
        
        // Form submission with animations
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const button = this.querySelector('button[type="submit"]');
                const originalText = button.textContent.trim();
                
                // Add click animation
                button.classList.add('animate__animated', 'animate__pulse');
                
                // Show loading state with music wave animation
                button.innerHTML = `
                    <div class="music-wave mx-auto" style="height: 20px;">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                `;
                
                // Simulate API call
                setTimeout(() => {
                    button.innerHTML = `
                        <div class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Berhasil!
                        </div>
                    `;
                    button.style.backgroundColor = '#169976';
                    
                    // Create success confetti effect
                    createConfetti();
                    
                    // Reset after 2 seconds
                    setTimeout(() => {
                        button.textContent = originalText;
                        button.style.backgroundColor = '';
                        button.classList.remove('animate__animated', 'animate__pulse');
                        this.reset();
                    }, 2000);
                }, 1500);
            });
        });
        
        // Create confetti effect
        function createConfetti() {
            const container = document.querySelector('.form-container');
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.width = `${Math.random() * 10 + 5}px`;
                confetti.style.height = `${Math.random() * 5 + 5}px`;
                confetti.style.backgroundColor = i % 2 === 0 ? '#1DCD9F' : '#169976';
                confetti.style.borderRadius = '2px';
                confetti.style.left = `${Math.random() * 100}%`;
                confetti.style.top = '50%';
                confetti.style.opacity = Math.random();
                confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
                confetti.style.zIndex = '10';
                
                container.appendChild(confetti);
                
                // Animate confetti
                const animation = confetti.animate([
                    { transform: `translate(0, 0) rotate(${Math.random() * 360}deg)`, opacity: 1 },
                    { transform: `translate(${Math.random() * 100 - 50}px, ${Math.random() * -200 - 50}px) rotate(${Math.random() * 360}deg)`, opacity: 0 }
                ], {
                    duration: Math.random() * 1000 + 1000,
                    easing: 'cubic-bezier(0.1, 0.8, 0.3, 1)'
                });
                
                animation.onfinish = () => confetti.remove();
            }
        }
        
        // Input field animation
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-105');
                this.parentElement.style.transition = 'transform 0.3s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-105');
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9497627ad07ffcf3',t:'MTc0ODg3MTg1OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><iframe height="1" width="1" style="position: absolute; top: 0px; left: 0px; border: none; visibility: hidden;"></iframe>

</body></html>