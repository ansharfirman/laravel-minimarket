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
            data: 'measure_name',
            name: 'measures.name',
        },
        {
            data: 'unit_name',
            name: 'units.name'
        },
        {
            data: 'product_value',
            name: 'products_sizes.product_value'
        },
        {
            data: 'key_id',
            name: 'products_sizes.id',
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