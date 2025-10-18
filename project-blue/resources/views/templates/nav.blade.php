<div class="sidebar" data-color="blue" data-image="{{ asset('assets/img/sidebar-4.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                PROYECTO AZUL
            </a>
        </div>
        <ul class="nav">
            <li>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('tasks.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Tareas</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('project-users.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Asignar usuario</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('projects.index') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Proyectos</p>
                </a>
            </li>           
        </ul>
    </div>
</div>