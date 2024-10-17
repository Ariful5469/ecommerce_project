<section class="slider_section">
  <div class="slider_container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-7 d-flex align-items-center">
                              <div class="detail-box">
                                  <h1 class="title">
                                      Welcome To Our Shop<br>
                                      <span>My-Shop</span>
                                  </h1>
                                  <p class="description">
                                    Welcome to our Online Shop, you find here a wide range of high-quality products.
                                  </p>
                                  <a href="" class="btn btn-primary">
                                      Contact Us
                                  </a>
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="img-box">
                                  <img style="width:100%; border-radius: 5px;" src="product/shop.jpg" alt="MyShop" />
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Add the new styles -->
<style>
  /* Overall Section Styling */
  .slider_section {
      background-color: #f9f9f9;
      padding: 20px 0;
  }

  .slider_section .slider_container {
      border-radius: 8px;
      overflow: hidden;
  }

  /* Title Styling */
  .slider_section .title {
      font-size: 2rem;
      font-weight: bold;
      color: #343a40;
  }

  .slider_section .title span {
      color: #ff6347; /* Accent color */
      font-size: 3rem;
      font-weight: bold;
  }

  /* Description Styling */
  .slider_section .description {
      font-size: 1rem;
      color: #6c757d;
      margin: 15px 0;
      max-width: 600px;
  }

  /* Button Styling */
  .slider_section .btn {
      background-color: #ff6347;
      color: white;
      padding: 8px 20px;
      border-radius: 40px;
      font-size: 1rem;
      font-weight: bold;
      transition: background-color 0.3s ease;
  }

  .slider_section .btn:hover {
      background-color: #343a40;
  }

  /* Image Styling */
  .slider_section .img-box img {
      width: 100%;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.2);
  }

  /* Media Queries for Mobile Responsiveness */
  @media (max-width: 768px) {
      .slider_section .title {
          font-size: 2rem;
      }

      .slider_section .title span {
          font-size: 2.5rem;
      }

      .slider_section .description {
          font-size: 1rem;
      }
  }
</style>
