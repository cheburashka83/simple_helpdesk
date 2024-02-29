<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HD Provider</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Main Page -->
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Заявки</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Инциденты
            </div>
            <!-- Nav Item - Работа с абонентами -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Абоненты</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Управление абонентами:</h6>
                        <a class="collapse-item" href="/abonsearch.php">Поиск</a>
                        <a class="collapse-item" href="/abonents.php">Все абоненты</a>
                        <a class="collapse-item" href="/dsearch.php">Отчет по датам</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Отчеты Скрыто-->
            <li class="nav-item" style="display:none">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Отчеты</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Отчеты по проблемам:</h6>
                        <a class="collapse-item" href="/dsearch.php">Отчет по датам</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Коммутаторы
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree"
                    aria-expanded="true" aria-controls="collapsethree">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Коммутаторы</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Управ. коммутаторами:</h6>
                        <a class="collapse-item" href="/switch/switch.php">Коммутаторы</a>
                        <a class="collapse-item" href="/switch/switchadd.php">Добавить коммутатор</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Управление
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Управление</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Управление пользователями:</h6>
                        
                        <a class="collapse-item" href="/users.php">Редактировать польз.</a>
                        <a class="collapse-item" href="/register.php">Добавить польз.</a>

                    </div>
                </div>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="https://www.orionet.ru/pic/logo.png" alt="...">
                <p class="text-center mb-2"><strong>HD Provider</strong></br> панель управления задачами и инцидентами!</p>
                <a class="btn btn-success btn-sm" href="https://orionet.ru">ОРИОНЕТ</a>
            </div>

        </ul>
<!-- End of Sidebar -->