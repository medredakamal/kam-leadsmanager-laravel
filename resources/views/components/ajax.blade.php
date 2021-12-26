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
                // Get response & message from data
                let {
                    res,
                    msg
                } = data;
                // Load All Leads
                loadAllLeads();
                // Reset Add Lead Form
                resetForm("add_lead_form");
                // Show notification
                $.notify(msg, res);
                },
            error: (err) => {
                if (!$('#add_lead_form').hasClass('was-validated')) {
                        $('#add_lead_form').addClass('was-validated')
                }
                let {
                    errors,
                    message
                } = err.responseJSON;
                for (let [key, value] of Object.entries(errors)) {
                    $.notify(value);
                }
            }
        });
    }

    // FUNC: clear modal form
    function clearModal(formid) {
        let modalForm = $("#" + formid).find("form");
        return modalForm.length > 0 ? modalForm.trigger("reset") : false;
    }


    // Edit Lead Modal
    var editLeadModal = new bootstrap.Modal(document.getElementById('editLeadModal'), {});
    // FUNC: edit lead
    function editLead(e, id) {
        e.preventDefault();

        // show edit lead modal
        editLeadModal.show();

        // edit lead modal on show
        $('#editLeadModal').on('shown.bs.modal', function() {
            console.log('shown');
            if ($(this).hasClass('show')) {
                let getLeadRow;
                getLeadRow = $(`#leads_table #${id}`);
                let leadData = {
                    "fullname": getLeadRow.find("td[data-name=fullname]").text().trim(),
                    "email": getLeadRow.find("td[data-name=email]").text().trim(),
                    "phonenumber": getLeadRow.find("td[data-name=phonenumber]").text().trim(),
                    "location": getLeadRow.find("td[data-name=location]").text().trim()
                }

                $("#update_lead_form input[name=id]").val(id);
                $("#update_lead_form input[name=fullname]").val(leadData.fullname);
                $("#update_lead_form input[name=email]").val(leadData.email);
                $("#update_lead_form input[name=phonenumber]").val(leadData.phonenumber);
                $("#update_lead_form input[name=location]").val(leadData.location);

                $("#btn_updatelead").click(function() {
                    let updateLeadData = $("#update_lead_form").serialize();

                    $.ajax({
                        url: `{{ route('leads.updatelead') }}`,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        data: updateLeadData,
                        type: "PUT",
                        success: (data) => {
                            let {
                                msg,
                                res
                            } = data;
                            // Load All Leads
                            loadAllLeads();
                            // Clear Form Modal
                            clearModal("editLeadModal");
                            // Hide Modal
                            editLeadModal.hide();
                            // Show notification
                            $.notify(msg, res);
                        },
                        error: (err) => {
                            let {
                                errors,
                                message
                            } = err.responseJSON;
                            for (let errvalue of Object.values(errors)) {
                                $.notify(errvalue);
                            }
                        }
                    });

                });
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
