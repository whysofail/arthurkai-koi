@extends('layouts.apparthuradm')

@section('title', 'List Koi')

@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .pagination nav {
            /* display: none !important; */
            justify-content: center !important;
        }

        .pagination nav {
            justify-content: center !important;
        }

        .pagination nav>div:first-of-type {
            display: flex !important;
            justify-content: center !important;
        }

        .pagination li {
            display: block;
        }

        [aria-disabled="true"] {
            display: none;
        }

        [rel="prev"],
        [rel="next"] {
            display: none;
        }

        span[aria-current="page"]>span {
            background-color: #99D8FA !important;
        }

        .content_box {
            border: 1px black solid;
            padding: 15px;
            padding-bottom: 5em;
            text-align: center;
            min-height: 44em;
            max-height: 44em;
        }

        a:hover {
            color: black !important;
            background: #ffffff00 !important;
        }

        .swiper {
            width: 300px;
            height: 100%;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
        }

        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            content: 'prev';
            font-weight: bold;
            position: relative;
            left: 85%;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            content: 'next';
            font-weight: bold;
            position: relative;
            right: 85%;
        }

        /* .page-item.active .page-link {
                                                                                                                            z-index: 3;
                                                                                                                            color: #fff;
                                                                                                                            background-color: #000000 !important;
                                                                                                                            border-color: black !important;
                                                                                                                        }

                                                                                                                        .page-link {
                                                                                                                            position: relative;
                                                                                                                            display: block;
                                                                                                                            padding: .5rem .75rem;
                                                                                                                            margin-left: -1px;
                                                                                                                            line-height: 1.25;
                                                                                                                            color: #000000;
                                                                                                                            background-color: #fff;
                                                                                                                            border: 1px solid #000000 !important;
                                                                                                                        }

                                                                                                                        .page-item.disabled .page-link {
                                                                                                                            color: #6c757d;
                                                                                                                            pointer-events: none;
                                                                                                                            cursor: auto;
                                                                                                                            background-color: #fff;
                                                                                                                            border-color: #000000 !important;
                                                                                                                        } */
        .grid-table {
            width: 100%;
            text-align: left;
            font-size: 14px;
            border-collapse: collapse;
            /* Ensures borders are collapsed */
        }

        .grid-table td {
            padding: 5px 5px;
            /* Adds padding inside cells */
            vertical-align: top;
            /* Aligns text to the top of each cell */
            border-bottom: 1px solid #ddd;
            /* Adds a border below each row */
            min-height: 100px;
            /* Sets a minimum height for rows */
            overflow: hidden;
            /* Hides any overflowing content */
            word-wrap: break-word;
            /* Ensures long words wrap onto the next line */
            box-sizing: border-box;
            /* Ensures padding and border are included in the height */
        }

        .grid-table td:nth-child(2) {
            width: 1%;
            /* Keeps the colon aligned and prevents wrapping */
            white-space: nowrap;
            /* Prevents wrapping of the colon */
        }

        .grid-table td:last-child {
            color: #333;
            /* Adjusts text color */
        }

        .photo-item {
            width: 100%;
            display: flex;
            justify-content: center;
            align-content: center;
            flex-wrap: wrap;
        }

        .photo-item img {
            max-height: 300px;
        }

        @media only screen and (max-width: 900px) {
            .grid-table {
                min-height: 16em;
            }
        }

        @media only screen and (max-width: 600px) {
            .grid-table {
                min-height: 2em;
            }
        }
    </style>

@endsection

