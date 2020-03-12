$(document).ready(function(){
   
    let container = "#data-table";
    let permissions = $(container).attr("data-permissions");
    let route_crud = $(container).attr("data-route-crud");
    let data_model = $(container).attr("data-model");

    let dataTableColumns = [
        {
            data: 'product_sku',
            name: 'products.sku'
        },
        {
            data: 'product_name',
            name: 'products.name'
        },
        {
            data: 'product_value',
            name: 'products_discounts.product_value',
        },
        {
            data: 'product_date_start',
            name: 'products_discounts.date_start'
        },
        {
            data: 'product_date_end',
            name: 'products_discounts.date_end'
        },
        {
            data: 'key_id',
            name: 'products_discounts.id',
            orderable: false,
            searchable: false,
            render: function(data, type, row, meta) {
                return dataTableRenderButton(row, route_crud, data_model, permissions);
            }
        }
    ];

    dataTableRender({
        "container": container,
        "route_crud": route_crud,
        "columns": dataTableColumns,
        "model": data_model
    });

    

});