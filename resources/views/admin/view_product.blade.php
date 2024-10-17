<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
      /* Styling for the product cards */
      .product-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }

      .product-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 15px;
      }

      .product-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .product-description {
        font-size: 16px;
        color: #555;
        margin-bottom: 10px;
      }

      .product-price {
        font-size: 18px;
        font-weight: bold;
        color: #28a745;
        margin-bottom: 10px;
      }

      .delete-btn {
        margin-top: 10px;
      }

      .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
      }

      /* Styling for the search form */
      .search-form {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
      }

      .search-form input {
        width: 300px;
        padding: 5px;
        margin-right: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
      }

      .search-form button {
        padding: 6px 12px;
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
      }

      .search-form button:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <!-- Page Content -->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Product List</h2>
        </div>
      </div>

      <div class="container-fluid">
        <!-- Search Form -->
        <form action="{{ url('search_product') }}" method="GET" class="search-form">
          <input type="text" name="search" placeholder="Search by product name">
          <button type="submit">Search</button>
        </form>

        <div class="row">
          @foreach($product as $x)
          <div class="col-md-4">
            <div class="product-card">
              <img src="/product/{{ $x->image }}" alt="{{ $x->title }}" class="product-image">
              <div class="product-title">{{ $x->title }}</div>
              <div class="product-description">{!! Str::limit($x->description, 25) !!}</div>
              <div>Category: {{ $x->category }}</div>
              <div class="product-price">Price: ${{ $x->price }}</div>
              <div>Quantity: {{ $x->quantity }}</div>
              <a class="btn btn-danger delete-btn" href="{{ url('delete_product',$x->id) }}">Delete</a>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="pagination">
          {{ $product->links() }}
        </div>
      </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>
