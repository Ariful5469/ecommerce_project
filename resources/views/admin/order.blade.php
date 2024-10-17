<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
  <style>
    /* Table Styling */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 18px;
      text-align: left;
      background-color: #f9f9f9;
    }

    table th, table td {
      padding: 12px 15px;
      border: 1px solid #ddd;
    }

    table thead {
      background-color: #4CAF50;
      color: white;
    }

    table tr:hover {
      background-color: #f1f1f1;
    }

    table img {
      max-width: 100px;
      border-radius: 5px;
    }

    /* Responsive table styling */
    @media (max-width: 768px) {
      table {
        font-size: 16px;
      }

      table img {
        width: 80px;
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

        <h1>Customer Orders</h1>
        <!-- Order table -->
        <table>
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Image</th>
              <th> Status</th>
              <th>Change Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->rec_address }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->product->title }}</td>
              <td>{{ $item->product->price }} tk</td>

              <td>
                <img src="product/{{ $item->product->image }}" alt="Product Image">
              </td>
              <td>{{ $item->status }}</td>
              <td>
            <a class="btn btn-primary" href="{{ url('on_the_way',$item->id)}}">On The way</a>
            <a class="btn btn-success" href="{{ url('delivered',$item->id)}}">Delivered</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
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
