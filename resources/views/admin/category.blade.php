<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
       input[type='text'] {
        width: 400px;
        height: 50px;
       }

       .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
       }

       .table_deg
       {
         text-align: center;
         margin:auto;
         border:2px solid yellowgreen;
         margin-top: 50px;
       }

       th
       {
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color:white;
       }
       td
       {
        color:white;
        padding: 10px;
        border: 1px solid skyblue;
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
          <!-- Body Section for Category-->
          <h1 style="color:white">Add Category</h1>

          <div class="div_deg">
            <form action="{{ url('add_category') }}" method="post">
              @csrf  <!-- CSRF Token is required for form submission -->
              <div>
                <input type="text" name="category" placeholder="Enter category name">
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </form>
          </div> 
          
        <div>
           <table class="table_deg">
                   <tr>
                       <th> Category Name </th>
                       <th> Edit </th>
                       <th> Delete </th>
                   </tr>

                 @foreach($data as $item)
                <tr>
                    <td>{{ $item->category_name }}</td>

                    <td>
                        <a class = "btn btn-success" href="{{ url('edit_category', $item->id) }}">Edit</a>
                    </td>


                    <td>
                        <a class = "btn btn-danger" href="{{ url('delete_category', $item->id) }}">Delete</a>
                    </td>
                </tr>
                 @endforeach

           </table>
        <div>
          
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
