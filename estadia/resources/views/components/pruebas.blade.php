</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Logo_CUCSH.svg/1200px-Logo_CUCSH.svg.png" alt="Logo CUCSH" class="logo-img">
                <div class="logo-text">
                    <h1>CUCSH</h1>
                    <p>Centro Universitario de Ciencias Sociales y Humanidades</p>
                </div>
            </div>
            
            <div class="nav-container">
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                
                <nav class="main-nav" id="mainNav">
                    <!-- Pacientes/Incidencias -->
                    <div class="nav-item">
                        <a href="/pacientes" class="nav-link" id="pacientesLink">
                            <i class="fas fa-user-injured nav-icon"></i>
                            <span>Pacientes/Incidencias</span>
                        </a>
                        <div class="submenu">
                            <a href="/pacientes/registro" class="submenu-link">
                                <i class="fas fa-plus-circle"></i> Registrar Paciente
                            </a>
                            <a href="/pacientes/lista" class="submenu-link">
                                <i class="fas fa-list"></i> Lista de Pacientes
                            </a>
                            <a href="/incidencias/registro" class="submenu-link">
                                <i class="fas fa-exclamation-triangle"></i> Reportar Incidencia
                            </a>
                            <a href="/incidencias/historial" class="submenu-link">
                                <i class="fas fa-history"></i> Historial de Incidencias
                            </a>
                        </div>
                    </div>
                    
                    <!-- Fumigaciones -->
                    <div class="nav-item">
                        <a href="/fumigaciones" class="nav-link" id="fumigacionesLink">
                            <i class="fas fa-spray-can nav-icon"></i>
                            <span>Fumigaciones</span>
                        </a>
                        <div class="submenu">
                            <a href="/fumigaciones/programar" class="submenu-link">
                                <i class="fas fa-calendar-plus"></i> Programar Fumigación
                            </a>
                            <a href="/fumigaciones/calendario" class="submenu-link">
                                <i class="fas fa-calendar-alt"></i> Calendario
                            </a>
                            <a href="/fumigaciones/historial" class="submenu-link">
                                <i class="fas fa-clipboard-list"></i> Historial
                            </a>
                            <a href="/fumigaciones/reportes" class="submenu-link">
                                <i class="fas fa-chart-bar"></i> Reportes
                            </a>
                        </div>
                    </div>
                    
                    <!-- Extintores -->
                    <div class="nav-item">
                        <a href="/extintores" class="nav-link" id="extintoresLink">
                            <i class="fas fa-fire-extinguisher nav-icon"></i>
                            <span>Extintores</span>
                        </a>
                        <div class="submenu">
                            <a href="/extintores/inventario" class="submenu-link">
                                <i class="fas fa-boxes"></i> Inventario
                            </a>
                            <a href="/extintores/mantenimiento" class="submenu-link">
                                <i class="fas fa-tools"></i> Mantenimiento
                            </a>
                            <a href="/extintores/recarga" class="submenu-link">
                                <i class="fas fa-sync-alt"></i> Recarga
                            </a>
                            <a href="/extintores/inspeccion" class="submenu-link">
                                <i class="fas fa-clipboard-check"></i> Inspección
                            </a>
                        </div>
                    </div>
                </nav>
                
                <div class="auth-buttons">
                    <a href="/login" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </a>
                    <a href="/register" class="btn btn-register">
                        <i class="fas fa-user-plus"></i> Registrarse
                    </a>
                </div>
            </div>
        </div>
    </header>