@section('content')
    <!-- Main Sidebar Container -->
    <div class="content-wrapper" style="background: white;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">Chart</h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
        {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chart</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> --}}

        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-1 col-md-1">
                        <a href="" style="color:black;">
                            <div class="info-box mb-3">
                                <div class="info-box-content">
                                    <span class="info-box-text">Koi</span>
                                    <span class="info-box-number">
                                        {{ $koitotal }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-12 col-sm-1 col-md-1">
                        <a href="{{ route('dashboard') }}" style="color:black;">
                            <div class="mb-3 mt-4">
                                <div class="info-box-content" style="text-align: center">
                                    <i class="fa-solid fa-table" style="font-size: 40px;"></i>
                                    {{-- <span class="info-box-number"
                                    {{ $koitotal }}
                                </span> --}}
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div id="chartUser"></div>
                    </div>
                </div>
                </a>
                <!-- /.row -->
            </div>
        </section>

        <section class="content">
            <div class="women_main">
                <!-- start content -->
                <div class="card">
                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-4 d-inline-flex align-items-center">
                            <a href="{{ route('cmskoiAdd') }}" class="mr-2">
                                <button type="button" class="btn btn-success" style="background: green; color: white;">
                                    <b>+ Add KOI</b>
                                </button>
                            </a>

                            <form method="GET" action="{{ url()->current() }}" class="d-inline mr-2">
                                <input type="hidden" name="layout" value="{{ $layout ?? '' }}">
                                <input type="hidden" name="search" value="{{ $search ?? '' }}">
                                <input type="hidden" name="key" value="{{ request()->query('key', '') }}">
                                <input type="hidden" name="value" value="{{ request()->query('value', '') }}">
                                <input type="hidden" name="sort_by" value="{{ request()->query('sort_by', '') }}">
                                <input type="hidden" name="order" value="{{ request()->query('order', '') }}">

                                @foreach (request()->query('filters', []) as $index => $filter)
                                    <input type="hidden" name="filters[{{ $index }}][key]"
                                        value="{{ $filter['key'] }}">
                                    <input type="hidden" name="filters[{{ $index }}][value]"
                                        value="{{ $filter['value'] }}">
                                @endforeach

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Items per page : {{ request('per_page', 8) }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button type="submit" name="per_page" value="8"
                                            class="dropdown-item">8</button>
                                        <button type="submit" name="per_page" value="16"
                                            class="dropdown-item">15</button>
                                        <button type="submit" name="per_page" value="24"
                                            class="dropdown-item">20</button>
                                        <button type="submit" name="per_page" value="32"
                                            class="dropdown-item">30</button>
                                        <button type="submit" name="per_page" value="50"
                                            class="dropdown-item">50</button>
                                        <button type="submit" name="per_page" value="75"
                                            class="dropdown-item">75</button>
                                        <button type="submit" name="per_page" value="100"
                                            class="dropdown-item">100</button>
                                    </div>
                                </div>
                            </form>

                            <button id="print-koi-grid" class="btn btn-primary">Print Koi Grid</button>
                        </div>
                        <div class="col-sm-4">
                            <!-- Trigger Button -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#filterModal">
                                Apply Filters
                            </button>

                            <!-- Filter Modal -->
                            <div class="modal fade" id="filterModal" tabindex="-1" role="dialog"
                                aria-labelledby="filterModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="filterModalLabel">Apply Filters</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="filter-form" method="GET" action="{{ route('cmskoi') }}">
                                                @csrf

                                                <!-- Persist layout and per_page -->
                                                <input type="hidden" name="layout"
                                                    value="{{ request('layout', 'grid') }}">
                                                <input type="hidden" name="per_page"
                                                    value="{{ request('per_page', 8) }}">

                                                <!-- Filters Container -->
                                                <div id="filters-container">
                                                    @foreach (request('filters', []) as $index => $filter)
                                                        <div class="input-group filter-group">
                                                            <select name="filters[{{ $index }}][key]"
                                                                class="form-control filter-key-select">
                                                                <option value="">Select Filter</option>
                                                                <option value="code"
                                                                    {{ $filter['key'] == 'code' ? 'selected' : '' }}>Code
                                                                </option>
                                                                <option value="nickname"
                                                                    {{ $filter['key'] == 'nickname' ? 'selected' : '' }}>
                                                                    Nickname</option>
                                                                <option value="seller"
                                                                    {{ $filter['key'] == 'seller' ? 'selected' : '' }}>
                                                                    Seller</option>
                                                                <option value="handler"
                                                                    {{ $filter['key'] == 'handler' ? 'selected' : '' }}>
                                                                    Handler</option>
                                                                <option value="variety"
                                                                    {{ $filter['key'] == 'variety' ? 'selected' : '' }}>
                                                                    Variety</option>
                                                                <option value="breeder"
                                                                    {{ $filter['key'] == 'breeder' ? 'selected' : '' }}>
                                                                    Breeder</option>
                                                                <option value="bloodline"
                                                                    {{ $filter['key'] == 'bloodline' ? 'selected' : '' }}>
                                                                    Bloodline</option>
                                                                <option value="location"
                                                                    {{ $filter['key'] == 'location' ? 'selected' : '' }}>
                                                                    Keeping Location</option>

                                                            </select>
                                                            <input type="text"
                                                                name="filters[{{ $index }}][value]"
                                                                class="form-control filter-value-input"
                                                                placeholder="Filter value"
                                                                value="{{ $filter['value'] }}">
                                                            <button type="button"
                                                                class="btn btn-danger remove-filter">Remove</button>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Add Filter Button -->
                                                <button type="button" class="btn btn-secondary mt-3" id="add-filter">Add
                                                    Filter</button>

                                                <!-- Sort and Order -->
                                                <div class="input-group mt-4">
                                                    <select name="sort_by" class="form-control" id="sort-by-select">
                                                        <option value="">Sort by</option>
                                                        <option value="code"
                                                            {{ request('sort_by') == 'code' ? 'selected' : '' }}>Code
                                                        </option>
                                                        <option value="nickname"
                                                            {{ request('sort_by') == 'nickname' ? 'selected' : '' }}>
                                                            Nickname</option>
                                                        <option value="seller"
                                                            {{ request('sort_by') == 'seller' ? 'selected' : '' }}>Seller
                                                        </option>
                                                        <option value="handler"
                                                            {{ request('sort_by') == 'handler' ? 'selected' : '' }}>Handler
                                                        </option>
                                                        <option value="variety"
                                                            {{ request('sort_by') == 'variety' ? 'selected' : '' }}>Variety
                                                        </option>
                                                        <option value="breeder"
                                                            {{ request('sort_by') == 'breeder' ? 'selected' : '' }}>Breeder
                                                        </option>
                                                        <option value="bloodline"
                                                            {{ request('sort_by') == 'bloodline' ? 'selected' : '' }}>
                                                            Bloodline</option>
                                                        <option value="location"
                                                            {{ request('sort_by') == 'location' ? 'selected' : '' }}>
                                                            Keeping Location</option>
                                                        <option value="created_at"
                                                            {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>
                                                            Date Created</option>
                                                        <option value="updated_at"
                                                            {{ request('sort_by') == 'updated_at' ? 'selected' : '' }}>
                                                            Date Updated</option>
                                                    </select>
                                                    <select name="order" class="form-control" id="order-select">
                                                        <option value="asc"
                                                            {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending
                                                        </option>
                                                        <option value="desc"
                                                            {{ request('order') == 'desc' ? 'selected' : '' }}>Descending
                                                        </option>
                                                    </select>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" form="filter-form">Apply
                                                Filters</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card-tools">
                                <form id="search-form" method="GET" action="{{ route('cmskoi') }}">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" id="search-input" name="search"
                                            value="{{ request('search') }}" class="form-control"
                                            placeholder="Search for koi...">
                                        <input type="hidden" name="layout" value="grid" />
                                        <!-- Ensure the layout is set to grid -->
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <div class="row koi-grid" id="koi-grid">
                            @if ($koi && $koi->isNotEmpty())
                                @foreach ($koi as $k)
                                    @include('arthurkaikoiadmin.koi.koi_grid_item', ['k' => $k])
                                @endforeach
                            @else
                                <p>No results found</p>
                            @endif

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- end content -->

        <div class="pagination justify-content-center mb-4">
            {{ $koi->links() }} <!-- This will create the pagination links -->
        </div>

    @endsection

    @section('script')
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        {{-- <script>
            const printButton = document.getElementById('print-koi-grid');
        
            printButton.addEventListener('click', async function () {
                try {
                    console.log('Print button clicked');
                    const originalText = printButton.innerText;
                    printButton.innerText = 'Generating PDF...';
        
                    // Cache DOM elements to minimize re-querying
                    const itemContainer = document.querySelector('.koi-grid');
                    const simpleCartItems = document.querySelectorAll('.simpleCart_shelfItem');
                    const contentBoxItems = document.querySelectorAll('.content_box');
                    const koiGridItems = document.querySelectorAll('#koi-grid-item');
                    const btnMin = document.querySelectorAll('#btn-min');
                    const btnDropdown = document.querySelectorAll('#btn-dropdown');
                    const btnStatusItems = document.querySelectorAll('#btn-status');
        
                    if (!koiGridItems.length) throw new Error("No koi grid items found!");
                    console.log(`Found ${koiGridItems.length} koi grid items`);
        
                    // Set up PDF settings
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF('p', 'mm', 'a4');
                    const pageWidth = 210, pageHeight = 297;
                    const horizontalMargin = 0, verticalMargin = 0; // Set margins
                    const verticalSpacing = 0;
                    const maxItemWidth = (pageWidth - (2 * horizontalMargin)) / 2; // Two items per row
                    const maxItemHeight = (pageHeight - (2 * verticalMargin) - verticalSpacing) / 2;
        
                    // Adjust styles in one pass
                    if (itemContainer) {
                        itemContainer.style.cssText = 'width: 50%;'; // Reset to full width for printing
                    }
                    [...simpleCartItems, ...btnMin, ...btnDropdown].forEach(item => item.style.cssText = 'display: none; padding: 0 !important;');
                    btnStatusItems.forEach(item => item.style.cssText = 'background: none !important; border: none; padding: 0 !important; color: inherit; font: inherit;');
                    contentBoxItems.forEach(item => {
                        item.style.cssText = 'padding: 0 !important; min-height: 0;';
                    });
                    koiGridItems.forEach(item => {
                        item.style.cssText = 'max-width: 50%; flex: 0 0 50%;'; // Maintain two items per row
                    });
                    console.log('Adjusted styles for elements');
        
                    // Loop through koiGridItems in batches (by page)
                    for (let i = 0; i < koiGridItems.length; i++) {
                        const item = koiGridItems[i];
                        const positionIndex = i % 2; // Two items per row
        
                        // Add new page if starting a new set of two items
                        if (positionIndex === 0 && i !== 0) pdf.addPage();
        
                        // Calculate the position based on current index
                        const x = positionIndex * (maxItemWidth + horizontalMargin);
                        const y = Math.floor(i / 2) * (maxItemHeight + verticalSpacing) + verticalMargin;
        
                        try {
                            const canvas = await html2canvas(item, { scale: 1, logging: false, useCORS: true });
                            const imgData = canvas.toDataURL('image/png');
        
                            // Aspect ratio calculations
                            const aspectRatio = 1 / 2; // Adjust based on your content
                            let itemWidth = maxItemWidth, itemHeight = itemWidth / aspectRatio;
        
                            if (aspectRatio < maxItemWidth / maxItemHeight) {
                                itemHeight = maxItemHeight;
                                itemWidth = itemHeight * aspectRatio;
                            }
        
                            // Center item in allocated space
                            const xOffset = (maxItemWidth - itemWidth) / 2;
                            const yOffset = (maxItemHeight - itemHeight) / 2;
        
                            pdf.addImage(imgData, 'PNG', x + xOffset, y + yOffset, itemWidth, itemHeight);
                            console.log(`Added item ${i + 1} to PDF at position (${x + xOffset}, ${y + yOffset})`);
                        } catch (canvasError) {
                            console.error(`Error generating canvas for item ${i + 1}:`, canvasError);
                        }
                    }
        
                    console.log('All items processed. Saving PDF...');
                    pdf.save('koi-grid.pdf');
        
                    // Restore original styles in one pass
                    [...simpleCartItems, ...contentBoxItems, ...btnMin, ...btnDropdown, ...btnStatusItems, ...koiGridItems, itemContainer].forEach(item => item.style.cssText = '');
        
                    printButton.innerText = originalText;
                } catch (error) {
                    console.error('Error during PDF generation:', error);
                    printButton.innerText = originalText;
                }
            });
        </script> --}}
        <script>
            const printButton = document.getElementById('print-koi-grid');

            printButton.addEventListener('click', async function() {
                try {
                    console.log('Print button clicked');
                    const originalText = printButton.innerText;
                    printButton.innerText = 'Generating PDF...';

                    // Cache DOM elements to minimize re-querying
                    const itemContainer = document.querySelector('.koi-grid');
                    const simpleCartItems = document.querySelectorAll('.simpleCart_shelfItem');
                    const contentBoxItems = document.querySelectorAll('.content_box');
                    const koiGridItems = document.querySelectorAll('#koi-grid-item');
                    const btnMin = document.querySelectorAll('#btn-min');
                    const btnDropdown = document.querySelectorAll('#btn-dropdown');
                    const btnStatusItems = document.querySelectorAll('#btn-status');
                    const gridItemTd = document.querySelectorAll('.grid-table td');

                    if (!koiGridItems.length) throw new Error("No koi grid items found!");
                    console.log(`Found ${koiGridItems.length} koi grid items`);

                    // Set up PDF settings
                    const {
                        jsPDF
                    } = window.jspdf;
                    const pdf = new jsPDF('p', 'mm', 'a4');
                    const pageWidth = 210,
                        pageHeight = 297;
                    const horizontalMargin = 4,
                        verticalMargin = 8; // Small margins for clarity
                    const itemWidth = (pageWidth - (2 * horizontalMargin)) / 2; // Two items per row
                    const itemHeight = (pageHeight - (2 * verticalMargin)) / 2; // Max 4 items per page

                    if (itemContainer) {
                        itemContainer.style.cssText = 'width: 50%;'; // Set to full width for printing
                    }
                    [...simpleCartItems, ...btnMin, ...btnDropdown].forEach(item => item.style.cssText =
                        'display: none; padding: 0 !important;');
                    [, ...btnStatusItems].forEach(item => item.style.cssText =
                        'background: none !important; border: none; padding: 0 !important; color: inherit; font: inherit;'
                    );
                    contentBoxItems.forEach(item => {
                        item.style.cssText = 'padding: 0 !important; min-height: 0;';
                    });
                    koiGridItems.forEach(item => {
                        item.style.cssText = 'max-width: 50%; flex: 0 0 50%;';
                    });
                    gridItemTd.forEach(item => {
                        item.style.cssText = 'padding: 0 5px; border-bottom: 0;'
                    })
                    console.log('Adjusted styles for elements');

                    // Loop through koiGridItems in batches of 4
                    for (let i = 0; i < koiGridItems.length; i += 4) {
                        if (i > 0) pdf.addPage(); // Add a new page for every set of 4 items

                        for (let j = 0; j < 4; j++) {
                            if (i + j >= koiGridItems.length) break; // Prevent accessing out of bounds

                            const item = koiGridItems[i + j];
                            try {
                                const canvas = await html2canvas(item, {
                                    scale: window.devicePixelRatio = 2,
                                    logging: false,
                                    useCORS: true,
                                });
                                const imgData = canvas.toDataURL('image/png');

                                const xOffset = (j % 2 === 0 ? horizontalMargin : itemWidth + horizontalMargin);
                                const yOffset = Math.floor(j / 2) * (itemHeight + verticalMargin) + verticalMargin;

                                // Add image to PDF with adjusted width and height
                                pdf.addImage(imgData, 'PNG', xOffset, yOffset, itemWidth - horizontalMargin,
                                    itemHeight - verticalMargin);
                                console.log(`Added item ${i + j + 1} to PDF at position (${xOffset}, ${yOffset})`);
                            } catch (canvasError) {
                                console.error(`Error generating canvas for item ${i + j + 1}:`, canvasError);
                            }
                        }
                    }

                    console.log('All items processed. Saving PDF...');
                    pdf.save('koi-grid.pdf');

                    // Restore original styles if needed (optional)
                    [...simpleCartItems, ...contentBoxItems, ...btnMin, ...btnDropdown, ...btnStatusItems, ...
                        koiGridItems, itemContainer, ...gridItemTd
                    ].forEach(item => item.style.cssText = '');
                    printButton.innerText = originalText;
                } catch (error) {
                    console.error('Error during PDF generation:', error);
                    printButton.innerText = originalText;
                }
            });
        </script>

        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                    clickable: true,
                },
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Function to get the value of a query parameter by name
                function getQueryParam(name) {
                    const urlParams = new URLSearchParams(window.location.search);
                    return urlParams.get(name);
                }

                // Function to populate the form with query parameters
                function populateFormFields() {
                    // Populate filters dynamically
                    const filters = getQueryParam('filters');
                    if (filters) {
                        const filterArray = JSON.parse(filters);
                        filterArray.forEach((filter, index) => {
                            if (index >= 0) {
                                // Add a new filter input field dynamically if necessary
                                if (index > 0) {
                                    const newFilterGroup = document.createElement('div');
                                    newFilterGroup.classList.add('input-group', 'filter-group');
                                    newFilterGroup.innerHTML = `
                            <select name="filters[${index}][key]" class="form-control filter-key-select">
                                <option value="code">Code</option>
                                <option value="nickname">Nickname</option>
                                <option value="seller">Seller</option>
                                <option value="handler">Handler</option>
                                <option value="variety">Variety</option>
                                <option value="breeder">Breeder</option>
                                <option value="bloodline">Bloodline</option>
                                <option value="location">Keeping Location</option>

                            </select>
                            <input type="text" name="filters[${index}][value]" class="form-control filter-value-input" placeholder="Filter value">
                            <button type="button" class="btn btn-danger remove-filter">Remove</button>
                        `;
                                    document.getElementById('filters-container').appendChild(newFilterGroup);
                                }

                                // Set the filter key and value
                                const filterKeySelect = document.querySelector(
                                    `select[name="filters[${index}][key]"]`);
                                const filterValueInput = document.querySelector(
                                    `input[name="filters[${index}][value]"]`);
                                filterKeySelect.value = filter.key;
                                filterValueInput.value = filter.value;
                            }
                        });
                    }

                    // Set sort_by and order
                    const sortBy = getQueryParam('sort_by');
                    const order = getQueryParam('order');
                    if (sortBy) {
                        document.querySelector('select[name="sort_by"]').value = sortBy;
                    }
                    if (order) {
                        document.querySelector('select[name="order"]').value = order;
                    }
                }

                // Populate the form fields when the page is loaded
                populateFormFields();

                // Remove filter event handler
                document.addEventListener('click', function(event) {
                    if (event.target && event.target.classList.contains('remove-filter')) {
                        event.target.closest('.filter-group').remove();
                    }
                });

                // Add new filter event handler
                document.getElementById('add-filter').addEventListener('click', function() {
                    const filterGroup = document.createElement('div');
                    filterGroup.classList.add('input-group', 'filter-group');
                    filterGroup.innerHTML = `
            <select name="filters[${document.querySelectorAll('.filter-group').length}][key]" class="form-control filter-key-select">
                <option value="code">Code</option>
                <option value="nickname">Nickname</option>
                <option value="seller">Seller</option>
                <option value="handler">Handler</option>
                <option value="variety">Variety</option>
                <option value="breeder">Breeder</option>
                <option value="bloodline">Bloodline</option>
                <option value="location">Keeping Location</option>

            </select>
            <input type="text" name="filters[${document.querySelectorAll('.filter-group').length}][value]" class="form-control filter-value-input" placeholder="Filter value">
            <button type="button" class="btn btn-danger remove-filter">Remove</button>
        `;
                    document.getElementById('filters-container').appendChild(filterGroup);
                });
            });
        </script>
        {{-- <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        
                var delay = (function(){
                    var timer = 0;
                    return function(callback, ms){
                        clearTimeout (timer);
                        timer = setTimeout(callback, ms);
                    };
                })();
        
                $('#search-input').on('keyup', function(e) {
                    e.preventDefault();
                    var query = $(this).val();
                    delay(function() {
                        $.ajax({
                            url: "{{ route('api.koi_search') }}",
                            type: "GET",
                            data: { query: query }, // Pass the query
                            success: function(data) {
                                console.log(data)
                                $('#koi-grid').empty(); // Clear existing items
                                if (data.data.length > 0) {
                                    $.each(data.data, function(index, item) {
                                        $('#koi-grid').append(`
                                            @include('arthurkaikoiadmin.koi.koi_grid_item', ['k' => $k])
                                        `);
                                    });
                                } else {
                                    $('#koi-grid').append('<p>No results found</p>');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("An error occurred: " + error);
                                $('#koi-grid').html('<p>An error occurred while searching. Please try again.</p>');
                            }
                        });
                    }, 300); // 300ms delay
                });


        
                // Prevent form submission
                $('#search-form').submit(function(e) {
                    e.preventDefault();
                    return false;
                });
        
                // Prevent default on enter key
                $('#search-input').on('keypress', function(e) {
                    if (e.which === 13) {
                        e.preventDefault();
                        return false;
                    }
                });
            });
        </script> --}}


    @endsection
