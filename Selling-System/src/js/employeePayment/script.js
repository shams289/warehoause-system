$(document).ready(function() {
    // Load components (sidebar, navbar)
    loadComponents();
    
    // Initialize custom table
    initializeTable();
    
    // Set default date to today
    setDefaultDate();
    
    // Form submission handler
    handleFormSubmission();
    
    // Button click handlers
    setupButtonHandlers();
});

/**
 * Load the navbar and sidebar components
 */
function loadComponents() {
    // This function is located in the include-components.js file
    // It will load the navbar and sidebar components
    try {
        $("#navbar-container").load("components/navbar.php");
        $("#sidebar-container").load("components/sidebar.php", function() {
            // Activate the current menu item
            activateSidebarItem();
        });
    } catch (error) {
        console.error("Error loading components:", error);
    }
}

/**
 * Activate the current sidebar menu item
 */
function activateSidebarItem() {
    // Find and activate the expenses menu item
    const expensesMenuItem = $('[href="#expensesSubmenu"]');
    expensesMenuItem.parent().addClass('active');
    expensesMenuItem.attr('aria-expanded', 'true');
    
    // Show the submenu
    const submenu = $('#expensesSubmenu');
    submenu.addClass('show');
    
    // Highlight the employee payment menu item
    const employeePaymentItem = submenu.find('a[href="employeePayment.php"]');
    employeePaymentItem.parent().addClass('active');
}

/**
 * Custom Table Variables
 */
let tableData = [];
let filteredData = [];
let currentPage = 1;
let recordsPerPage = 10;
let totalPages = 1;

/**
 * Initialize the custom table
 */
function initializeTable() {
    // Collect data from the table
    collectTableData();
    
    // Initial table render
    renderTable();
    
    // Setup table event listeners
    setupTableEventListeners();
}

/**
 * Collect data from the table's initial HTML
 */
function collectTableData() {
    const rows = $('#employeePaymentsTable tbody tr');
    
    rows.each(function() {
        const $row = $(this);
        const id = $row.data('id');
        
        const rowData = {
            id: id,
            employeeId: id,
            employeeName: $row.find('td:eq(1)').text(),
            paymentDate: $row.find('td:eq(2)').text(),
            paymentAmount: $row.find('td:eq(3)').text(),
            paymentType: $row.find('td:eq(4)').find('span').text(),
            notes: $row.find('td:eq(5)').text()
        };
        
        tableData.push(rowData);
    });
    
    // Initialize filtered data
    filteredData = [...tableData];
    
    // Update pagination info
    updatePaginationInfo();
}

/**
 * Setup table event listeners
 */
function setupTableEventListeners() {
    // Pagination controls
    $('#prevPageBtn').on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    });
    
    $('#nextPageBtn').on('click', function() {
        if (currentPage < totalPages) {
            currentPage++;
            renderTable();
        }
    });
    
    // Records per page change
    $('#recordsPerPage').on('change', function() {
        recordsPerPage = parseInt($(this).val());
        currentPage = 1; // Reset to first page
        renderTable();
    });
    
    // Search functionality
    $('#tableSearch').on('input', function() {
        const searchQuery = $(this).val().toLowerCase();
        
        if (searchQuery.length === 0) {
            filteredData = [...tableData];
        } else {
            filteredData = tableData.filter(item => {
                return (
                    item.employeeName.toLowerCase().includes(searchQuery) ||
                    item.paymentDate.toLowerCase().includes(searchQuery) ||
                    item.paymentAmount.toLowerCase().includes(searchQuery) ||
                    item.paymentType.toLowerCase().includes(searchQuery) ||
                    item.notes.toLowerCase().includes(searchQuery)
                );
            });
        }
        
        currentPage = 1; // Reset to first page
        renderTable();
    });
    
    // Number pagination clicks
    $(document).on('click', '.pagination-number', function() {
        currentPage = parseInt($(this).text());
        renderTable();
    });
}

/**
 * Render the table with current data and pagination
 */
