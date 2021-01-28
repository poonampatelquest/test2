@extends('layouts.front')
@section('content')
<section class="dashboard-inner-banner">
   <div class="breadcrb">
      <ol>
        <li>
          <span>FAQs</span>
        </li>

      </ol>        
</div>  
  <div class="container">
     <div class="row">
       <div class="col-md-7">
          <h4>FAQs</h4>
          <h2 class="gredient-text">How can we Help You?</h2>
       </div>
     </div>
  </div>
</section>


<section class="faq-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="accordion faq-block" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          How the Art will be digitalized ?
                          <span class="inc-icon plus"><i class="fas fa-plus"></i></span>
                          <span class="inc-icon minus"><i class="fas fa-minus"></i></span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        Artist needs to register with us by providing the basic details and uploading their Art for verification. Our system will generate a unique code for each painting. Securely add the unique code on NFC tag by your mobile or computer. Paste the unique code at the back of the art. This is how your Art can get digitalized with the help of blockchain and IoT. And in this way the Art can be secured and certified.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                         How the Art is related to the Blockchain technology ?
                          <span class="inc-icon plus"><i class="fas fa-plus"></i></span>
                          <span class="inc-icon minus"><i class="fas fa-minus"></i></span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" >
                      <div class="card-body">
                        Making use of Blockchain technology in Art can help the artist to tokenize their work, track ownership and provenance. It helps to authenticate the Art and decentralize the data of the Art. By using Blockchain each Art data can be stored on multiple blocks and person can easily get all the data by just scanning the unique code. Thus Blockchain will help to secure the Art and maintain the uniqueness of the Art.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          How can I buy or sell the art on your site ?
                          <span class="inc-icon plus"><i class="fas fa-plus"></i></span>
                          <span class="inc-icon minus"><i class="fas fa-minus"></i></span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" >
                      <div class="card-body">
                        Artist can register with us and then they can post their art with its description and selling price. The Art will have certificate of authentication and a tag which will help to authenticate the Art. And similarly for buying purpose a person can just simply add the Art to the cart and can buy the art by paying the price of the Art. This is a very simple and easy procedure. We will take care of the security and delivery of the valuable Art. You can also gift an Artwork from our website. 
                      </div>
                    </div>
                  </div>
                </div> 
            </div>
        </div>
    </div>
</section>


@endsection