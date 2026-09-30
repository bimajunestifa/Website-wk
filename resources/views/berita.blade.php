@extends('layouts.wikrama')

@section('title', 'Berita – SMK Wikrama 1 Garut')

@section('content')
<!-- Page Header / Breadcrumb -->
<header class="uicore uicore-page-title uicore-section uicore-box">
    <div class="uicore-overlay"></div>
    <div class="uicore uicore-container">
        <p class="uicore-animate ui-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{ route('home') }}"><span itemprop="name">Home</span></a>
                <meta itemprop="position" content="1" />
            </span>
            <i class="uicore-separator uicore-i-arrow"></i>
            <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{ route('news') }}"><span itemprop="name">Berita</span></a>
                <meta itemprop="position" content="2" />
            </span>
        </p>
        <h1 class="uicore-title uicore-animate h1 uicore-typo-h1">Berita</h1>
    </div>
</header>

<!-- Main Blog Area -->
<div id="primary" class="content-area">
    <main id="main" class="site-main uicore-section uicore-box uicore">
        <div class="uicore uicore-container uicore-content-wrapper uicore-blog-animation">
            <div class="uicore-archive uicore-post-content">
                
                <!-- Category Filter -->
                <div class="ui-post-filter">
                    <!-- Mobile Select Dropdown -->
                    <select id="ui-category-filter">
                        <option value="{{ route('news') }}" {{ !request('kategori') ? 'selected' : '' }}>All Categories</option>
                        <option value="{{ route('news', ['kategori' => 'Berita']) }}" {{ request('kategori') == 'Berita' ? 'selected' : '' }}>Berita</option>
                        <option value="{{ route('news', ['kategori' => 'Uncategorized']) }}" {{ request('kategori') == 'Uncategorized' ? 'selected' : '' }}>Uncategorized</option>
                    </select>

                    <!-- Desktop Category Links -->
                    <ul class="ui-category-list">
                        <li>
                            <a href="{{ route('news') }}" class="ui-category-link {{ !request('kategori') ? 'ui-active' : '' }}">All Categories</a>
                        </li>
                        <li>
                            <a href="{{ route('news', ['kategori' => 'Berita']) }}" class="ui-category-link {{ request('kategori') == 'Berita' ? 'ui-active' : '' }}">Berita</a>
                        </li>
                        <li>
                            <a href="{{ route('news', ['kategori' => 'Uncategorized']) }}" class="ui-category-link {{ request('kategori') == 'Uncategorized' ? 'ui-active' : '' }}">Uncategorized</a>
                        </li>
                    </ul>
                </div>

                <!-- 3-Column Responsive Grid -->
                <div class="uicore-grid-container uicore-blog-grid uicore-grid-row uicore-grid uicore-landscape-ratio uicore-medium-space animate-3 ui-st-boxed-creative">
                    @forelse($news as $item)
                        <div class="uicore-grid-item uicore-col-md-6 uicore-col-lg-4 uicore-zoom uicore-animate post-{{ $item->id }} post type-post status-publish format-standard has-post-thumbnail hentry category-{{ Str::slug($item->category ?? 'berita') }}">
                            <article class="uicore-post">
                                <div class="uicore-post-wrapper">
                                    <a href="{{ route('news.detail', $item->slug) }}" title="View Post: {{ $item->title }}">
                                        <div class="uicore-blog-img-container uicore-zoom-wrapper">
                                            <div class="uicore-cover-img" style="background-image: url('{{ asset($item->image_url) }}')"></div>
                                        </div>
                                    </a>
                                    <div class="uicore-post-info">
                                        <div class="uicore-post-info-wrapper">
                                            <a href="{{ route('news.detail', $item->slug) }}" title="View Post: {{ $item->title }}">
                                                <h4 class="uicore-post-title">
                                                    <span>{{ $item->title }}</span>
                                                </h4>
                                            </a>
                                            <p>{{ $item->excerpt ?: Str::limit(strip_tags($item->content), 130) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div style="grid-column: 1 / -1; text-align: center; padding: 60px 0;">
                            <p>Belum ada artikel berita dalam kategori ini.</p>
                        </div>
                    @endforelse
                </div>

                <!-- UiCore Authentic Pagination -->
                @if($news->hasPages())
                    <nav aria-label="Posts navigation" class="uicore-pagination">
                        <ul>
                            @if(!$news->onFirstPage())
                                <li class="uicore-page-item">
                                    <a class="uicore-page-link uicore-prev" href="{{ $news->previousPageUrl() }}">Prev</a>
                                </li>
                            @endif

                            @foreach($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                @if($page == $news->currentPage())
                                    <li class="uicore-page-item uicore-active">
                                        <span aria-current="page" class="uicore-page-link current">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="uicore-page-item">
                                        <a class="uicore-page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            @if($news->hasMorePages())
                                <li class="uicore-page-item">
                                    <a class="next uicore-page-link" href="{{ $news->nextPageUrl() }}">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif

            </div>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var filter = document.getElementById('ui-category-filter');
    if (filter) {
        filter.addEventListener('change', function() {
            var selectedCategory = filter.value;
            if (selectedCategory) {
                window.location.href = selectedCategory;
            }
        });
    }
});
</script>
@endpush
