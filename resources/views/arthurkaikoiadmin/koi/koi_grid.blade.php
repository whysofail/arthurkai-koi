@extends("layouts.apparthuradm")

@section("title", "List Koi")

@section("css")

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .pagination nav {
        /* display: none !important; */
        justify-content: center !important;
        }

        .pagination nav {
        justify-content: center !important;
        }
        .pagination nav > div:first-of-type {
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
            min-height: 36em;
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

@section("content")
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
                        <a href="{{ route("dashboard") }}" style="color:black;">
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
                <div class="w_content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-4">
                                        <a href="{{ route("cmskoiAdd") }}">
                                            <button type="button" class="btn btn-success"
                                                style=" background: green; color: white; "><b>+ Add KOI</b></button>
                                        </a>
                                        <button id="print-koi-grid" class="btn btn-primary">Print Koi Grid</button>
                                    </div>
                                    <div class="col-sm-5">
                                        {{-- <div class="btn-group">
                                            <a href="#" type="button" class="btn btn-default btn-flat disabled"><i
                                                    class="fas fa-filter"></i></a>
                                            <a href="{{ route("cmskoigfilteraz") }}" type="button"
                                                class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-down"></i></a>
                                            <a href="{{ route("cmskoigfilterza") }}" type="button"
                                                class="btn btn-default btn-flat"><i
                                                    class="fas fa-sort-alpha-up-alt"></i></a>
                                            <a href="{{ route("cmskoigfilter19") }}" type="button"
                                                class="btn btn-default btn-flat"><i
                                                    class="fas fa-sort-numeric-down"></i></a>
                                            <a href="{{ route("cmskoigfilter91") }}" type="button"
                                                class="btn btn-default btn-flat"><i
                                                    class="fas fa-sort-numeric-up-alt"></i></a>
                                            <a href="{{ route("cmskoigfilterpricebuyhigh") }}" type="button"
                                                class="btn btn-default btn-flat"><i class="fas fa-money-bill"></i></a>
                                            <a href="{{ route("cmskoigfilterpricebuylow") }}" type="button"
                                                class="btn btn-default btn-flat"><i class="fas fa-money-bill-alt"></i></a>
                                        </div> --}}
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card-tools">
                                            <form id="search-form" method="GET" action="{{ route('cmskoi') }}">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" id="search-input" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search for koi...">
                                                    <input type="hidden" name="layout" value="grid" /> <!-- Ensure the layout is set to grid -->
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
                                        @if($koi && $koi->isNotEmpty())
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
                    </div>
                </div>
            </div>
         
        </section>

        <!-- end content -->

            <div class="pagination justify-content-center mb-4">
                {{ $koi->links() }} <!-- This will create the pagination links -->
            </div>
        
    @endsection

    @section("script")
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const printButton = document.getElementById('print-koi-grid');

    printButton.addEventListener('click', async function () {
        try {
            console.log('Print button clicked');
            const originalText = printButton.innerText;
            printButton.innerText = 'Generating PDF...';

            // Hide simpleCart shelf items
            let simpleCartItems = document.querySelectorAll('.simpleCart_shelfItem');
            simpleCartItems.forEach(item => {
                item.style.display = 'none';
            });

            // Adjust content box padding
            let contentBoxItems = document.querySelectorAll('.content_box');
            contentBoxItems.forEach(item => {
                item.style.cssText = 'padding: 0 !important;';

            });

            // Adjust koi code padding
            let koiCodeItems = document.querySelectorAll('#koi-code');
            koiCodeItems.forEach(item => {
                item.style.padding = '0';
            });

            let btnMin = document.querySelectorAll('#btn-min');
            btnMin.forEach(item => {
                item.style.cssText = 'padding: 0 !important; display: none !important;';
            });

            let btnDropdown = document.querySelectorAll('#btn-dropdown');
            btnDropdown.forEach(item => {
                item.style.cssText = 'padding: 0 !important; display:none !important;';
            });

            // Remove styling for btn-status
            let btnStatusItems = document.querySelectorAll('#btn-status');
            btnStatusItems.forEach(item => {
                item.style.cssText = 'background: none !important; border: none; padding: 0 !important; color: inherit; font: inherit;';
            });

            console.log('Adjusted styles for elements');

            // Initialize PDF document
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');

            let koiGridItems = document.querySelectorAll('#koi-grid-item');
            if (!koiGridItems.length) {
                throw new Error("No koi grid items found!");
            }
            console.log(`Found ${koiGridItems.length} koi grid items`);

            // PDF layout settings
            const pageWidth = 210; // A4 page width in mm
            const pageHeight = 297; // A4 page height in mm
            const horizontalMargin = 10; // Horizontal margin
            const verticalMargin = 5; // Reduced vertical margin

            const maxItemWidth = (pageWidth - (3 * horizontalMargin)) / 2;
            const maxItemHeight = (pageHeight - (3 * verticalMargin)) / 2;

            const positions = [
                { x: horizontalMargin, y: verticalMargin },
                { x: horizontalMargin + maxItemWidth + horizontalMargin, y: verticalMargin },
                { x: horizontalMargin, y: verticalMargin + maxItemHeight + verticalMargin },
                { x: horizontalMargin + maxItemWidth + horizontalMargin, y: verticalMargin + maxItemHeight + verticalMargin }
            ];

            // Loop through each koi grid item
            for (let i = 0; i < koiGridItems.length; i++) {
                const item = koiGridItems[i];
                const positionIndex = i % 4;

                // Add a new page if necessary
                if (positionIndex === 0 && i !== 0) {
                    pdf.addPage();
                    console.log(`Added new page for item ${i + 1}`);
                }

                const position = positions[positionIndex];

                try {
                    // Generate canvas from the entire item
                    const canvas = await html2canvas(item, { scale: 2, logging: false, useCORS: true });
                    const imgData = canvas.toDataURL('image/png');

                    // Calculate aspect ratio for proper sizing
                    const aspectRatio = canvas.width / canvas.height;
                    let itemWidth, itemHeight;

                    if (aspectRatio > maxItemWidth / maxItemHeight) {
                        // Item is wider than the space
                        itemWidth = maxItemWidth;
                        itemHeight = itemWidth / aspectRatio;
                    } else {
                        // Item is taller than the space
                        itemHeight = maxItemHeight;
                        itemWidth = itemHeight * aspectRatio;
                    }

                    // Center the item in its allocated space
                    const xOffset = (maxItemWidth - itemWidth) / 2;
                    const yOffset = (maxItemHeight - itemHeight) / 2;

                    pdf.addImage(imgData, 'PNG', position.x + xOffset, position.y + yOffset, itemWidth, itemHeight);
                    console.log(`Added item ${i + 1} to PDF at position (${position.x + xOffset}, ${position.y + yOffset}) with size ${itemWidth}x${itemHeight} on page ${Math.floor(i / 4) + 1}`);
                } catch (canvasError) {
                    console.error(`Error generating canvas for item ${i + 1}:`, canvasError);
                }
            }

            console.log('All items processed. Saving PDF...');
            pdf.save('koi-grid.pdf');

            // Restore original styles
            simpleCartItems.forEach(item => {
                item.style.display = '';
            });
            contentBoxItems.forEach(item => {
                item.style.display = '';
            });
            btnStatusItems.forEach(item => {
                item.style.cssText = '';
            });
            btnMin.forEach(item => {
                item.style.cssText = '';
            });
            btnDropdown.forEach(item => {
                item.style.cssText = '';
            });
            console.log('Restored original styles');

            printButton.innerText = originalText;
        } catch (error) {
            console.error('Error during PDF generation:', error);
            printButton.innerText = originalText;
        }
    });
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

    
