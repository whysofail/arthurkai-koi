<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="background: #2c7abe; overflow-y: hidden; overflow-x: hidden;">
    <!-- Brand Logo -->
    <a href="{{ route("dashboard") }}" class="brand-link"
        style="text-align: center; background: black; padding-top: 22px; padding-bottom: 22px;">
        <img width="55" src="{{ asset("images/logo/koilogo.png") }}">
    </a>
    <!-- Sidebar -->
    <div class="sidebar" style="background: #2c7abe">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">
                    <a href="{{ route("cmskoi") }}" class="nav-link" style=" height: 50px;">
                        <i class="whitefont nav-icon far fa-image" style="font-size: 18px !important;"></i>
                        <p class="whitefont" style="font-size: 18px !important;">
                            Koi
                        </p>
                    </a>
                    <a href="{{ route("cmskoigrid") }}" class="nav-link" style="text-align: right; height: 50px;">
                        <i class="fa-solid fa-table-cells" style="font-size: 18px !important; color: white"></i>
                        <p class="whitefont" style="font-size: 18px !important;">
                            Koi<span> Grid</span>
                        </p>
                    </a>
                </li>
            </ul>
            {{-- Items --}}

            <?php
            $currentPath = Request::path();
            $koiItem = [
                [
                    "path" => "/variety",
                    "route" => "cmsvariety",
                    "label" => "Variety",
                ],
                [
                    "path" => "/breeder",
                    "route" => "cmsbreeder",
                    "label" => "Breeder",
                ],
                [
                    "path" => "/bloodline",
                    "route" => "cmsbloodline",
                    "label" => "Bloodline",
                ],
                [
                    "path" => "/agent",
                    "route" => "cmsagent",
                    "label" => "Agent",
                ],
            ];
            $webItem = [
                [
                    "path" => "/ourcollection",
                    "route" => "cmsourcollection",
                    "label" => "Our Collection",
                ],
                [
                    "path" => "/news",
                    "route" => "cmsnews",
                    "label" => "News",
                ],
                [
                    "path" => "/aboutus",
                    "route" => "cmsaboutus",
                    "label" => "About Us",
                ],
                [
                    "path" => "/contactus",
                    "route" => "cmscontactus",
                    "label" => "Contact Us",
                ],
            ];
            ?>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false" style="margin-top: 20px;">
                <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Setting
                        Koi</span></li>

                @foreach ($koiItem as $koiNav)
                    <?php
                    $isActive = Request::is("CMS" . $koiNav["path"] . "*");
                    ?>
                    <li class="nav-item" style="border-top: 0.6px solid white;">
                        <a href="{{ route($koiNav["route"]) }}" class="nav-link {{ $isActive ? "active" : "" }}">
                            <i class="whitefont nav-icon fas fa-minus"></i>
                            <p class="whitefont">
                                {{ $koiNav["label"] }}
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false" style="margin-top: 20px;">
                <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Setting
                        Koi</span></li>
                @foreach ($webItem as $webNav)
                    <li class="nav-item" style="border-top: 0.6px solid white;">
                        <a href="{{ route($webNav["route"]) }}" class="nav-link">
                            <i class="whitefont nav-icon fas fa-minus"></i>
                            <p class="whitefont">
                                {{ $webNav["label"] }}
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
