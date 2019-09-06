<header>
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-1 flex-center">
                    <a href="{{ asset('/') }}" class=""><img src="{{ asset(@$setting->site_logo) }}" alt="" title=""> </a>
                    <button class="btn-search-mb"><i class="fa fa-search"></i></button>
                    <a id="cd-menu-trigger" href="#0" class=""><span class="cd-menu-icon"></span></a>
                </div>
                <div class="col-md-8 flex-center">
                    {!! $menus !!}
                </div>
                <div class="col-md-3 flex-center mb-abs">
                    <form class="search flex-center">
                        <input type="text" placeholder="Tìm kiếm">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</header>