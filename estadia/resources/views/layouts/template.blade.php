<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo','Proteccion Civil')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @yield('estilos')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --cucsh-red: #7c0000;
            --cucsh-gold: #c5a028;
            --cucsh-light-red: #ffe9e9;
            --text-dark: #333333;
            --text-light: #ffffff;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        body {
            color: var(--text-dark);
            background-color: #f9f9f9;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: var(--text-light);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            height: 70px;
        }

        .logo-text h1 {
            font-size: 1.5rem;
            color: var(--cucsh-red);
        }

        .logo-text p {
            font-size: 0.9rem;
            color: var(--cucsh-red);
            opacity: 0.8;
        }

        /* Botón menú móvil */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.8rem;
            color: var(--cucsh-red);
            cursor: pointer;
            padding: 10px;
        }

        /* Menú de navegación */
        .main-nav {
            display: flex;
            gap: 5px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
        }

        .nav-link:hover {
            background-color: var(--cucsh-light-red);
            color: var(--cucsh-red);
        }

        /* Submenú */
        .submenu {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 220px;
            background-color: var(--text-light);
            border-radius: 4px;
            box-shadow: var(--shadow);
            display: none;
            z-index: 1000;
        }

        .nav-item:hover .submenu {
            display: block;
        }

        .submenu-link {
            display: block;
            padding: 10px 20px;
            color: var(--text-dark);
            text-decoration: none;
            border-bottom: 1px solid #eee;
            white-space: nowrap;
        }

        .submenu-link:hover {
            background-color: var(--cucsh-light-red);
            color: var(--cucsh-red);
        }

        /* Botones de autenticación */
        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 25px;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-login {
            background-color: transparent;
            color: var(--cucsh-red);
            border: 2px solid var(--cucsh-red);
        }

        .btn-login:hover {
            background-color: var(--cucsh-red);
            color: var(--text-light);
        }

        .btn-register {
            background-color: var(--cucsh-gold);
            color: var(--text-light);
            border: 2px solid var(--cucsh-gold);
        }

        .user-menu .btn-register {
            background-color: var(--cucsh-red);
            border-color: var(--cucsh-red);
        }

        /* Responsive */
        @media (max-width: 900px) {
            .mobile-menu-btn {
                display: block;
            }

            .main-nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background-color: var(--text-light);
                flex-direction: column;
                padding: 80px 0 20px;
                box-shadow: var(--shadow);
                transition: right 0.3s ease;
                overflow-y: auto;
                z-index: 999;
            }

            .main-nav.active {
                right: 0;
            }

            .nav-item {
                width: 100%;
            }

            .nav-link {
                padding: 15px 20px;
                border-radius: 0;
                border-bottom: 1px solid #eee;
                justify-content: space-between;
            }

            .submenu {
                position: static;
                display: none;
                width: 100%;
                box-shadow: none;
                background-color: #f5f5f5;
            }

            .nav-item.active .submenu {
                display: block;
            }

            .submenu-link {
                padding: 12px 20px 12px 40px;
                white-space: normal;
            }

            .auth-buttons {
                flex-direction: column;
                padding: 20px;
            }

            .auth-buttons .btn {
                width: 100%;
                justify-content: center;
            }

            body.menu-open {
                overflow: hidden;
            }

            body.menu-open::after {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 998;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-container">
            <div class="logo">
                <img src="{{asset('assets/image/logo2.png')}}" alt="Logo CUCSH" class="logo-img">
                <div class="logo-text">
                    <h1>Protección Civil</h1>
                    <p>CUCSH</p>
                </div>
            </div>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            
            @if(Auth::check())
                <nav class="main-nav" id="mainNav">
                    <!-- Pacientes -->
                    <div class="nav-item">
                        <a class="nav-link" onclick="toggleSubmenu(this)">
                            <span><i class="fas fa-user-injured"></i> Pacientes</span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="submenu">
                            <a href="{{ route('atencions.create') }}" class="submenu-link"><i class="fa-regular fa-pen-to-square"></i> Atender Paciente</a>
                            <a href="{{ route('pacientes.index') }}" class="submenu-link"><i class="fas fa-list"></i> Lista de Pacientes</a>
                            <a href="{{ route('atencions.index') }}" class="submenu-link"><i class="fas fa-chart-bar"></i> Lista de Atenciones</a>
                        </div>
                    </div>
                    
                    <!-- Incidencias -->
                    <div class="nav-item">
                        <a class="nav-link" onclick="toggleSubmenu(this)">
                            <span><i class="fa-solid fa-file-invoice"></i> Incidencias</span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="submenu">
                            <a href="{{ route('incidentes.create') }}" class="submenu-link"><i class="fas fa-exclamation-triangle"></i> Reportar Incidencia</a>
                            <a href="{{ route('incidentes.index') }}" class="submenu-link"><i class="fas fa-history"></i> Historial</a>
                            <a href="{{ route('areas.index') }}" class="submenu-link"><i class="fa-solid fa-expand"></i> Áreas</a>
                            <a href="{{ route('materialEquipos.index') }}" class="submenu-link"><i class="fa-solid fa-toolbox"></i> Materiales</a>
                            <a href="{{ route('tipoIncidentes.index') }}" class="submenu-link"><i class="fa-solid fa-person-falling-burst"></i> Tipo Incidente</a>
                            <a href="{{ route('tipoRiesgos.index') }}" class="submenu-link"><i class="fa-solid fa-explosion"></i> Tipo Riesgo</a>
                            <a href="{{ route('nivelRiesgos.index') }}" class="submenu-link"><i class="fa-solid fa-skull-crossbones"></i> Nivel Riesgo</a>
                        </div>
                    </div>
                    
                    <!-- Fumigaciones -->
                    <div class="nav-item">
                        <a class="nav-link" onclick="toggleSubmenu(this)">
                            <span><i class="fas fa-spray-can"></i> Fumigaciones</span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="submenu">
                            <a href="{{ url('tabla_fumigaciones') }}" class="submenu-link"><i class="fa-solid fa-table"></i> Tabla Fumigaciones</a>
                            <a href="{{ url('fumigaciones/historial') }}" class="submenu-link"><i class="fas fa-clipboard-list"></i> Historial</a>
                            <a href="{{ route('responsables.index') }}" class="submenu-link"><i class="fa-solid fa-person"></i> Responsables</a>
                            <a href="{{ url('tabla_equipos') }}" class="submenu-link"><i class="fa-solid fa-toolbox"></i> Equipos</a>
                        </div>
                    </div>
                    
                    <!-- Extintores -->
                    <div class="nav-item">
                        <a class="nav-link" onclick="toggleSubmenu(this)">
                            <span><i class="fas fa-fire-extinguisher"></i> Extintores</span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="submenu">
                            <a href="{{ url('registro_extintores') }}" class="submenu-link"><i class="fa-solid fa-circle-plus"></i> Nuevo Extintor</a>
                            <a href="{{ url('inventario_extintores') }}" class="submenu-link"><i class="fas fa-boxes"></i> Inventario</a>
                            <a href="{{ url('tabla_mantenimientos') }}" class="submenu-link"><i class="fas fa-tools"></i> Mantenimiento</a>
                            <a href="{{ url('tabla_areas') }}" class="submenu-link"><i class="fas fa-clipboard-check"></i> Áreas</a>
                        </div>
                    </div>
                    
                    <!-- Menú usuario -->
                    <div class="nav-item user-menu">
                        <div class="btn btn-register" onclick="toggleSubmenu(this)">
                            <span><i class="fa-solid fa-id-card"></i> {{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="submenu">
                            <a href="{{ url('dashboard') }}" class="submenu-link"><i class="fa-regular fa-window-maximize"></i> Inicio</a>
                            <a href="{{ route('profile.edit') }}" class="submenu-link"><i class="fa-solid fa-id-card-clip"></i> Perfil</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="submenu-link"><i class="fa-solid fa-door-open"></i> Cerrar Sesión</a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">@csrf</form>
                    </div>
                </nav>
            @else
                <nav class="main-nav" id="mainNav">
                    <div class="nav-item auth-buttons">
                        <a href="{{ route('login') }}" class="btn btn-login"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-register"><i class="fas fa-user-plus"></i> Registrarse</a>
                    </div>
                </nav>
            @endif
        </div>
    </header>
    
    @yield('contenido')

    <script>
        // Función para toggle submenús en móvil
        function toggleSubmenu(element) {
            if (window.innerWidth <= 900) {
                event.preventDefault();
                const navItem = element.closest('.nav-item');
                navItem.classList.toggle('active');
            }
        }

        // Script principal
        document.addEventListener('DOMContentLoaded', function() {
            const mobileBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');
            const body = document.body;

            // Toggle menú principal
            mobileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                mainNav.classList.toggle('active');
                body.classList.toggle('menu-open');
                
                // Cambiar ícono
                const icon = this.querySelector('i');
                if (mainNav.classList.contains('active')) {
                    icon.className = 'fas fa-times';
                } else {
                    icon.className = 'fas fa-bars';
                }
            });

            // Cerrar menú al hacer clic en un enlace
            document.querySelectorAll('.submenu-link, .auth-buttons .btn').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 900 && mainNav.classList.contains('active')) {
                        setTimeout(() => {
                            mainNav.classList.remove('active');
                            body.classList.remove('menu-open');
                            mobileBtn.querySelector('i').className = 'fas fa-bars';
                        }, 100);
                    }
                });
            });

            // Cerrar al hacer clic fuera
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 900 && 
                    mainNav.classList.contains('active') && 
                    !mainNav.contains(e.target) && 
                    !mobileBtn.contains(e.target)) {
                    mainNav.classList.remove('active');
                    body.classList.remove('menu-open');
                    mobileBtn.querySelector('i').className = 'fas fa-bars';
                }
            });

            // Reset al cambiar tamaño
            window.addEventListener('resize', function() {
                if (window.innerWidth > 900) {
                    mainNav.classList.remove('active');
                    body.classList.remove('menu-open');
                    mobileBtn.querySelector('i').className = 'fas fa-bars';
                    document.querySelectorAll('.nav-item.active').forEach(item => {
                        item.classList.remove('active');
                    });
                }
            });
        });

        
        
    </script>
    @yield('scripts')
    
</body>
</html>