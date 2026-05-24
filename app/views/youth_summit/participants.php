<?php require APPROOT . '/views//inc/header.php'; ?>
<?php require APPROOT . '/views//inc/navbar.php'; ?>
<?php require APPROOT . '/views//inc/sidebar.php'; ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Youth Database</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URLROOT ?>/welcome">Home</a></li>
                <li class="breadcrumb-item">Youth Summit</li>
                <li class="breadcrumb-item active">Participants</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Participant Directory</h5>
                            <span id="participantCount" class="badge bg-primary fs-6">Total: 0</span>
                        </div>
                        <div id="alertMessage" class="alert alert-dismissible fade hide" role="alert"></div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="participantsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Marital Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7" class="text-center">Loading participants...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Edit Participant Modal -->
<div class="modal fade" id="editParticipantModal" tabindex="-1" aria-labelledby="editParticipantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editParticipantLabel">Edit Participant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editParticipantForm">
                    <input type="hidden" name="participant_id" id="participant_id">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="edit_firstname" class="form-label">Firstname</label>
                            <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edit_middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="edit_middlename" name="middlename">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_surname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="edit_surname" name="surname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edit_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="edit_phone" name="phone" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edit_age" class="form-label">Age Bracket</label>
                            <select class="form-select" id="edit_age" name="age" required>
                                <option value="">Choose...</option>
                                <option value="8yrs - 12yrs">8yrs - 12yrs</option>
                                <option value="13yrs - 18yrs">13yrs - 18yrs</option>
                                <option value="19yrs - 30yrs">19yrs - 30yrs</option>
                                <option value="30yrs - 55yrs">30yrs - 55yrs</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="edit_marital_status" class="form-label">Marital Status</label>
                            <select class="form-select" id="edit_marital_status" name="marital_status" required>
                                <option value="">Choose...</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow">Widow</option>
                                <option value="Widower">Widower</option>
                                <option value="Engaged">Engaged</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_denomination" class="form-label">Denomination</label>
                            <input type="text" class="form-control" id="edit_denomination" name="denomination">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="edit_address" name="address">
                        </div>
                        <div class="col-md-4">
                            <label for="edit_event_ongoing" class="form-label">Event Ongoing</label>
                            <select class="form-select" id="edit_event_ongoing" name="event_ongoing" required>
                                <option value="">Choose...</option>
                                <option value="Youth Summit">Youth Summit</option>
                                <option value="Greater Bethesda">Greater Bethesda</option>
                                <option value="Couples Dinner">Couples Dinner</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="edit_is_member" class="form-label">Is Member</label>
                            <select class="form-select" id="edit_is_member" name="is_member">
                                <option value="">Choose...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveParticipantBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteParticipantModal" tabindex="-1" aria-labelledby="deleteParticipantLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteParticipantLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete this participant?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger btn-sm" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function() {
        const participantsTableElement = document.querySelector('#participantsTable');
        const alertDiv = document.getElementById('alertMessage');
        const participantCountBadge = document.getElementById('participantCount');
        const editModalElement = document.getElementById('editParticipantModal');
        const editModal = new bootstrap.Modal(editModalElement);
        const editForm = document.getElementById('editParticipantForm');
        const saveParticipantBtn = document.getElementById('saveParticipantBtn');
        const deleteModalElement = document.getElementById('deleteParticipantModal');
        const deleteModal = new bootstrap.Modal(deleteModalElement);
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let participantsDataTable;
        let deleteTargetId = null;

        const showAlert = (message, type = 'success') => {
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `${message} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
            setTimeout(() => {
                alertDiv.classList.add('hide');
            }, 5000);
        };

        const buildTable = (participants) => {
            const tbody = participantsTableElement.querySelector('tbody');
            tbody.innerHTML = '';

            participants.forEach((participant, index) => {
                const fullname = [participant.surname, participant.middlename, participant.firstname]
                    .filter(Boolean)
                    .join(' ');

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${fullname}</td>
                    <td>${participant.phone || ''}</td>
                    <td>${participant.email || ''}</td>
                    <td>${participant.age || ''}</td>
                    <td>${participant.marital_status || ''}</td>
                    <td class="d-flex gap-2">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-edit" data-id="${participant.id}">Edit</button>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete" data-id="${participant.id}">Delete</button>
                    </td>
                `;
                tbody.appendChild(row);
            });

            if (participantsDataTable) {
                participantsDataTable.destroy();
            }

            participantsDataTable = new simpleDatatables.DataTable(participantsTableElement, {
                searchable: true,
                fixedHeight: true,
                perPage: 10,
                labels: {
                    placeholder: 'Search participants...',
                    perPage: '{select} entries per page',
                    noRows: 'No participants found',
                    info: 'Showing {start} to {end} of {rows} entries'
                }
            });
        };

        const loadParticipants = () => {
            const endpoint = '<?= URLROOT ?>/youth_summit/getParticipants';
            fetch(endpoint)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error ${response.status}`);
                    }
                    return response.text();
                })
                .then(text => {
                    let data;
                    try {
                        data = JSON.parse(text);
                    } catch (error) {
                        console.error('Invalid JSON from getParticipants:', text);
                        throw error;
                    }
                    if (data.success) {
                        const participants = data.data || [];
                        participantCountBadge.textContent = `Total: ${participants.length}`;
                        buildTable(participants);
                    } else {
                        participantCountBadge.textContent = 'Total: 0';
                        showAlert(data.message || 'Unable to load participants.', 'danger');
                    }
                })
                .catch(error => {
                    console.error('Failed to load participants:', error);
                    participantCountBadge.textContent = 'Total: 0';
                    showAlert('Unable to load participants.', 'danger');
                });
        };

        const openEditModal = (id) => {
            fetch(`<?= URLROOT ?>/youth_summit/edit/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        showAlert(data.message || 'Unable to load participant details.', 'danger');
                        return;
                    }

                    const participant = data.data;
                    document.getElementById('participant_id').value = participant.id;
                    document.getElementById('edit_firstname').value = participant.firstname || '';
                    document.getElementById('edit_middlename').value = participant.middlename || '';
                    document.getElementById('edit_surname').value = participant.surname || '';
                    document.getElementById('edit_phone').value = participant.phone || '';
                    document.getElementById('edit_email').value = participant.email || '';
                    document.getElementById('edit_age').value = participant.age || '';
                    document.getElementById('edit_marital_status').value = participant.marital_status || '';
                    document.getElementById('edit_denomination').value = participant.denomination || '';
                    document.getElementById('edit_address').value = participant.address || '';
                    document.getElementById('edit_event_ongoing').value = participant.event_ongoing || '';
                    document.getElementById('edit_is_member').value = participant.is_member !== null ? participant.is_member : '';

                    editModal.show();
                })
                .catch(() => {
                    showAlert('Unable to load participant details.', 'danger');
                });
        };

        const deleteParticipant = (id) => {
            deleteTargetId = id;
            deleteModal.show();
        };

        const confirmDelete = () => {
            if (!deleteTargetId) {
                return;
            }

            fetch(`<?= URLROOT ?>/youth_summit/delete/${deleteTargetId}`, {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    deleteModal.hide();
                    deleteTargetId = null;

                    if (data.success) {
                        showAlert(data.message, 'success');
                        setTimeout(() => window.location.reload(), 300);
                    } else {
                        showAlert(data.message || 'Unable to delete participant.', 'danger');
                    }
                })
                .catch(() => {
                    deleteModal.hide();
                    deleteTargetId = null;
                    showAlert('Unable to delete participant.', 'danger');
                });
        };

        participantsTableElement.addEventListener('click', (event) => {
            const editButton = event.target.closest('.btn-edit');
            const deleteButton = event.target.closest('.btn-delete');

            if (editButton) {
                openEditModal(editButton.getAttribute('data-id'));
            }

            if (deleteButton) {
                deleteParticipant(deleteButton.getAttribute('data-id'));
            }
        });

        saveParticipantBtn.addEventListener('click', () => {
            const participantId = document.getElementById('participant_id').value;
            const formData = new FormData(editForm);

            fetch(`<?= URLROOT ?>/youth_summit/edit/${participantId}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlert(data.message, 'success');
                        editModal.hide();
                        setTimeout(() => window.location.reload(), 300);
                    } else if (data.errors) {
                        showAlert('Please correct the validation errors and try again.', 'warning');
                    } else {
                        showAlert(data.message || 'Unable to save participant.', 'danger');
                    }
                })
                .catch(() => {
                    showAlert('Unable to save participant.', 'danger');
                });
        });

        confirmDeleteBtn.addEventListener('click', confirmDelete);

        loadParticipants();
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>