function renderTable() {
    const tableBody = $('#employeePaymentsTable tbody');
    tableBody.empty();
    
    // Calculate pagination
    updatePaginationInfo();
    
    // Get current page data
    const startIndex = (currentPage - 1) * recordsPerPage;
    const endIndex = Math.min(startIndex + recordsPerPage, filteredData.length);
    const currentPageData = filteredData.slice(startIndex, endIndex);
    
    // No results message
    if (currentPageData.length === 0) {
        tableBody.append(`
            <tr>
                <td colspan="7" class="text-center py-4">
                    <div class="no-results">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <p class="text-muted">هیچ ئەنجامێک نەدۆزرایەوە</p>
                    </div>
                </td>
            </tr>
        `);
    } else {
        // Render rows
        currentPageData.forEach(item => {
            // Determine badge class based on payment type
            let badgeClass = 'bg-secondary';
            if (item.paymentType === 'مووچە') {
                badgeClass = 'bg-success';
            } else if (item.paymentType === 'پێشەکی') {
                badgeClass = 'bg-info';
            } else if (item.paymentType === 'پاداشت') {
                badgeClass = 'bg-warning text-dark';
            }
            
            const rowHtml = `
                <tr data-id="${item.id}" class="fade-in">
                    <td>${item.id}</td>
                    <td>${item.employeeName}</td>
                    <td>${item.paymentDate}</td>
                    <td>${item.paymentAmount}</td>
                    <td><span class="badge rounded-pill ${badgeClass}">${item.paymentType}</span></td>
                    <td>${item.notes}</td>
                    <td>
                        <div class="action-buttons">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle edit-btn" data-id="${item.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle delete-btn" data-id="${item.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            
            tableBody.append(rowHtml);
        });
    }
    
    // Update pagination controls
    updatePaginationControls();
    
    // Update pagination info text
    updatePaginationInfoText();
}

/**
 * Update pagination info
 */
function updatePaginationInfo() {
    totalPages = Math.ceil(filteredData.length / recordsPerPage);
    if (totalPages === 0) totalPages = 1;
    
    // Ensure current page is in valid range
    if (currentPage > totalPages) {
        currentPage = totalPages;
    }
}

/**
 * Update pagination controls
 */
function updatePaginationControls() {
    // Update prev/next buttons
    $('#prevPageBtn').prop('disabled', currentPage === 1);
    $('#nextPageBtn').prop('disabled', currentPage === totalPages);
    
    // Update pagination numbers
    const paginationNumbers = $('#paginationNumbers');
    paginationNumbers.empty();
    
    // Limit the number of pagination buttons shown
    const maxPaginationButtons = 5;
    let startPage = Math.max(1, currentPage - Math.floor(maxPaginationButtons / 2));
    let endPage = Math.min(totalPages, startPage + maxPaginationButtons - 1);
    
    // Adjust if we're at the end
    if (endPage - startPage + 1 < maxPaginationButtons) {
        startPage = Math.max(1, endPage - maxPaginationButtons + 1);
    }
    
    // Add pagination numbers
    for (let i = startPage; i <= endPage; i++) {
        const isActive = i === currentPage;
        const buttonClass = isActive ? 'btn-primary active' : 'btn-outline-primary';
        
        paginationNumbers.append(`
            <button class="btn btn-sm ${buttonClass} rounded-circle me-2 pagination-number">
                ${i}
            </button>
        `);
    }
}

/**
 * Update pagination info text
 */
function updatePaginationInfoText() {
    const startRecord = filteredData.length > 0 ? (currentPage - 1) * recordsPerPage + 1 : 0;
    const endRecord = Math.min(startRecord + recordsPerPage - 1, filteredData.length);
    const totalRecords = filteredData.length;
    
    $('#startRecord').text(startRecord);
    $('#endRecord').text(endRecord);
    $('#totalRecords').text(totalRecords);
}

/**
 * Set the default date to today
 */
function setDefaultDate() {
    const today = new Date();
    const formattedDate = today.toISOString().substring(0, 10);
    $('#paymentDate').val(formattedDate);
}

/**
 * Handle form submission
 */
function handleFormSubmission() {
    $('#addEmployeePaymentForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const employeeId = $('#employeeName').val();
        const employeeName = $('#employeeName option:selected').text();
        const paymentDate = $('#paymentDate').val();
        const paymentAmount = $('#paymentAmount').val();
        const paymentType = $('#paymentType').val();
        const paymentTypeName = $('#paymentType option:selected').text();
        const notes = $('#paymentNotes').val();
        
        if (!employeeId || !paymentDate || !paymentAmount || !paymentType) {
            showAlert('تکایە زانیارییەکان بە تەواوی پڕ بکەوە.', 'danger');
            return;
        }
        
        // Here you would normally send data to the server using AJAX
        // For now, we'll just add a row to the table as a demo
        
        // Get next ID
        const newId = getNextId();
        
        // Create new record
        const newRecord = {
            id: newId,
            employeeId: employeeId,
            employeeName: employeeName,
            paymentDate: formatDate(paymentDate),
            paymentAmount: '$' + paymentAmount,
            paymentType: paymentTypeName,
            notes: notes || ''
        };
        
        // Add to data arrays
        tableData.push(newRecord);
        filteredData.push(newRecord);
        
        // Refresh table display
        currentPage = Math.ceil(tableData.length / recordsPerPage); // Go to last page
        renderTable();
        
        // Reset form
        resetForm();
        
        // Show success message
        showAlert('پارەدان بە سەرکەوتوویی زیادکرا.', 'success');
    });
}

/**
 * Setup button click handlers
 */
function setupButtonHandlers() {
    // Refresh button
    $('.refresh-btn').on('click', function() {
        // Here you would normally reload data from the server
        // For demo purposes, we'll just show an alert and refresh the current view
        filteredData = [...tableData];
        $('#tableSearch').val('');
        currentPage = 1;
        renderTable();
        showAlert('داتاکان نوێکرانەوە.', 'info');
    });
    
    // Edit button
    $(document).on('click', '.edit-btn', function() {
        const id = $(this).data('id');
        // Here you would normally fetch record details from the server
        // For demo purposes, we'll just show an alert
        showAlert('دەستکاری تۆماری ژمارە: ' + id, 'info');
    });
    
    // Delete button
    $(document).on('click', '.delete-btn', function() {
        const id = $(this).data('id');
        if (confirm('دڵنیای لە سڕینەوەی ئەم تۆمارە؟')) {
            // Remove from data arrays
            tableData = tableData.filter(item => item.id !== id);
            filteredData = filteredData.filter(item => item.id !== id);
            
            // Refresh table display
            renderTable();
            
            showAlert('تۆمار بە سەرکەوتوویی سڕایەوە.', 'success');
        }
    });
}

/**
 * Reset the form fields
 */
function resetForm() {
    $('#employeeName').val('');
    setDefaultDate();
    $('#paymentAmount').val('');
    $('#paymentType').val('');
    $('#paymentNotes').val('');
}

/**
 * Get the next ID for a new record
 */
function getNextId() {
    let maxId = 0;
    tableData.forEach(item => {
        if (item.id > maxId) {
            maxId = item.id;
        }
    });
    
    return maxId + 1;
}

/**
 * Format a date string to a more readable format
 */
function formatDate(dateString) {
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', options).replace(/\//g, '/');
}

/**
 * Show an alert message
 */
function showAlert(message, type) {
    const alertHtml = `
        <div class="alert alert-${type} alert-dismissible fade show mt-3" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    
    const alertContainer = $('<div>').html(alertHtml);
    $('#main-content').prepend(alertContainer);
    
    // Auto-dismiss after 3 seconds
    setTimeout(function() {
        alertContainer.fadeOut('slow', function() {
            $(this).remove();
        });
    }, 3000);
} 