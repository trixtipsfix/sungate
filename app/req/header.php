<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="./index">
                <img src="assets/images/mind_factory_logo.png" class="header-brand-img">
            </a>
            <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                    <a href="../" class="btn btn-sm btn-lime mr-2" target="_blank"> <i class="fe fe-external-link"></i> Seitenvorschau Live </a>
                </div>

                <!--
                <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-bell"></i>
                        <span class="nav-unread"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a href="#" class="dropdown-item d-flex">
                            <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                            <div>
                                <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                                <div class="small text-muted">10 minutes ago</div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex">
                            <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                            <div>
                                <strong>Alice</strong> started new task: Tabler UI design.
                                <div class="small text-muted">1 hour ago</div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex">
                            <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                            <div>
                                <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                                <div class="small text-muted">2 hours ago</div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                    </div>
                </div>
                !-->

                <div class="dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                        <span class="ml-2 d-none d-lg-block">
                            <span class="text-default"> <?=$userInfo->name?> </span>
                            <small class="text-muted d-block mt-1"><?=$_SESSION['ky_admin_lastlogin']?></small>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="logout">
                            <i class="dropdown-icon fe fe-log-out"></i> Ausloggen
                        </a>
                    </div>
                </div>
            </div>
            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">

            <div class="">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                        <a href="./index" class="nav-link">
                            <i class="fe fe-home"></i> Hauptseite
                        </a>
                    </li>


                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fa fa-building"></i> Hotels </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./hotel-list" class="dropdown-item "> Liste die Hotels </a>
                            <a href="./hotel-add" class="dropdown-item "> Hotel hinzufügen </a>
                            <a href="./hotel-types" class="dropdown-item ">  Hotel Typen </a>
                            <a href="./hotel-categories" class="dropdown-item ">  Kategorien</a>
                            <a href="./hotel-themes" class="dropdown-item ">  Themen </a>
                            <a href="./hotel-accommodations" class="dropdown-item ">  Zimmer Typen</a>
                            <a href="./hotel-comments" class="dropdown-item ">  Comments</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fa fa-hotel"></i> Zimmer </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./hotel-room-list" class="dropdown-item "> Zimmer listen </a>
                            <a href="./hotel-rooms-add" class="dropdown-item ">Zimmer hinzufügen </a>
                            <a href="./hotel-features" class="dropdown-item ">  Zimmer Status</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-truck"></i> Tours </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./tour-list" class="dropdown-item "> Tours listen</a>
                            <a href="./tour-add" class="dropdown-item "> Tour hinzufügen </a>
                            <a href="./tour-categories" class="dropdown-item ">  Tour Kategorien</a>
                            <a href="./tour-dates-list" class="dropdown-item ">  Tour Datum</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-check-square"></i> Rezervierungen </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./otel-reservations" class="dropdown-item "> Hotel Rezervierungen </a>
                            <a href="./tour-reservations" class="dropdown-item "> Tour Reservierungen </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-book"></i> Inspirationen </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./blog-list" class="dropdown-item ">  Texte </a>
                            <a href="./blog-add" class="dropdown-item "> Text hinzufügen</a>
                            <a href="./blog-categories" class="dropdown-item ">  Kategorien </a>
                            <a href="./blog-categories-add" class="dropdown-item ">  Kategorien hinzufügen </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-user"></i> User</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./user" class="dropdown-item ">  User </a>
                            <a href="./user-add" class="dropdown-item ">  User adden </a>
                            <!--<a href="./user-group" class="dropdown-item ">  Kullanıcı Grupları</a> !-->
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-file-text"></i> Seiten </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./page-list" class="dropdown-item ">  Seiten </a>
                            <a href="./page-add" class="dropdown-item ">  Seiten adden</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-map"></i> Stadt, Land Einstellungen</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./province-list" class="dropdown-item ">  Stadt </a>
                            <a href="./state-list" class="dropdown-item "> Region</a>
                            <a href="./district-list" class="dropdown-item ">  Gegend</a>
                            <a href="./neighborhood-list" class="dropdown-item ">  Stadt viertel</a>
                        </div>
                    </li>

                    <!--
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-settings"></i> Genel Ayarlar</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="./site-images" class="dropdown-item ">  Site Görsel Ayarları</a>
                            <a href="./site-settings" class="dropdown-item ">  Site Ayarları</a>
                            <a href="./google-settings" class="dropdown-item ">  Google Ayarları</a>
                            <a href="./smtp-settings" class="dropdown-item "> SMTP Ayarları</a>
                        </div>
                    </li> !-->

                </ul>
            </div>
            <div class="col-lg-2 ml-auto">

            </div>
        </div>
    </div>
</div>

