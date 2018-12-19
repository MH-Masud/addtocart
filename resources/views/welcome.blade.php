<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <select class="form-control" name="product" id="product">
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-8">
               {{--  <form class="form-inline"> --}}
                    <input type="text" name="name" id="name" readonly="">
                    <input type="text" name="color" id="color" readonly>
                    <input type="text" name="unit" id="unit" readonly="">
                    <input type="text" name="price" id="price" readonly>
                    <button id="add_btn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></button>
                {{-- </form> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                <form method="post" action="{{ route('addcart') }}">
                    {{csrf_field()}}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Unit</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="table_body">
                        
                    </tbody>
                </table>
                <input type="submit" name="submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('#product').on('change',function(){
            var id = $(this).val();
            $.ajax({
                url:"{{ route('product') }}",
                method:"get",
                data:{id:id},
                dataType:'json',
                success:function(data){
                    $('#name').val(data.name);
                    $('#color').val(data.color);
                    $('#unit').val(data.unit);
                    $('#price').val(data.price);
                }
            });
        });
        $('#add_btn').click(function(){
            var id = $('#product').val();
            if (id != '') {

                var row_count = $('#table_body').find('tr').length+1;
                var name = $('#name').val();
                var color = $('#color').val();
                var unit = $('#unit').val();
                var price = $('#price').val();
                var row = "<tr><td>"+row_count+"</td><td><input type='text' name='name[]' value="+name+"></td><td><input type='text' name='color[]' value="+color+"></td><td><input type='text' name='unit[]' value="+unit+"></td><td><input type='text' name='price[]' value="+price+"></td></tr>";
                $("table tbody").append(row);
            }
        });
    });
</script>
</body>
</html>