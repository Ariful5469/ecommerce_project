<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.css') <!-- Include any existing CSS -->
  <style>
    /* Styling the table */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 18px;
      text-align: left;
    }

    table thead {
      background-color: #f2f2f2;
    }

    table th,
    table td {
      padding: 12px 15px;
      border: 1px solid #ddd;
    }

    table tr:hover {
      background-color: #f1f1f1;
    }

    table thead th {
      background-color: #4CAF50;
      color: white;
    }

    table tbody td {
      background-color: #f9f9f9;
    }

    /* Styling for product image */
    table img {
      max-width: 100px;
      border-radius: 5px;
    }

    /* Total price styling */
    .total-row td {
      font-weight: bold;
      background-color: #e9e9e9;
      color: #333;
      text-align: right;
    }

    .total-row .total-label {
      text-align: left;
      font-size: 20px;
    }

    .total-row .total-amount {
      font-size: 22px;
      color: #4CAF50;
    }

    /* Remove button styling */
    .btn-danger {
      background-color: #ff4c4c;
      color: white;
      padding: 8px 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    .btn-danger:hover {
      background-color: #ff0000;
    }

    /* Order form styling */
    .order-section {
      margin-top: 30px;
    }

    .order-section form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .order-section label {
      font-size: 16px;
    }

    .order-section input,
    .order-section textarea {
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 100%;
    }

    .btn-success {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      font-size: 16px;
    }

    .btn-success:hover {
      background-color: #45a049;
    }

    /* Add space between the button and the footer */
    .order-section {
      margin-bottom: 50px; /* Add some bottom margin */
    }

    /* Footer spacing */
    footer {
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->

    <!-- Table section -->
    <div class="container">
      <h1>Cart Details</h1>
      <table>
        <thead>
          <tr>
            <th>Product Image</th> <!-- New column for the image -->
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          @php
          $totalPrice = 0; // Variable to store the total price
          @endphp
          
          @foreach($cart as $x)
          <tr>
            <td>
              <img src="product/{{ $x->product->image }}" alt="Product Image"> <!-- Display the image -->
            </td>
            <td>{{ $x->product->title }}</td>
            <td>{{ $x->product->price }} tk</td>

            <!-- Remove button -->
            <td>
              <form action="{{ url('remove_cart', $x->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Remove</button>
              </form>
            </td>
          </tr>

          @php
          // Add product price to the total price
          $totalPrice += $x->product->price;
          @endphp

          @endforeach
        </tbody>
        <tfoot>
          <tr class="total-row">
            <td colspan="3" class="total-label">Total Price</td> <!-- Adjusted colspan -->
            <td class="total-amount">{{ $totalPrice }} tk</td>
          </tr>
        </tfoot>
      </table>

      <!-- Place Order Section -->
      <div class="order-section">
        <h2>Place Your Order</h2>
        <form action="{{ url('confirm_order') }}" method="POST">
          @csrf
          <div>
            <label for="name">Receiver Name</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}">
          </div>
          <div>
            <label for="rec_address">Receiver Address</label>
            <textarea name="address">{{ Auth::user()->address }}</textarea>
          </div>
          <div>
            <label for="phone">Receiver Phone</label>
            <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}">
          </div>
          <button type="submit" class="btn btn-primary">Cash On Delivery</button>
          <a class="btn btn-success" href="{{ url('stripe',$totalPrice)}}">Pay Using Card</a>
        </form>
      </div>
    </div>

    <!-- footer section -->
    <footer>
      @include('home.footer')
    </footer>
    <!-- end footer section -->
  </div>

  <!-- Optional JavaScript for confirmation -->
  <script>
    document.querySelectorAll('.btn-danger').forEach(function(button) {
      button.addEventListener('click', function(event) {
        if (!confirm('Are you sure you want to remove this item from the cart?')) {
          event.preventDefault();
        }
      });
    });
  </script>

</body>

</html>
