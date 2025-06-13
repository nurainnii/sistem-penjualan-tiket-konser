 <?php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NgonserYu Dashboard - Concert Ticket Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        
        .sidebar {
            background-color: var(--dark-gray);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .sidebar-item {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .sidebar-item:hover {
            background-color: rgba(29, 205, 159, 0.1);
        }
        
        .sidebar-item.active {
            border-left: 3px solid var(--primary);
            background-color: rgba(29, 205, 159, 0.15);
        }
        
        .card {
            background-color: var(--dark-gray);
            border-radius: 1rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            border-color: rgba(29, 205, 159, 0.3);
        }
        
        .btn-primary {
            background-color: var(--primary);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            border: 1px solid var(--primary);
            color: var(--primary);
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
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
        
        @keyframes wave {
            0%, 100% { transform: scaleY(1); }
            50% { transform: scaleY(1.5); }
        }
        
        .calendar-day {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }
        
        .calendar-day:hover {
            background-color: rgba(29, 205, 159, 0.2);
        }
        
        .calendar-day.active {
            background-color: var(--primary);
            color: black;
            font-weight: 600;
        }
        
        .calendar-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 5px;
            width: 4px;
            height: 4px;
            background-color: var(--primary);
            border-radius: 50%;
        }
        
        .notification-dot {
            position: absolute;
            top: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background-color: var(--primary);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(29, 205, 159, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(29, 205, 159, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(29, 205, 159, 0); }
        }
        
        .dropdown {
            opacity: 0;
            transform: translateY(-10px);
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .dropdown.show {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }
        
        .concert-bg {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.4)), 
                        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='400' viewBox='0 0 800 400'%3E%3Cstyle%3E.st0%7Bfill:%23222222;%7D .st1%7Bfill:%231DCD9F;%7D%3C/style%3E%3Crect width='800' height='400' fill='%23000000'/%3E%3Cpath class='st1' d='M0,300 Q200,250 400,300 T800,300 L800,400 L0,400 Z' opacity='0.3'/%3E%3C/svg%3E");
            background-size: cover;
            background-position: center;
            border-radius: 1rem;
        }
        
        .ticket-progress {
            height: 6px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
        }
        
        .ticket-progress-bar {
            height: 100%;
            background-color: var(--primary);
            border-radius: 3px;
        }
        
        .artist-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            transition: all 0.3s ease;
        }
        
        .artist-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
            z-index: 1;
        }
        
        .artist-card:hover {
            transform: scale(1.03);
        }
        
        .artist-card-content {
            position: relative;
            z-index: 2;
        }
        
        .ticket-card {
            background: linear-gradient(135deg, var(--dark-gray), #333333);
            border-radius: 1rem;
            overflow: hidden;
            position: relative;
        }
        
        .ticket-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cpath fill='%231DCD9F' fill-opacity='0.05' d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z'/%3E%3C/svg%3E");
            opacity: 0.5;
        }
        
        .ticket-divider {
            position: relative;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .ticket-divider::before,
        .ticket-divider::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: var(--black);
            border-radius: 50%;
            top: -10px;
        }
        
        .ticket-divider::before {
            left: -10px;
        }
        
        .ticket-divider::after {
            right: -10px;
        }
        
        .qr-code {
            width: 80px;
            height: 80px;
            background-color: white;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .qr-code::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,0 L30,0 L30,30 L0,30 Z' fill='black'/%3E%3Cpath d='M10,10 L20,10 L20,20 L10,20 Z' fill='white'/%3E%3Cpath d='M50,0 L80,0 L80,30 L50,30 Z' fill='black'/%3E%3Cpath d='M60,10 L70,10 L70,20 L60,20 Z' fill='white'/%3E%3Cpath d='M0,50 L30,50 L30,80 L0,80 Z' fill='black'/%3E%3Cpath d='M10,60 L20,60 L20,70 L10,70 Z' fill='white'/%3E%3Cpath d='M40,40 L45,40 L45,45 L40,45 Z M45,45 L50,45 L50,50 L45,50 Z M50,40 L55,40 L55,45 L50,45 Z M55,45 L60,45 L60,50 L55,50 Z M60,40 L65,40 L65,45 L60,45 Z M65,45 L70,45 L70,50 L65,50 Z M70,40 L75,40 L75,45 L70,45 Z M40,50 L45,50 L45,55 L40,55 Z M45,50 L50,50 L50,55 L45,55 Z M50,50 L55,50 L55,55 L50,55 Z M55,50 L60,50 L60,55 L55,55 Z M60,50 L65,50 L65,55 L60,55 Z M65,50 L70,50 L70,55 L65,55 Z M70,50 L75,50 L75,55 L70,55 Z M40,55 L45,55 L45,60 L40,60 Z M45,55 L50,55 L50,60 L45,60 Z M50,55 L55,55 L55,60 L50,60 Z M55,55 L60,55 L60,60 L55,60 Z M60,55 L65,55 L65,60 L60,60 Z M65,55 L70,55 L70,60 L65,60 Z M70,55 L75,55 L75,60 L70,60 Z M40,60 L45,60 L45,65 L40,65 Z M45,60 L50,60 L50,65 L45,65 Z M50,60 L55,60 L55,65 L50,65 Z M55,60 L60,60 L60,65 L55,65 Z M60,60 L65,60 L65,65 L60,65 Z M65,60 L70,60 L70,65 L65,65 Z M70,60 L75,60 L75,65 L70,65 Z M40,65 L45,65 L45,70 L40,70 Z M45,65 L50,65 L50,70 L45,70 Z M50,65 L55,65 L55,70 L50,70 Z M55,65 L60,65 L60,70 L55,70 Z M60,65 L65,65 L65,70 L60,70 Z M65,65 L70,65 L70,70 L65,70 Z M70,65 L75,65 L75,70 L70,70 Z M40,70 L45,70 L45,75 L40,75 Z M45,70 L50,70 L50,75 L45,75 Z M50,70 L55,70 L55,75 L50,75 Z M55,70 L60,70 L60,75 L55,75 Z M60,70 L65,70 L65,75 L60,75 Z M65,70 L70,70 L70,75 L65,75 Z M70,70 L75,70 L75,75 L70,75 Z' fill='black'/%3E%3C/svg%3E");
        }
        
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: auto;
                width: 100%;
                z-index: 50;
            }
            
            .main-content {
                margin-left: 0;
                margin-bottom: 70px;
            }
        }
        
        .form-input {
            background-color: rgba(255, 255, 255, 0.05); 
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            color: white; 
            transition: border-color 0.3s ease;
        }

        .form-label {
            margin-bottom: 0.5rem;
            display: block;
            font-weight: 500;
            color: #a0aec0; /* text-gray-400 */
        }

        select.form-input option {
            color: #222222; 
            background-color: white; 
        }

        .blur-card{
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }


    </style>

