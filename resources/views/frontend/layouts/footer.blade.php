<footer>
    <section class="footer-top">
        <div class="container">
            <div class="footer-flex">
                <div class="col-20">
                    <div class="footer-1">
                        <div class="logo-footer mgb-20"><a href="" title=""><img src="{{ asset($setting->site_logo) }}"
                                                                                 alt="" title=""> </a></div>
                        <div class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                            commodo viverra maecenas accumsan lacus vel facilisis.
                        </div>
                    </div>
                </div>
                <div class="col-30">
                    <h4>Thể Loại</h4>
                    <?php
                    $cate_theloai = DB::table('cate_movie')->where('slug', 'the-loai')->first();
                    $id_theloai = $cate_theloai->id;
                    $list_theloai = DB::table('cate_movie')->select('id','name', 'slug')->where('parent_id', $id_theloai)->get();
                    ?>
                    <div class="footer-2">
                        <ul>
                            @if (!empty($list_theloai))
                                @foreach ($list_theloai as $theloai)
                                    <li><a href="/dongphim/album/{{@$theloai->slug}}-{{@$theloai->id}}.htm" title="">{{ @$theloai->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-30">
                    <h4>Phim Bộ</h4>
                    <div class="footer-2">
                        <?php
                        $cate_phimbo = DB::table('cate_movie')->where('slug', 'phim-bo')->first();
                        $id_phimbo = $cate_phimbo->id;
                        $list_phimbo = DB::table('cate_movie')->select('id','name', 'slug')->where('parent_id', $id_phimbo)->get();
                        ?>
                        <ul>
                            @if (!empty($list_phimbo))
                                @foreach ($list_phimbo as $phimbo)
                                    <li><a href="/dongphim/album/{{@$phimbo->slug}}-{{@$phimbo->id}}.htm" title="">{{ @$phimbo->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-20 col-20-end">
                    <h4>Quốc Gia</h4>
                    <div class="footer-3">
                        <?php
                        $cate_quocgia = DB::table('cate_movie')->where('slug', 'quoc-gia')->first();
                        $id_quocgia = $cate_quocgia->id;
                        $list_quocgia = DB::table('cate_movie')->select('id','name', 'slug')->where('parent_id', $id_quocgia)->get();
                        ?>
                        <ul>
                            @if (!empty($list_quocgia))
                                @foreach ($list_quocgia as $quocgia)
                                    <li><a href="/dongphim/album/{{@$quocgia->slug}}-{{@$quocgia->id}}.htm" title="">{{ @$quocgia->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="container">
            <p><a href="" title="">yeuphimhot.com</a></p>
        </div>
    </section>
</footer>