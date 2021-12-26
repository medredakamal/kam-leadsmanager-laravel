<script>
    // FUNC: Load Leads on the table DOM
    function fillLeadsTable(tableID, getData) {

        let tableDOM = $(tableID);
        let tableData = '';
        if (getData.leads.length <= 0) {
            tableData += `<tr>
                <td colspan="5">No Leads.</td>
                </tr>`;
        }
        for (let i = 0; i < getData.leads.length; i++) {
            tableData += `<tr id="` + getData.leads[i].id + `" class="lead_row">
                    <th scope="row">` + getData.leads[i].id + `</th>
                    <td data-name="fullname">` + getData.leads[i].fullname + `</td>
                    <td data-name="email">` + getData.leads[i].email + `</td>
                    <td data-name="phonenumber">` + getData.leads[i].phonenumber + `</td>
                    <td data-name="location">` + getData.leads[i].location + `</td>
                    <td class="lead_actions">
                        <a href="#" onclick="editLead(event,` + getData.leads[i].id + `);" class="mr-3"><i class="bi bi-pen"></i></a>
                        <a href="#" onclick="deleteLead(event,` + getData.leads[i].id + `);"><i class="bi bi-trash text-danger"></i></a>
                    </td>
                </tr>`;
        }
        tableDOM.html(tableData);
    }

    // FUNC: load all leads
    function loadAllLeads() {
        $.ajax({
            url: `{{ route('leads.getleads') }}`,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "GET",
            success: (data) => {
                fillLeadsTable("#leads_table tbody", data);
            },

        });
    }

    // FUNC : Reset Form
    function resetForm(id) {
        $(`#${id}`).trigger("reset");
    }

    // FUNC: Add Lead
    function ajaxAddLead(addLeadData) {
        $('#add_lead_form').removeClass('was-validated')
        $.ajax({
            url: `{{ route('leads.addlead') }}`,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: addLeadData,
            type: "POST",
            success: (data) => {
                // Load leads table
                loadAllLeads();
                // Reset form
                resetForm("add_lead_form");
            },
            error: (err) => {
                if (!$('#add_lead_form').hasClass('was-validated')) {
                    $('#add_lead_form').addClass('was-validated')
                }
                let {
                    message
                } = err.responseJSON;
                alert(message);
            }
        });
    }


    // Init
    loadAllLeads();

    // Add Lead
    let addLeadBtn = $('#btn_addlead');
    let addLeadForm = $('#add_lead_form');
    let addLeadData = [];

    addLeadBtn.on('click', function(ev) {
        ev.preventDefault();
        addLeadForm.submit();
    });

    addLeadForm.on('submit', function(e) {
        e.preventDefault();
        addLeadData = addLeadForm.serialize();
        ajaxAddLead(addLeadData);
    });
</script>