<style>
    *, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }/* ! tailwindcss v3.4.16 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.inset-0{inset:0px}.bottom-0{bottom:0px}.left-0{left:0px}.right-0{right:0px}.z-50{z-index:50}.z-10{z-index:10}.my-1{margin-top:0.25rem;margin-bottom:0.25rem}.mb-6{margin-bottom:1.5rem}.ml-3{margin-left:0.75rem}.mr-2{margin-right:0.5rem}.mr-3{margin-right:0.75rem}.mt-1{margin-top:0.25rem}.mt-6{margin-top:1.5rem}.mt-auto{margin-top:auto}.mb-2{margin-bottom:0.5rem}.mb-3{margin-bottom:0.75rem}.mb-4{margin-bottom:1rem}.mb-5{margin-bottom:1.25rem}.ml-auto{margin-left:auto}.mr-1{margin-right:0.25rem}.mt-2{margin-top:0.5rem}.mt-4{margin-top:1rem}.block{display:block}.inline-block{display:inline-block}.flex{display:flex}.grid{display:grid}.hidden{display:none}.h-5{height:1.25rem}.h-9{height:2.25rem}.h-10{height:2.5rem}.h-32{height:8rem}.h-40{height:10rem}.h-8{height:2rem}.max-h-96{max-height:24rem}.min-h-screen{min-height:100vh}.w-5{width:1.25rem}.w-9{width:2.25rem}.w-10{width:2.5rem}.w-2{width:0.5rem}.w-48{width:12rem}.w-8{width:2rem}.w-80{width:20rem}.w-full{width:100%}.flex-1{flex:1 1 0%}.flex-shrink-0{flex-shrink:0}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.grid-cols-4{grid-template-columns:repeat(4, minmax(0, 1fr))}.grid-cols-7{grid-template-columns:repeat(7, minmax(0, 1fr))}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-start{align-items:flex-start}.items-center{align-items:center}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.justify-around{justify-content:space-around}.gap-1{gap:0.25rem}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-5{gap:1.25rem}.space-y-1 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(0.25rem * var(--tw-space-y-reverse))}.space-x-2 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(0.5rem * var(--tw-space-x-reverse));margin-left:calc(0.5rem * calc(1 - var(--tw-space-x-reverse)))}.space-x-4 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1rem * var(--tw-space-x-reverse));margin-left:calc(1rem * calc(1 - var(--tw-space-x-reverse)))}.space-y-3 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(0.75rem * var(--tw-space-y-reverse))}.space-y-5 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(1.25rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1.25rem * var(--tw-space-y-reverse))}.overflow-hidden{overflow:hidden}.overflow-y-auto{overflow-y:auto}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-xl{border-radius:0.75rem}.rounded-t-lg{border-top-left-radius:0.5rem;border-top-right-radius:0.5rem}.border{border-width:1px}.border-t{border-top-width:1px}.border-b{border-bottom-width:1px}.border-gray-700{--tw-border-opacity:1;border-color:rgb(55 65 81 / var(--tw-border-opacity, 1))}.bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity, 1))}.bg-blue-500{--tw-bg-opacity:1;background-color:rgb(59 130 246 / var(--tw-bg-opacity, 1))}.bg-gray-800{--tw-bg-opacity:1;background-color:rgb(31 41 55 / var(--tw-bg-opacity, 1))}.bg-green-500{--tw-bg-opacity:1;background-color:rgb(34 197 94 / var(--tw-bg-opacity, 1))}.bg-purple-500{--tw-bg-opacity:1;background-color:rgb(168 85 247 / var(--tw-bg-opacity, 1))}.bg-yellow-500{--tw-bg-opacity:1;background-color:rgb(234 179 8 / var(--tw-bg-opacity, 1))}.bg-opacity-20{--tw-bg-opacity:0.2}.bg-opacity-50{--tw-bg-opacity:0.5}.bg-opacity-80{--tw-bg-opacity:0.8}.bg-gradient-to-br{background-image:linear-gradient(to bottom right, var(--tw-gradient-stops))}.bg-gradient-to-r{background-image:linear-gradient(to right, var(--tw-gradient-stops))}.bg-gradient-to-t{background-image:linear-gradient(to top, var(--tw-gradient-stops))}.from-black{--tw-gradient-from:#000 var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-blue-500{--tw-gradient-from:#3b82f6 var(--tw-gradient-from-position);--tw-gradient-to:rgb(59 130 246 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-green-500{--tw-gradient-from:#22c55e var(--tw-gradient-from-position);--tw-gradient-to:rgb(34 197 94 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-purple-900{--tw-gradient-from:#581c87 var(--tw-gradient-from-position);--tw-gradient-to:rgb(88 28 135 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-red-500{--tw-gradient-from:#ef4444 var(--tw-gradient-from-position);--tw-gradient-to:rgb(239 68 68 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-red-900{--tw-gradient-from:#7f1d1d var(--tw-gradient-from-position);--tw-gradient-to:rgb(127 29 29 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.to-indigo-800{--tw-gradient-to:#3730a3 var(--tw-gradient-to-position)}.to-purple-600{--tw-gradient-to:#9333ea var(--tw-gradient-to-position)}.to-teal-600{--tw-gradient-to:#0d9488 var(--tw-gradient-to-position)}.to-transparent{--tw-gradient-to:transparent var(--tw-gradient-to-position)}.to-yellow-600{--tw-gradient-to:#ca8a04 var(--tw-gradient-to-position)}.to-yellow-800{--tw-gradient-to:#854d0e var(--tw-gradient-to-position)}.object-cover{object-fit:cover}.p-3{padding:0.75rem}.p-2{padding:0.5rem}.p-4{padding:1rem}.p-5{padding:1.25rem}.px-2{padding-left:0.5rem;padding-right:0.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-2\.5{padding-top:0.625rem;padding-bottom:0.625rem}.py-3{padding-top:0.75rem;padding-bottom:0.75rem}.px-4{padding-left:1rem;padding-right:1rem}.py-1{padding-top:0.25rem;padding-bottom:0.25rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-4{padding-top:1rem}.pt-6{padding-top:1.5rem}.text-center{text-align:center}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-xs{font-size:0.75rem;line-height:1rem}.text-2xl{font-size:1.5rem;line-height:2rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.font-semibold{font-weight:600}.text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.text-blue-400{--tw-text-opacity:1;color:rgb(96 165 250 / var(--tw-text-opacity, 1))}.text-blue-500{--tw-text-opacity:1;color:rgb(59 130 246 / var(--tw-text-opacity, 1))}.text-gray-300{--tw-text-opacity:1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.text-green-500{--tw-text-opacity:1;color:rgb(34 197 94 / var(--tw-text-opacity, 1))}.text-purple-400{--tw-text-opacity:1;color:rgb(192 132 252 / var(--tw-text-opacity, 1))}.text-red-400{--tw-text-opacity:1;color:rgb(248 113 113 / var(--tw-text-opacity, 1))}.text-yellow-400{--tw-text-opacity:1;color:rgb(250 204 21 / var(--tw-text-opacity, 1))}.text-yellow-500{--tw-text-opacity:1;color:rgb(234 179 8 / var(--tw-text-opacity, 1))}.opacity-20{opacity:0.2}.shadow-lg{--tw-shadow:0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);--tw-shadow-colored:0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.backdrop-blur-sm{--tw-backdrop-blur:blur(4px);-webkit-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)}.transition-colors{transition-property:color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.hover\:bg-gray-700:hover{--tw-bg-opacity:1;background-color:rgb(55 65 81 / var(--tw-bg-opacity, 1))}.hover\:bg-gray-800:hover{--tw-bg-opacity:1;background-color:rgb(31 41 55 / var(--tw-bg-opacity, 1))}.hover\:underline:hover{-webkit-text-decoration-line:underline;text-decoration-line:underline}@media (min-width: 640px){.sm\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 768px){.md\:mb-0{margin-bottom:0px}.md\:ml-0{margin-left:0px}.md\:block{display:block}.md\:flex{display:flex}.md\:hidden{display:none}.md\:w-56{width:14rem}.md\:w-1\/3{width:33.333333%}.md\:w-2\/3{width:66.666667%}.md\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.md\:flex-row{flex-direction:row}.md\:flex-col{flex-direction:column}.md\:items-center{align-items:center}.md\:justify-between{justify-content:space-between}.md\:p-6{padding:1.5rem}.md\:pl-6{padding-left:1.5rem}.md\:text-3xl{font-size:1.875rem;line-height:2.25rem}}@media (min-width: 1024px){.lg\:col-span-2{grid-column:span 2 / span 2}.lg\:block{display:block}.lg\:hidden{display:none}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}}
</style>

 <script src="https://code.jquery.com/jquery-3.7.1.js"></script> <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

</head>
  

    <div class="concert-bg flex flex-col md:flex-row min-h-screen">