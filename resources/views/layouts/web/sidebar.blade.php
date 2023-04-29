<header id="header" class="hder gnhl">
    <div class="container-fluid xl:w-auto">
        <div class="navbar navbar-default" role="navigation" id="nav">
            <div class="container plr0md fw xs-plr60">
                <div class="col-sm-12 plr0md">
                    <div class="cntr-nv">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="sr-only">Toggle navigation</span>
                            </button>
                            <div class="logo"><a href="{{url('/')}}"><img src="{{asset('web/images/logo.png')}}" alt="{{config('app.name')}}"></a></div>
                        </div>
                        <div class="navbar-collapse collapse navbar-ex1-collapse">
                            <div class="mb-search">
                                <div class="cntr-search">
                                    <form action="#" method="post" class="search-ds">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="SEARCH PRODUCTS">
                                            <div class="input-group-btn">
                                                <button class="btn btn-search">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="w-6 h-6 fill-current">
                                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                        <path
                                                            d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="cntr-ac">
                                    <a href="{{url('account/login')}}" class="btn btn-ac">ACCOUNT</a>
                                </div>
                            </div>
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">MENU <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @php $pages = App\Models\PageContent::select('page','page_name')->get();@endphp
                                        @if(!empty($pages)) @foreach($pages as $page)
                                            <li><a href="{{url($page->page_name)}}">{{$page->page}}</a></li>
                                        @endforeach @endif
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRODUCTS <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">EXPLORE OUR RANGE <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                @php $sub_categories = DB::select("SELECT a.category_slug,b.subcategory_name,b.subcategory_slug,b.banner_image FROM `product_categories` as a INNER JOIN product_sub_categories as b on a.id=b.category_id"); @endphp
                                                @if(!empty($sub_categories)) @foreach($sub_categories as $subcat)
                                                    <li><a href="{{url('ct/'.$subcat->category_slug.'/'.$subcat->subcategory_slug)}}">{{$subcat->subcategory_name}}</a></li>
                                                @endforeach @endif
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">EXPLORE BY BRAND <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                @php $get_brand = App\Models\Brand::select('id','barnd_name','barnd_slug')->orderBy('id','DESC')->get();@endphp
                                                @if(!empty($get_brand))
                                                    @foreach($get_brand as $brand)
                                                    <li><a href="{{url('brand/'.$brand->barnd_slug)}}">{{$brand->barnd_name}}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="service-spares.html">SERVICE &AMP; SPARES</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="cntr-search">
                        <form action="#" method="post" class="search-ds">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="SEARCH PRODUCTS">
                                <div class="input-group-btn">
                                    <button class="btn btn-search">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-6 h-6 fill-current">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path
                                                d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="cntr-ac">
                        <a href="{{url('account/login')}}" class="btn btn-ac">ACCOUNT</a>
                    </div>
                    <a href="{{route('cart')}}" class="btn btn-cart">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['quantity'] @endphp
                        @endforeach
                        @if(!empty($total)) {{$total}} @endif
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="59.333px"
                            height="53.667px" viewBox="0 0 59.333 53.667" enable-background="new 0 0 59.333 53.667"
                            xml:space="preserve">
                            <path fill="none" stroke="#000000" stroke-width="3.43" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10" d="M50.667,41.167h-28L8.334,1.5H1.667 M20.334,32.833h31.333L57.834,9.5H12.501 M28.438,44.792c-2.036,0-3.688,1.651-3.688,3.688
    s1.651,3.688,3.688,3.688s3.688-1.651,3.688-3.688S30.474,44.792,28.438,44.792z M44.845,44.792c-2.036,0-3.688,1.651-3.688,3.688
    s1.651,3.688,3.688,3.688s3.688-1.651,3.688-3.688S46.881,44.792,44.845,44.792z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- mobile search 2 -->
            <div class="mb-search search-mb2">
                <div class="cntr-search">
                    <form action="#" method="post" class="search-ds">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="SEARCH PRODUCTS">
                            <div class="input-group-btn">
                                <button class="btn btn-search">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-6 h-6 fill-current">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path
                                            d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- mobile search 2 -->
        </div>
</header>