(function () {

    FTX.Carriers = {

        list: {
        
            selectors: {
                carriers_table: $('#carriers-table'),
            },
        
            init: function () {

                this.selectors.carriers_table.dataTable({

                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.carriers_table.data('ajax_url'),
                        type: 'post',
                    },
                    columns: [

                        { data: 'partner_name', name: 'partner_name' },
                        { data: 'partner_email', name: 'partner_email' },
                        { data: 'carrier_name', name: 'carrier_name' },
                        { data: 'actions', name: 'actions', searchable: true, sortable: false },

                    ],
                    order: [[0, "asc"]],
                    searchDelay: 500,
                    "createdRow": function (row, data, dataIndex) {
                        FTX.Utils.dtAnchorToForm(row);
                    }
                });
            }
        },

        edit: {
            init: function (locale) {
                FTX.tinyMCE.init(locale);                
            }
        },
    }
})();