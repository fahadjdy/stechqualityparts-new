<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>S Tech Quality Parts — Product Catalogue</title>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            color: #1e293b;
            font-size: 11px;
            line-height: 1.5;
        }

        /* ===== COVER PAGE ===== */
        .cover-page {
            width: 100%;
            height: 188mm;
            overflow: hidden;
            background: #2563eb;
            color: white;
            text-align: center;
            padding: 350px 60px 60px;
        }

        .cover-page .logo-area {
            margin-bottom: 40px;
        }

        .cover-page .logo-area img {
            height: 80px;
            margin: 0 auto;
        }

        .cover-page .logo-fallback {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 900;
            margin: 0 auto;
        }

        .cover-page h1 {
            font-size: 36px;
            font-weight: 900;
            letter-spacing: -1px;
            margin-bottom: 8px;
        }

        .cover-page .tagline {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 50px;
        }

        .cover-page .divider {
            width: 60px;
            height: 3px;
            background: rgba(255, 255, 255, 0.4);
            margin: 0 auto 50px;
            border-radius: 2px;
        }

        .cover-page .company-name {
            font-size: 28px;
            font-weight: 900;
        }

        .cover-page .company-sub {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 6px;
        }

        .cover-page .contact-strip {
            margin-top: 80px;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.5);
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: #f8fafc;
            border-bottom: 2px solid #2563eb;
            padding: 14px 30px;
            display: table;
            width: 100%;
            page-break-before: always;
        }

        .page-header .left {
            display: table-cell;
            vertical-align: middle;
            width: 60%;
        }

        .page-header .right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            width: 40%;
            font-size: 9px;
            color: #64748b;
        }

        .page-header .company {
            font-size: 14px;
            font-weight: 900;
            color: #1e293b;
        }

        .page-header .company span {
            color: #2563eb;
        }

        .page-header .sub {
            font-size: 8px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .page-header img {
            height: 36px;
            margin-right: 10px;
            float: left;
        }

        /* ===== PRODUCT GRID (2 per row) ===== */
        .products-wrapper {
            padding: 20px 30px;
        }

        .product-row {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .product-card {
            display: table-cell;
            width: 48%;
            vertical-align: top;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            background: #ffffff;
        }

        .product-card+.product-card {
            margin-left: 4%;
        }

        .product-spacer {
            display: table-cell;
            width: 4%;
        }

        .product-card .img-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #f1f5f9;
            text-align: center;
            vertical-align: middle;
        }

        .product-card .img-container img {
            max-width: 100%;
            max-height: 200px;
            margin: 0 auto;
            display: block;
        }

        .product-card .info {
            padding: 14px 16px;
            border-top: 2px solid #2563eb;
        }

        .product-card .info .category-tag {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #2563eb;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .product-card .info h3 {
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 3px;
        }

        .product-card .info .code {
            font-size: 10px;
            color: #94a3b8;
            font-family: monospace;
        }

        /* ===== PAGE FOOTER ===== */
        .page-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #0f172a;
            color: rgba(255, 255, 255, 0.5);
            text-align: center;
            font-size: 8px;
            padding: 8px 30px;
        }

        .page-footer a {
            color: #60a5fa;
            text-decoration: none;
        }

        /* ===== UTILITY ===== */
        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    <!-- ===== COVER PAGE ===== -->
    <div class="cover-page">
        <div class="logo-area">
            @if($profile && $profile->logo)
                <img src="{{ public_path('storage/' . $profile->logo) }}" alt="Logo">
            @else
                <div class="logo-fallback">S</div>
            @endif
        </div>
        <h1>Product Catalogue</h1>
        <div class="tagline">Premium Quality Auto Parts</div>
        <div class="divider"></div>
        <div class="company-name">{{ $profile->name ?? 'S Tech Quality Parts' }}</div>
        <div class="company-sub">Trusted Manufacturer of Mahindra Bolero Spare Parts</div>
        <div class="contact-strip">
            {{ $profile->email ?? 'info@stechqualityparts.com' }} &nbsp;|&nbsp;
            {{ $profile->contact ?? '+91 8128912711' }} &nbsp;|&nbsp;
            {{ $profile->location ?? 'Gujarat, India' }}
        </div>
    </div>

    <!-- ===== PRODUCT PAGES ===== -->
    @if($products->count())
        @foreach($products->chunk(4) as $chunkIndex => $chunk)

            <!-- Page Header -->
            <div class="page-header">
                <div class="left">
                    @if($profile && $profile->logo)
                        <img src="{{ public_path('storage/' . $profile->logo) }}" alt="Logo">
                    @endif
                    <div class="company">S Tech <span>Quality Parts</span></div>
                    <div class="sub">Product Catalogue</div>
                </div>
                <div class="right">
                    {{ $profile->contact ?? '+91 8128912711' }}<br>
                    {{ $profile->email ?? 'info@stechqualityparts.com' }}
                </div>
            </div>

            <!-- Products (2 per row, 4 per page) -->
            <div class="products-wrapper">
                @foreach($chunk->chunk(2) as $row)
                    <div class="product-row">
                        @foreach($row as $product)
                            <div class="product-card">
                                <div class="img-container">
                                    @if($product->image)
                                        <img src="{{ public_path('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <div style="padding:60px 0; color:#cbd5e1; font-size:36px; text-align:center;">
                                            &#9881;
                                        </div>
                                    @endif
                                </div>
                                <div class="info">
                                    <div class="category-tag">{{ $product->category->name ?? 'Spare Parts' }}</div>
                                    <h3>{{ $product->name }}</h3>
                                    @if($product->code)
                                        <div class="code">Code: {{ $product->code }}</div>
                                    @endif
                                </div>
                            </div>
                            @if(!$loop->last)
                                <div class="product-spacer"></div>
                            @endif
                        @endforeach
                        @if($row->count() == 1)
                            <div class="product-spacer"></div>
                            <div class="product-card" style="border:none; background:transparent;"></div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif

    <!-- Fixed Footer -->
    <div class="page-footer">
        {{ $profile->name ?? 'S Tech Quality Parts' }} &nbsp;&bull;&nbsp;
        {{ $profile->location ?? 'Gujarat, India' }} &nbsp;&bull;&nbsp;
        <a href="https://stechqualityparts.com">stechqualityparts.com</a>
    </div>

</body>

</html>