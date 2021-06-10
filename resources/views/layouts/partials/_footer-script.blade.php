<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>


    
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    
    $(".datatable").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('.sa-delete').on('click', function(){

        let form_id = $(this).data('form-id');
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $('#'+form_id).submit();
        }
        });
    });
</script>

<script
    src="https://code.jquery.com/jquery-2.2.4.js"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous">
</script>

    <!-- Add Product to List -->
    <script>
        $('#show-product').on('click', function(e){
            var product_id= $('#name').val();
            var total_products = $('#qty_products').val();
            $('#null').empty();
            $('select').find('option:selected').remove(); 
            $.get('/list-product?id='+product_id, function(data){
                
                $.each(data, function(index, productObj){
                    var html="<tr>";
                        html+=  "<td width='30%'>";
                        html+=  "<h5>"+productObj.name+"</h5>";
                        html+=  "<p> ₱ "+productObj.price+"</p>";
                        html+=  "</td>";
                        html+=  "<td width='20%'>";
                        html+=  "<input type='number' name='total_products[]' id='total_products"+product_id+"' class='form-control' value='"+total_products+"'>";
                        html+=  "</td>";
                        html+=  "<td width='20%'>";
                        html+=  "<p id='label_total_prices"+product_id+"'>"+productObj.price * total_products+"</p>";
                        html+=  "<input type='hidden' name='total_prices[]' id='total_prices"+product_id+"' class='form-control amount' value='"+productObj.price * total_products+"' >";
                        html+=  "<input type='hidden' name='product_id[]' value='"+product_id+"'>";
                        html+=  "</td>";
                        html+=  "</tr>";

                    // display html value on #list-product
                    $('#list-product').append(html);

                    // display total payment
                    var total = 0;

                    $('.amount').each(function() {
                        total += parseInt($(this).val(),10);
                    });
                    $('#total_payment').val(total);

                    //when #total_products"+product_id keyup run function 
                    $("#total_products"+product_id).on('input',function(){
                        var a = $("#total_products"+product_id).val();
                        var b = productObj.price;
                        var c = a*b; 

                        //display total price per item 
                        $("#total_prices"+product_id).val(c);
                        $("#label_total_prices"+product_id).html(c);

                        //display total price all item
                        var total = 0;

                        $('.amount').each(function() {
                            total += parseInt($(this).val(),10);
                        });
                        $('#total_payment').val(total);
                    })
                    
                    //display change
                    $('#payment').on('input',function(){
                        var payment = $('#payment').val();
                        var change = payment-total;
                        $('#label-change').html("₱" +change);
                        $('#change').val(change);
                    });

                    $('#order_qty').val(total_products);
                    

                })
            });
        });

        
    </script>

@stack('scripts')