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

<style>
    *, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }/* ! tailwindcss v3.4.16 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}.pointer-events-none{pointer-events:none}.absolute{position:absolute}.relative{position:relative}.inset-y-0{top:0px;bottom:0px}.left-0{left:0px}.right-0{right:0px}.mx-auto{margin-left:auto;margin-right:auto}.mb-2{margin-bottom:0.5rem}.mb-5{margin-bottom:1.25rem}.mb-6{margin-bottom:1.5rem}.mb-8{margin-bottom:2rem}.mt-1{margin-top:0.25rem}.mt-2{margin-top:0.5rem}.mt-3{margin-top:0.75rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.block{display:block}.inline-block{display:inline-block}.flex{display:flex}.hidden{display:none}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-5{width:1.25rem}.w-full{width:100%}.max-w-md{max-width:28rem}.flex-1{flex:1 1 0%}.items-center{align-items:center}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.rounded-xl{border-radius:0.75rem}.border-b{border-bottom-width:1px}.border-t{border-top-width:1px}.border-gray-700{--tw-border-opacity:1;border-color:rgb(55 65 81 / var(--tw-border-opacity, 1))}.p-4{padding:1rem}.p-8{padding:2rem}.py-3{padding-top:0.75rem;padding-bottom:0.75rem}.pl-10{padding-left:2.5rem}.pl-3{padding-left:0.75rem}.pr-3{padding-right:0.75rem}.pr-4{padding-right:1rem}.pt-6{padding-top:1.5rem}.text-center{text-align:center}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xs{font-size:0.75rem;line-height:1rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.tracking-wider{letter-spacing:0.05em}.text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.transition-colors{transition-property:color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.hover\:text-gray-300:hover{--tw-text-opacity:1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.hover\:underline:hover{-webkit-text-decoration-line:underline;text-decoration-line:underline}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}
</style>

</head>
<body>
    <div class="min-h-screen flex items-center justify-center p-4 concert-bg">
        <div class="particles" id="particles">
            <div class="particle" style="left: 95.4272%; width: 3.13403px; height: 3.13403px; opacity: 0.32787; animation-duration: 26.7595s; animation-delay: 1.991s;"></div>
            <div class="particle" style="left: 0.621697%; width: 5.81679px; height: 5.81679px; opacity: 0.113556; animation-duration: 28.8251s; animation-delay: 1.9004s;"></div>
            <div class="particle" style="left: 68.1417%; width: 3.09246px; height: 3.09246px; opacity: 0.374885; animation-duration: 26.6651s; animation-delay: 4.99427s;"></div>
            <div class="particle" style="left: 66.199%; width: 3.77177px; height: 3.77177px; opacity: 0.180863; animation-duration: 24.7012s; animation-delay: 0.0754762s;"></div>
            <div class="particle" style="left: 44.0385%; width: 2.36082px; height: 2.36082px; opacity: 0.347662; animation-duration: 29.185s; animation-delay: 0.282956s;"></div>
            <div class="particle" style="left: 26.0486%; width: 5.38973px; height: 5.38973px; opacity: 0.352252; animation-duration: 18.2639s; animation-delay: 3.84314s;"></div>
            <div class="particle" style="left: 38.1067%; width: 2.69239px; height: 2.69239px; opacity: 0.320363; animation-duration: 11.7985s; animation-delay: 0.800492s;"></div>
            <div class="particle" style="left: 64.8556%; width: 5.36565px; height: 5.36565px; opacity: 0.221187; animation-duration: 17.6425s; animation-delay: 2.86309s;"></div>
            <div class="particle" style="left: 33.379%; width: 4.21448px; height: 4.21448px; opacity: 0.232643; animation-duration: 23.1338s; animation-delay: 1.72689s;"></div>
            <div class="particle" style="left: 55.3434%; width: 2.03386px; height: 2.03386px; opacity: 0.382392; animation-duration: 22.8761s; animation-delay: 4.11614s;"></div>
            <div class="particle" style="left: 20.2361%; width: 5.02144px; height: 5.02144px; opacity: 0.138155; animation-duration: 18.0368s; animation-delay: 3.87018s;"></div>
            <div class="particle" style="left: 20.8262%; width: 2.29687px; height: 2.29687px; opacity: 0.240043; animation-duration: 20.7296s; animation-delay: 3.58363s;"></div>
            <div class="particle" style="left: 44.6165%; width: 2.51192px; height: 2.51192px; opacity: 0.128523; animation-duration: 23.4249s; animation-delay: 3.3787s;"></div>
            <div class="particle" style="left: 68.5179%; width: 2.12416px; height: 2.12416px; opacity: 0.123653; animation-duration: 29.4025s; animation-delay: 2.14153s;"></div>
            <div class="particle" style="left: 66.3297%; width: 3.31849px; height: 3.31849px; opacity: 0.234235; animation-duration: 10.2458s; animation-delay: 3.37193s;"></div>
            <div class="particle" style="left: 52.3696%; width: 3.23351px; height: 3.23351px; opacity: 0.107634; animation-duration: 15.1932s; animation-delay: 2.98508s;"></div>
            <div class="particle" style="left: 64.9043%; width: 5.11746px; height: 5.11746px; opacity: 0.273811; animation-duration: 20.7882s; animation-delay: 2.31919s;"></div>
            <div class="particle" style="left: 26.7144%; width: 2.32235px; height: 2.32235px; opacity: 0.394579; animation-duration: 14.147s; animation-delay: 3.73181s;"></div>
            <div class="particle" style="left: 50.159%; width: 4.99314px; height: 4.99314px; opacity: 0.298009; animation-duration: 27.7982s; animation-delay: 0.699162s;"></div>
            <div class="particle" style="left: 74.7711%; width: 4.0531px; height: 4.0531px; opacity: 0.196439; animation-duration: 23.3218s; animation-delay: 2.80277s;"></div>
            <div class="particle" style="left: 96.0983%; width: 3.42835px; height: 3.42835px; opacity: 0.275299; animation-duration: 14.4142s; animation-delay: 3.93386s;"></div>
            <div class="particle" style="left: 32.1094%; width: 4.94448px; height: 4.94448px; opacity: 0.298816; animation-duration: 17.456s; animation-delay: 4.7s;"></div>
            <div class="particle" style="left: 28.2418%; width: 2.3679px; height: 2.3679px; opacity: 0.154845; animation-duration: 22.6502s; animation-delay: 4.86143s;"></div>
            <div class="particle" style="left: 87.2435%; width: 4.98486px; height: 4.98486px; opacity: 0.369048; animation-duration: 10.0334s; animation-delay: 4.35831s;"></div>
            <div class="particle" style="left: 41.1197%; width: 4.36213px; height: 4.36213px; opacity: 0.208602; animation-duration: 18.2042s; animation-delay: 3.5882s;"></div>
            <div class="particle" style="left: 88.3971%; width: 3.13182px; height: 3.13182px; opacity: 0.389773; animation-duration: 22.0348s; animation-delay: 4.23142s;"></div>
            <div class="particle" style="left: 2.20294%; width: 5.07205px; height: 5.07205px; opacity: 0.358738; animation-duration: 13.7572s; animation-delay: 4.03861s;"></div>
            <div class="particle" style="left: 78.3517%; width: 2.39133px; height: 2.39133px; opacity: 0.343992; animation-duration: 25.4623s; animation-delay: 4.01687s;"></div>
            <div class="particle" style="left: 89.5926%; width: 2.29611px; height: 2.29611px; opacity: 0.188917; animation-duration: 17.3019s; animation-delay: 0.638575s;"></div>
            <div class="particle" style="left: 83.123%; width: 4.85568px; height: 4.85568px; opacity: 0.205585; animation-duration: 21.1116s; animation-delay: 2.15525s;">            
        </div>
    </div>
        
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
                <h1 class="text-3xl font-bold mt-3 tracking-wider">Ngonser</h1>
                <p class="text-gray-400 text-sm">Beli tiket konser favoritmu sekarang!</p>
            </div>
            
            <div class="flex mb-6 border-b border-gray-700">
                <button id="login-tab" class="tab-active flex-1 py-3 font-medium text-center focus:outline-none transition-all">Login</button>
                <button id="register-tab" class="flex-1 py-3 font-medium text-center text-gray-400 focus:outline-none transition-all">Register</button>
            </div>
            
            <!-- Login Form -->

             <?php if ($this->session->flashdata('error')): ?>
                    <div class=" m-3 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Gagal!</strong>
            <span class="block sm:inline"><?php echo $this->session->flashdata('error'); ?></span>
            </div>
            <?php endif; ?>

            <div id="login-form" class="animate__animated animate__fadeIn">
                <form method="POST" action="<?php echo site_url('login/proses'); ?>">
                    <div class="mb-5">
                        <label for="login-email" class="block text-sm font-medium mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input type="email" name="email" id="login-email" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="your@email.com" required="">
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
                            <input type="password" name="password" id="login-password" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="••••••••" required="">
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
                            <a href="<?php echo site_url('login/lupa_password') ?>" class="text-sm text-gray-400 hover:text-primary transition-colors">Lupa password?</a>
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
            

            <!-- Register Form (Hidden by default) -->

            <div id="register-form" class="hidden animate__animated">

                <?php if ($this->session->flashdata('success')): ?>
                    <div class=" m-3 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline"><?php echo $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo site_url('login/proses_register'); ?>">
                    <div class="mb-5">
                        <label for="register-name" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" name="nama" id="register-name" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="Nama Lengkap" minlength="3" required>
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
                            <input name="email" type="email" id="register-email" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" placeholder="your@email.com" required="">
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
                            <input name="password" type="password" id="register-password" class="input-field w-full pl-10 pr-4 py-3 rounded-xl focus:outline-none" minlength="8" placeholder="••••••••" required="">
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
        
    document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        const button = form.querySelector('button[type="submit"]');
        if (button) {
            const originalButtonHTML = button.innerHTML.trim(); 

            function resetButtonState() {
                button.classList.remove('animate__animated', 'animate__pulse');
                button.innerHTML = originalButtonHTML; 
            }

            resetButtonState(); 

            window.addEventListener('pageshow', function(event) {
                if (event.persisted) {
                    resetButtonState(); 
                }
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                button.classList.add('animate__animated', 'animate__pulse');
                button.innerHTML = `
                    <div class="music-wave mx-auto" style="height: 20px;">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                `;

                setTimeout(() => {
                    this.submit();
                }, 500);
            });
        }
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

<script>
    (function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'949416a5633b406e',t:'MTc0ODgzNzI5NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();
</script>
<iframe height="1" width="1" style="position: absolute; top: 0px; left: 0px; border: none; visibility: hidden;"></iframe>

</body>
</html>