@extends('layouts.front')
@section('content')
<section class="dashboard-inner-banner">
    <div class="breadcrb">
        <ol>
            <li>
                <span>Cart Detail </span>
            </li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 class="gredient-text">Cart Details</h3>
            </div>
        </div>
    </div>
</section>
<section class="faq-sec">
    <div class="container">
        <div class="row card">
            <div class="col-md-10 m-auto">
                <div class="privacy-policy-box">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <div class="pt-4 wish-list">
                                @if(count($data))
                                <h5 class="mb-4">Cart (<span>{{ count($data) }}</span> items)</h5>
                                    @foreach ($data as $key => $value)
                                        <div class="row mb-4">
                                            <div class="col-md-5 col-lg-3 col-xl-3">
                                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                                    <a href="#!">
                                                        <div class="mask">
                                                            <img class="img-fluid w-100"
                                                                src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg">
                                                            <div class="mask rgba-black-slight"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-7 col-lg-9 col-xl-9">
                                                <div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="">
                                                            <h5>Blue denim shirt</h5>
                                                            <p class="mb-1 text-muted text-uppercase small">Size:  </p>
                                                        </div>
                                                        <div class="">
                                                            <input type="number" name="quantity" value="1"> 
                                                        </div>
                                                    </div>
    
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                                class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                            <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                                                                class="fas fa-heart mr-1"></i> Move to wish list </a>
                                                        </div>
                                                        <p class="mb-0"><span><strong id="summary">$17.99</strong></span></p class="mb-0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                    @endforeach
                                    @else 
                                        <p> Your Cart is empty 
                                    <a href="{{ route('front.artist.painting.list') }}" class="btn btn-info" >  Add Paintings </a>
                                    </p>

                                    @endif
                                    <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
                                        items to your cart does not mean booking them.
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <div class="pt-4">
                                    <h5 class="mb-4">Expected shipping delivery</h5>
                                    <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
                                </div>
                            </div> --}}
                            {{-- <div class="mb-3">
                                <div class="pt-4">
                                    <h5 class="mb-4">We accept</h5>
                                    <img class="mr-2" width="45px"
                                        src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                        alt="Visa">
                                    <img class="mr-2" width="45px"
                                        src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                        alt="American Express">
                                    <img class="mr-2" width="45px"
                                        src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                        alt="Mastercard">
                                    <img class="mr-2" width="45px"
                                        src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
                                        alt="PayPal acceptance mark">
                                </div>
                            </div> --}}
                        </div>
                        @if(count($data))
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <div class="pt-4">
                                    <h5 class="mb-3">The total amount of</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            Temporary amount
                                            <span>$25.98</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            Shipping
                                            <span>Gratis</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>The total amount of</strong>
                                                <strong>
                                                    <p class="mb-0">(including VAT)</p>
                                                </strong>
                                            </div>
                                            <span><strong>$53.98</strong></span>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-primary btn-block">go to checkout</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="pt-4">
                                    <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                    Add a discount code (optional)
                                    <span><i class="fas fa-chevron-down pt-1"></i></span>
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                        <div class="mt-3">
                                            <div class="md-form md-outline mb-0">
                                                <input type="text" id="discount-code" class="form-control font-weight-light"
                                                    placeholder="Enter discount code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script>
    $('.add-to-cart').on('click', (e) => {
    addToCart(e.currentTarget)
    })
    
    const addToCart = (product) => {
    const productId = $(product).attr('productId');
    const isAlreadyInCart = $.grep(productsInCart, el => {return el.id == productId}).length;
    
    if (isAlreadyInCart) {
    $.each(storageData, (i, el) => {
      if (productId == el.id) {
        el.itemsNumber += 1;
      }
    })
    } else {
    const newProduct = {
      id: Number(productId),
      itemsNumber: 1
    }
    
    storageData.push(newProduct);
    }
    
    updateCart();
    updateProductList();
    }
    
</script>
@endsection
<!-- <script src="assets/js/jquery.validate.min.js"></script> -->