@extends('frontend.layouts.app')
@section('title', 'Fragrances |')

@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection

@section('content')

    <section>


        <div class="container mb-5">
            <div class="row mt-5">
                <div class="col-lg-5 col-xl-4">
                    <h2 class="main-head text-red">Best In Fragrance</h2>
                </div>
                <div class="col-lg-7 col-xl-5 ">
                    <div class="d-flex gap-4 justify-content-between flex-column flex-sm-row my-4 my-lg-0">
                        <div>
                            <form action="" method="post" class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2"
                                        style="background: rgba(251, 140, 165, 0.2);">
                                        <button type="submit" class="border-0"
                                            style="background: rgba(251, 140, 165, 0.2);"><i
                                                class="fas fa-search fa-fw text-red"></i></button>
                                    </span>

                                </div>
                            </form>
                        </div>
                        <div class="d-flex gap-3 align-items-baseline">
                            <div>For</div>
                            <div class="pro-radio-btn" >
                                <input type="radio" class="btn-check" name="options" id="option01" autocomplete="off">
                                <label class="btn" for="option01">Him</label>
                            </div>
                            <div class="pro-radio-btn">
                                <input type="radio" class="btn-check" name="options" id="option02" autocomplete="off">
                                <label class="btn" for="option02">Her</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-5">
                        <div>Items per page</div>
                        <div style="width: 100px">
                            <select class="form-select form-select-lg mb-3 top-product-des" aria-label=".form-select-lg example" style="font-size: 16px">
                                <option selected class="top-product-text">10</option>
                                <option value="1" class="top-product-text">20</option>
                                <option value="2" class="top-product-text">30</option>
                                <option value="3" class="top-product-text">40</option>
                            </select>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-5">
                        <div>Sort By</div>
                        <div style="width:160px">
                            <select class="form-select form-select-lg mb-3 top-product-des" aria-label=".form-select-lg example" style="font-size: 16px">
                                <option selected class="top-product-text">Featured</option>
                                <option value="1" class="top-product-text">Best selling</option>
                                <option value="2" class="top-product-text">A to A</option>
                                <option value="3" class="top-product-text">under 100</option>
                                <option value="3" class="top-product-text">under 200</option>
                                <option value="3" class="top-product-text">under 300</option>
                            </select>
                        </div>
                    </div>


                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">

                    <div class="mt-producttabs style2 wow fadeInUp p-0" data-wow-delay="0.6s">

                        <ul class="producttabs pro-slidetab">
                            <li><a href="#__skincare" class="active main-head">Fragrance</a></li>
                            <li><a href="#__skinlatest" class="main-head">Latest</a></li>
                            <li><a href="#__skinbestseller" class="main-head">Best Seller</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">

                        <div id="__skincare">

                            <div class="product-show-grid">

                                @for ($i = 0; $i <= 10; $i++)
                                    <div class=" product-show-grid-card ">
                                        <div class="product-card-img">
                                            <button class="btn wishlist">
                                                <span class="has-tool-tip">
                                                    <span class="icon">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                    <span class="tool-tip-text">Add to wishlist</span>
                                                </span>
                                            </button>
                                            <img src="https://via.placeholder.com/300" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title font-head fw-bold">
                                                Essence Long Lasting Eye care Pencil
                                            </h4>
                                            <small class="text-muted">
                                                Intense & Long-lasting
                                            </small>
                                            <div class="price">
                                                ₹2,707 <s class="text-danger">₹4,509</s>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn btn-orange">
                                                    Shop now
                                                </a>
                                                <a href="#" class="btn btn-pink ">
                                                    Add ToCart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" product-show-grid-card ">
                                        <div class="product-card-img">
                                            <button class="btn wishlist">
                                                <span class="has-tool-tip">
                                                    <span class="icon">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                    <span class="tool-tip-text">Add to wishlist</span>
                                                </span>
                                            </button>
                                            <img src="https://via.placeholder.com/300" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title font-head fw-bold">
                                                Essence Long Lasting Eye care Pencil
                                            </h4>
                                            <small class="text-muted">
                                                Intense & Long-lasting
                                            </small>
                                            <div class="price">
                                                ₹2,707 <s class="text-danger">₹4,509</s>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn btn-orange">
                                                    Shop now
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-outline-pink ">
                                                    <i class="fa-solid fa-check"></i> Added
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>


                        </div>

                        <div id="__skinlatest">
                            <div class="product-show-grid">

                                @for ($i = 0; $i <= 10; $i++)
                                    <div class=" product-show-grid-card ">
                                        <div class="product-card-img">
                                            <button class="btn wishlist">
                                                <span class="has-tool-tip">
                                                    <span class="icon">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                    <span class="tool-tip-text">Add to wishlist</span>
                                                </span>
                                            </button>
                                            <img src="https://via.placeholder.com/300" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title font-head fw-bold">
                                                Essence Long Lasting Eye care Pencil
                                            </h4>
                                            <small class="text-muted">
                                                Intense & Long-lasting
                                            </small>
                                            <div class="price">
                                                ₹2,707 <s class="text-danger">₹4,509</s>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn btn-orange">
                                                    Shop now
                                                </a>
                                                <a href="#" class="btn btn-pink ">
                                                    Add ToCart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" product-show-grid-card ">
                                        <div class="product-card-img">
                                            <button class="btn wishlist">
                                                <span class="has-tool-tip">
                                                    <span class="icon">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                    <span class="tool-tip-text">Add to wishlist</span>
                                                </span>
                                            </button>
                                            <img src="https://via.placeholder.com/300" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title font-head fw-bold">
                                                Essence Long Lasting Eye care Pencil
                                            </h4>
                                            <small class="text-muted">
                                                Intense & Long-lasting
                                            </small>
                                            <div class="price">
                                                ₹2,707 <s class="text-danger">₹4,509</s>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn btn-orange">
                                                    Shop now
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-outline-pink ">
                                                    <i class="fa-solid fa-check"></i> Added
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>

                        </div>


                        <div id="__skinbestseller">
                            <div class="product-show-grid">

                                @for ($i = 0; $i <= 10; $i++)
                                    <div class=" product-show-grid-card ">
                                        <div class="product-card-img">
                                            <button class="btn wishlist">
                                                <span class="has-tool-tip">
                                                    <span class="icon">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                    <span class="tool-tip-text">Add to wishlist</span>
                                                </span>
                                            </button>
                                            <img src="https://via.placeholder.com/300" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title font-head fw-bold">
                                                Essence Long Lasting Eye care Pencil
                                            </h4>
                                            <small class="text-muted">
                                                Intense & Long-lasting
                                            </small>
                                            <div class="price">
                                                ₹2,707 <s class="text-danger">₹4,509</s>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn btn-orange">
                                                    Shop now
                                                </a>
                                                <a href="#" class="btn btn-pink ">
                                                    Add ToCart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" product-show-grid-card ">
                                        <div class="product-card-img">
                                            <button class="btn wishlist">
                                                <span class="has-tool-tip">
                                                    <span class="icon">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                    <span class="tool-tip-text">Add to wishlist</span>
                                                </span>
                                            </button>
                                            <img src="https://via.placeholder.com/300" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title font-head fw-bold">
                                                Essence Long Lasting Eye care Pencil
                                            </h4>
                                            <small class="text-muted">
                                                Intense & Long-lasting
                                            </small>
                                            <div class="price">
                                                ₹2,707 <s class="text-danger">₹4,509</s>
                                            </div>
                                            <div class="buttons">
                                                <a href="#" class="btn btn-orange">
                                                    Shop now
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-outline-pink ">
                                                    <i class="fa-solid fa-check"></i> Added
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>

                        </div>



                    </div>



                </div>
            </div>
        </div>




    </section>

@endsection
