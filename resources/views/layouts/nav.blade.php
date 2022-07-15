<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ cache('default_logo_16_9') }}" height="50" alt="logo icon">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>

    <ul class="metismenu" id="menu">
        @can('dashboard.access')
            <li class="{{ activeRouteIs('adm.index') }}">
                <a href="{{ route('adm.index') }}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
        @endcan

        @hasanyrole('Developer|Admin|SEO|Editor')
            <li class="{{ activeRouteIs('adm.master.*') || activeRouteIs('adm.post-type.*') }}">
                <a class="has-arrow" href="javascript:void(0)">
                    <div class="parent-icon"><i class='bx bx-news'></i></div>
                    <div class="menu-title">Master</div>
                </a>

                <ul>
                    @can('category.access')
                        <li class="{{ activeRouteIs('adm.master.category.*') }}">
                            <a href="{{ route('adm.master.category.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>Kategori
                            </a>
                        </li>
                    @endcan
                    @can('sub-category.access')
                        <li class="{{ activeRouteIs('adm.master.sub-category.*') }}">
                            <a href="{{ route('adm.master.sub-category.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>Sub Kategori
                            </a>
                        </li>
                    @endcan
                    @can('post-type.access')
                        <li class="{{ activeRouteIs('adm.post-type.*') }}">
                            <a href="{{ route('adm.post-type.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>Jenis Postingan
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endhasanyrole

        @hasanyrole('Developer|Admin|SEO|Editor')
            <li class="menu-label">Marketing</li>

            @can('featuredpost.access')
                <li class="{{ activeRouteIs('adm.post-featured.*') }}">
                    <a href="{{ route('adm.post-featured.index') }}">
                        <div class="parent-icon"><i class='bx bxs-news'></i></div>
                        <div class="menu-title">Headline</div>
                    </a>
                </li>
            @endcan

            @can('banner.access')
                <li class="{{ activeRouteIs('adm.marketing.banner.*') }}">
                    <a href="{{ route('adm.marketing.banner.index') }}">
                        <div class="parent-icon"><i class='bx bx-image'></i></div>
                        <div class="menu-title">Banner</div>
                    </a>
                </li>
            @endcan
            @can('faq.access')
                <li class="{{ activeRouteIs('adm.marketing.faq.*') }}">
                    <a href="{{ route('adm.marketing.faq.index') }}">
                        <div class="parent-icon"><i class='bx bx-message-dots'></i></div>
                        <div class="menu-title">FAQ</div>
                    </a>
                </li>
            @endcan
            @can('testimonial.access')
                <li class="{{ activeRouteIs('adm.marketing.testimonial.*') }}">
                    <a href="{{ route('adm.marketing.testimonial.index') }}">
                        <div class="parent-icon"><i class='bx bx-star'></i></div>
                        <div class="menu-title">Testimoni</div>
                    </a>
                </li>
            @endcan
            @can('partner.access')
                <li class="{{ activeRouteIs('adm.marketing.partner.*') }}">
                    <a href="{{ route('adm.marketing.partner.index') }}">
                        <div class="parent-icon"><i class='bx bxs-factory'></i></div>
                        <div class="menu-title">Partner</div>
                    </a>
                </li>
            @endcan

            @can('lead.access')
                <li class="{{ activeRouteIs('adm.lead.*') }}">
                    <a href="{{ route('adm.lead.index') }}">
                        <div class="parent-icon"><i class='bx bx-question-mark'></i></div>
                        <div class="menu-title">Pertanyaan Publik</div>
                    </a>
                </li>
            @endcan
        @endhasanyrole

        @hasanyrole('Developer|Admin|SEO|Editor|Writer')
            <li class="menu-label">Konten</li>

            @can('cms.access')
                <li class="{{ activeRouteIs('adm.cms.*') }}">
                    <a href="{{ route('adm.cms.index') }}">
                        <div class="parent-icon"><i class='bx bxs-book-content'></i></div>
                        <div class="menu-title">CMS</div>
                    </a>
                </li>
            @endcan
            @can('seo.access')
                <li class="{{ activeRouteIs('adm.seo.*') }}">
                    <a href="{{ route('adm.seo.index') }}">
                        <div class="parent-icon"><i class='bx bx-bar-chart-square'></i></div>
                        <div class="menu-title">SEO</div>
                    </a>
                </li>
            @endcan
            @can('tag.access')
                <li class="{{ activeRouteIs('adm.tag.*') }}">
                    <a href="{{ route('adm.tag.index') }}">
                        <div class="parent-icon"><i class='bx bx-tag'></i></div>
                        <div class="menu-title">Tag</div>
                    </a>
                </li>
            @endcan
            @can('post.access')
                <li class="{{ activeRouteIs('adm.post.*') }}">
                    <a class="has-arrow" href="javascript:void(0)">
                        <div class="parent-icon"><i class='bx bx-news'></i></div>
                        <div class="menu-title">Postingan</div>
                    </a>

                    <ul>
                        <li class="{{ !request('type') && request()->routeIs('adm.post.index') ? 'mm-active' : false }}">
                            <a href="{{ route('adm.post.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>Semua Postingan
                            </a>
                        </li>


                        @if (cache('post_types'))
                            @foreach (cache('post_types') as $type)
                                <li class="{{ request('type') == $type->slug_name ? 'mm-active' : false }}">
                                    <a href="{{ route('adm.post.index', ['type' => $type->slug_name]) }}">
                                        <i class="bx bx-right-arrow-alt"></i> {{ $type->name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endcan
        @endhasanyrole

        @hasanyrole('Developer|Admin')
            <li class="menu-label">Access Level</li>
            @can('users.access')
                <li class="{{ activeRouteIs('adm.access-level.user.*') }}">
                    <a href="{{ route('adm.access-level.user.index') }}">
                        <div class="parent-icon"><i class='bx bx-user'></i></div>
                        <div class="menu-title">Users</div>
                    </a>
                </li>
            @endcan
            @can('roles.access')
                <li class="{{ activeRouteIs('adm.access-level.role.*') }}">
                    <a href="{{ route('adm.access-level.role.index') }}">
                        <div class="parent-icon"><i class='bx bx-shield'></i></div>
                        <div class="menu-title">Roles</div>
                    </a>
                </li>
            @endcan
            @can('permissions.access')
                <li class="{{ activeRouteIs('adm.access-level.permission.*') }}">
                    <a href="{{ route('adm.access-level.permission.index') }}">
                        <div class="parent-icon"><i class='bx bx-shield-quarter'></i></div>
                        <div class="menu-title">Permission</div>
                    </a>
                </li>
            @endcan
        @endhasanyrole
    </ul>
</div>
