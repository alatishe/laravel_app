(function () {

    FTX.Rates = {

        list: {
        
            selectors: {
                rates_table: $('#rates-table'),
            },
        
            init: function () {

                this.selectors.rates_table.dataTable({

                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.rates_table.data('ajax_url'),
                        type: 'post',
                    },
                    columns: [
                        { data: 'option_name', name: 'option_name' },
                        { data: 'upper_weight', name: 'upper_weight' },
                        { data: 'lower_weight', name: 'lower_weight' },
                        { data: 'upper_height', name: 'upper_height' },
                        { data: 'lower_height', name: 'lower_height' },
                        { data: 'upper_width', name: 'upper_width' },
                        { data: 'lower_width', name: 'lower_width' },
                        { data: 'price', name: 'price', searchable: false, sortable: false }
                    ],
                    order: [[0, "asc"]],
                    searchDelay: 500,
                    "createdRow": function (row, data, dataIndex) {
                        FTX.Utils.dtAnchorToForm(row);
                    }
                });
            }
        }
    }
})();