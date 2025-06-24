@extends('frontend.layouts.app')
@section('title', 'Cart |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    @auth
        @include('components.frontend.profile-nav-div')
    @endauth

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </section>

    <div id="cart_div">
        {{-- @if ($cartItems) --}}
        <section class="my-0 my-3" style="" v-if="cartItems.length != 0">
            <div class="container">
                <h3 class="h2 main-head text-center text-red my-0 my-sm-3">Cart</h3>
                <div class="row d-flex flex-md-row">
                    <div class="col-md-8 col-lg-9 __cart-ui-f">
                        <div class="row d-flex justify-content-center justify-content-lg-end __cart-ui-nav mx-1">
                            <div class="col-sm-12 px-0">
                                <div
                                    class="d-none d-lg-flex cc-border justify-content-between p-3 justify-content-between __cart-ui-nav-des">
                                    <div class="fw-bold px-5">Product</div>
                                    <ul class="d-flex gap-5 list-unstyled p-0 m-0">
                                        <li class="fw-bold px-4 px-xl-3 px-xxl-5">Price</li>
                                        <li class="fw-bold px-2 px-xl-2 px-xxl-3">Quantity</li>
                                        <li class="fw-bold px-2 px-xl-3 px-xxl-4">Total</li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div v-for="(item,key) in cartItems" :key="key">
                            <div class="row cc-border my-3 mx-1  __cart-ui-card" style="padding:15px">
                                <div class="__cart-ui-close-btn"><button type="button" class="btn-close" aria-label="Close"
                                        @click="removeItemFromCart(key,item['item_id'])"></button>
                                </div>
                                <div class=" col-md-4 col-lg-3">
                                    <div
                                        class="d-flex align-items-center justify-content-center justify-content-md-start gap-1 __cart-ui-img-in">
                                        <img :src="item['thumbnail_image']" alt="..." class="img-fluid img-border"
                                            style="max-width: 146px;max-height: 146px;object-fit: contain;">
                                        {{-- <img :src="asset('storage/images/products/'.item['thumbnail_image'])" alt="..."
                                        class="img-fluid img-border"> --}}
                                    </div>
                                </div>

                                <div
                                    class="col-md-8 col-lg-3 col-xl-4  justify-content-md-start justify-content-center mt-3 mt-md-0 d-flex align-items-center    ">
                                    <div class="">
                                        <h5 class="main-head">@{{ item['name'] }}</h5>
                                        {{-- <p class="p-0 __cart-ui-pra">
                                        {{ $c->product->short_descriptions }}
                                    </p> --}}

                                    </div>
                                </div>

                                <div
                                    class="col-md-12 col-lg-6 col-xl-5 d-flex justify-content-center align-items-center justify-content-between flex-row my-3 my-lg-0">
                                    <ul class="p-0 m-0">
                                        <li class="no-bullet "><s class="text-muted">₹@{{ item['mrp'] }}</s></li>
                                        <li class="no-bullet  "><strong>₹@{{ item['final_price'] }}</strong></li>
                                        <li v-if="item['stock']" class="no-bullet text-green">In Stock</li>
                                        <li v-if="!item['stock']" class="no-bullet text-red">Out of Stock</li>
                                    </ul>
                                    <div class="input-group align-items-center counter" style="width:124px;">
                                        <button type="button" class="input-group-text decrease-quantity"
                                            @click="decreaseQuantity(key,item['id'])">-</button>
                                        <input type="number" id="qty"
                                            class="form-control text-center quantity-input px-0" :value="item['quantity']">
                                        <button type="button" class="input-group-text increase-quantity"
                                            @click="increaseQuantity(key,item['id'])">+</button>
                                    </div>
                                    <div class="d-md-inline">
                                        ₹@{{ item['total_price'] }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="padding-order-summary">
                            <h5 class="main-head">Order Summary</h5>
                            <hr style="border-bottom: 2px solid #000000;">

                            <div class="d-flex justify-content-between my-3">
                                <strong>Total:</strong>
                                <strong>@{{ subTotal }}</strong>
                            </div>

                            <div>
                                <form action="{{ route('frontend.cart.checkout') }}" method="GET">
                                    <button type="submit" class="btn mt-3 btn-orange-outline-hover w-100 my-2  p-1 p-xl-2">
                                        Proceed To Checkout
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        {{-- @else --}}
        <div v-if="cartItems.length == 0">
            @include('frontend.not-found', ['type' => 'Cart'])
        </div>
        {{-- @endif --}}

    </div>

@endsection
@section('js')

    <script>
        createApp({
            data() {
                return {
                    cartItems: [],
                    subTotal: 0
                }
            },
            methods: {
                getCartItems() {
                    axios.post("{{ route('frontend.get.cart_items.api') }}")
                        .then(res => {
                            // console.log(res);
                            if (res.data.status) {
                                this.cartItems = res.data.cartItems;
                                this.subTotal = res.data.subTotal;
                            } else {
                                Snackbar.show({
                                    text: res.data.message,
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            }
                        })
                        .catch(err => {
                            Snackbar.show({
                                text: "Internal Error",
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        });
                },
                increaseQuantity(key, product_id) {
                    axios.post("{{ route('frontend.api.cart_items.increase_quantity') }}", {
                            product_id
                        })
                        .then(res => {
                            console.log(res);
                            if (res.data.status) {
                                this.cartItems[key]['quantity'] = res.data.quantity;
                                this.cartItems[key]['total_price'] = res.data.total_price;
                                this.subTotal = res.data.subTotal;
                            } else {
                                Snackbar.show({
                                    text: res.data.message,
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            }
                        })
                        .catch(err => {
                            Snackbar.show({
                                text: "Internal Error",
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        });
                },
                decreaseQuantity(key, product_id) {
                    if (this.cartItems[key]['quantity'] == 1) {
                        return 0;
                    }
                    axios.post("{{ route('frontend.api.cart_items.decrease_quantity') }}", {
                            product_id
                        })
                        .then(res => {
                            // console.log(res);
                            if (res.data.status) {
                                this.cartItems[key]['quantity'] = res.data.quantity;
                                this.cartItems[key]['total_price'] = res.data.total_price;
                                this.subTotal = res.data.subTotal;
                            } else {
                                Snackbar.show({
                                    text: res.data.message,
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            }
                        })
                        .catch(err => {
                            Snackbar.show({
                                text: "Internal Error",
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        });

                },
                removeItemFromCart(key, item_id) {
                    // console.log(key, product_id);
                    axios.post("{{ route('frontend.api.cart_item.remove') }}", {
                            item_id
                        })
                        .then(res => {
                            // console.log(res);
                            if (res.data.status) {
                                this.cartItems.splice(key, 1);
                                subTotal = 0;
                                this.cartItems.forEach(element => {
                                    subTotal += parseFloat(element['total_price']);
                                });
                                this.subTotal = subTotal;

                                Snackbar.show({
                                    text: res.data.message,
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#1abc9c'
                                });
                            } else {
                                Snackbar.show({
                                    text: res.data.message,
                                    pos: 'top-right',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            }
                        })
                        .catch(err => {
                            Snackbar.show({
                                text: "Internal Error",
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        });


                }
            },
            async created() {
                this.getCartItems();
            }
        }).mount('#cart_div')
    </script>
@endsection
