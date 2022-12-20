        
    // add dynamic row
    $("#add_product_item").click(function(){
        x++;
        var html = '<div class="row" id="material-row-'+ x +'">\
                        <div class="col-md-3">\
                            <label for=""><b>Material Name</b></label>\
                            <input type="text" name="name[]"\
                                class="form-control"\>\
                        </div>\
                        <div class="col-md">\
                            <label for=""><b>Quantity</b></label>\
                            <input type="text" name="quantity[]" id="quantity-'+x+'"\
                                class="form-control"\
                                onchange="calculator('+ x +')">\
                        </div>\
                        <div class="col-md">\
                            <label for=""><b>Unit</b></label>\
                            <input type="text" name="unit[]" id="unit-'+x+'"\
                                class="form-control">\
                        </div>\
                        <div class="col-md">\
                            <label for=""><b>Unit Price</b></label>\
                            <input type="text" name="unit_price[]" id="unit_price-'+x+'"\
                                class="form-control"\
                                onchange="calculator('+x+')">\
                        </div>\
                        <div class="col-md">\
                            <label for=""><b>Discount(%)</b></label>\
                            <input type="text" name="discount[]" id="discount-'+x+'"\
                                class="form-control"\
                                onkeyup="calculator('+x+')"\>\
                        </div>\
                        <div class="col-md">\
                            <label><b>Sub Total</b></label>\
                            <input type="text" name="sub_total[]" class="form-control" id="single-total-'+x+'">\
                        </div>\
                        <div class="col-md p-2 ">\
                            <div class="btn btn-danger mt-4" id="remove_product_item" onclick="deleteRow('+x+')">\
                                <i class="fas fa-times"></i>\
                            </div>\
                        </div>\
                    </div>';

        
        $("#product_item").append(html);
    })


    // delete dynamic row
    var deleteRow = (rowId) => {

        $("#product_item #material-row-"+rowId+"").remove();
        x--;
        totalCount();
    }


    // calculate sub total
    var calculator = (key) => {

        let quantity = Number($('#quantity-'+key).val());
        let unit_price = Number($('#unit_price-'+key).val());
        let discount = Number($('#discount-'+key).val());

        // alert(key);

        // console.log(quantity, unit_price, discount);

        if(quantity != '' && unit_price != '')
        {
            // get total unit price
            let total_unit_price = quantity * unit_price;
            let singleTotal = total_unit_price - ((total_unit_price * discount) / 100);

            // show value
            $("#single-total-"+key).val(singleTotal.toFixed(2));

            totalCount();
            
        }
    }


    // calculate grand total
    let totalCount = () => {

        let transportCost   = Number($("#transport_cost").val());
        let totalPaid       = Number($("#total_paid").val());
        let totalBill = 0;
        // alert(x);
        for(i=0; i<=x; i++)
        {
            totalBill += Number($("#single-total-"+i).val());
        }

        totalBill = totalBill + transportCost;
        let due = totalBill - totalPaid;

        $("#total_bill").val(totalBill.toFixed(2));
        $("#due").val(due.toFixed(2));

    }