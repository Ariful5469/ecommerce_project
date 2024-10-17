<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      /* Styling for the form elements */
      form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      form div {
        margin-bottom: 15px;
      }

      label {
        font-weight: bold;
        font-size: 16px;
        display: block;
        margin-bottom: 5px;
      }

      input[type="text"],
      input[type="number"],
      textarea,
      select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }

      input[type="file"] {
        padding: 5px;
        border: none;
      }

      textarea {
        height: 100px;
        resize: vertical;
      }

      input[type="submit"],
      button {
        padding: 10px 15px;
        background-color: #007bff;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
        width: 100%;
      }

      input[type="submit"]:hover,
      button:hover {
        background-color: #0056b3;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        form {
          width: 90%;
        }
      }
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Add New Product</h2>
        </div>
      </div>

      <div class="container-fluid">
        <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div>
            <label>Product Title</label>
            <input type="text" name="title" required>
          </div>

          <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
          </div>

          <div>
            <label>Price</label>
            <input type="text" name="price" required>
          </div>

          <div>
            <label>Quantity</label>
            <input type="number" name="qty" required>
          </div>

          <div>
            <label>Product Category</label>
            <select name="category" required>
              <option value="">Select an Option</option>
              @foreach($category as $x)
                <option value="{{ $x->category_name }}">{{ $x->category_name }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label>Product Image</label>
            <input type="file" name="image" required>
          </div>

          <div>
            <input type="submit" value="Add Product">
          </div>
        </form>
      </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>
