<?php
// You can add PHP logic here if needed
?>
<!DOCTYPE html>
<html lang="ku" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پارەدان بە کارمەند - سیستەمی بەڕێوەبردنی کۆگا</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Page CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/employeePayment/style.css">
</head>
<body>
    <!-- Main Content Wrapper -->
    <div id="content" style="margin-top: 100px;">
        <!-- Navbar container - will be populated by JavaScript -->
        <div id="navbar-container"></div>

        <!-- Sidebar container - will be populated by JavaScript -->
        <div id="sidebar-container"></div>
            
        <!-- Main content -->
        <div class="main-content p-3" id="main-content">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="page-title">پارەدان بە کارمەند</h3>
                    </div>
                </div>

                <div class="row">
                    <!-- Left column - Payment form -->
                    <div class="col-lg-8 col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">زیادکردنی پارەدان</h5>
                                
                                <form id="addEmployeePaymentForm">
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="employeeName" class="form-label">ناوی کارمەند</label>
                                            <select id="employeeName" class="form-select" required>
                                                <option value="" selected disabled>کارمەند هەڵبژێرە</option>
                                                <!-- Options will be loaded dynamically from database -->
                                                <option value="1">ئاری محمد</option>
                                                <option value="2">شیلان عمر</option>
                                                <option value="3">هاوڕێ ئەحمەد</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="paymentDate" class="form-label">بەروار</label>
                                            <input type="date" id="paymentDate" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label for="paymentAmount" class="form-label">بڕی پارە</label>
                                            <div class="input-group">
                                                <input type="number" id="paymentAmount" class="form-control" placeholder="بڕی پارە" required>
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="paymentType" class="form-label">جۆری پارەدان</label>
                                            <select id="paymentType" class="form-select">
                                                <option value="" selected disabled>جۆری پارەدان</option>
                                                <option value="salary">مووچە</option>
                                                <option value="bonus">پاداشت</option>
                                                <option value="advance">پێشەکی</option>
                                                <option value="other">جۆری تر</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <div class="col-md-12 mb-3">
                                            <label for="paymentNotes" class="form-label">تێبینی</label>
                                            <textarea id="paymentNotes" class="form-control" rows="3" placeholder="تێبینی لێرە بنووسە..."></textarea>
                                        </div>
                                    </div>
                                    
                                    <hr class="my-4">
                                    
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" id="submitBtn" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i> زیادکردنی پارەدان
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right column - Instructions -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-transparent">
                                <h5 class="card-title mb-0">ڕێنماییەکان</h5>
                            </div>
                            <div class="card-body">
                                <div class="instructions">
                                    <div class="instruction-item mb-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="instruction-icon me-2 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                                <small>1</small>
                                            </div>
                                            <h6 class="mb-0">ناوی کارمەند</h6>
                                        </div>
                                        <p class="text-muted small mb-0">کارمەندی دیاریکراو هەڵبژێرە بۆ پارەدان.</p>
                                    </div>
                                    <div class="instruction-item mb-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="instruction-icon me-2 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                                <small>2</small>
                                            </div>
                                            <h6 class="mb-0">بەروار و بڕ</h6>
                                        </div>
                                        <p class="text-muted small mb-0">بەرواری پارەدان و بڕی پارە دیاری بکە.</p>
                                    </div>
                                    <div class="instruction-item">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="instruction-icon me-2 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                                <small>3</small>
                                            </div>
                                            <h6 class="mb-0">جۆر و تێبینی</h6>
                                        </div>
                                        <p class="text-muted small mb-0">جۆری پارەدان دیاری بکە و تێبینی پێویست بنووسە.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment History Table -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">مێژووی پارەدان</h5>
                                <button class="btn btn-sm btn-outline-primary refresh-btn">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-container">
                                    <!-- Table Controls -->
                                    <div class="table-controls mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 col-sm-6 mb-2 mb-md-0">
                                                <div class="records-per-page">
                                                    <label class="me-2">نیشاندان:</label>
                                                    <div class="custom-select-wrapper">
                                                        <select id="recordsPerPage" class="form-select form-select-sm rounded-pill">
                                                            <option value="5">5</option>
                                                            <option value="10" selected>10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-6">
                                                <div class="search-container">
                                                    <div class="input-group">
                                                        <input type="text" id="tableSearch" class="form-control rounded-pill-start" placeholder="گەڕان لە تەیبڵدا...">
                                                        <span class="input-group-text rounded-pill-end bg-light">
                                                            <i class="fas fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Table Content -->
                                    <div class="table-responsive">
                                        <table id="employeePaymentsTable" class="table custom-table table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>ناوی کارمەند</th>
                                                    <th>بەروار</th>
                                                    <th>بڕی پارە</th>
                                                    <th>جۆری پارەدان</th>
                                                    <th>تێبینی</th>
                                                    <th>کردارەکان</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Sample data - will be replaced with real data from database -->
                                                <tr data-id="1">
                                                    <td>1</td>
                                                    <td>ئاری محمد</td>
                                                    <td>2023/04/15</td>
                                                    <td>$500</td>
                                                    <td><span class="badge rounded-pill bg-success">مووچە</span></td>
                                                    <td>مووچەی مانگی نیسان</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle edit-btn" data-id="1">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle delete-btn" data-id="1">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-id="2">
                                                    <td>2</td>
                                                    <td>شیلان عمر</td>
                                                    <td>2023/04/15</td>
                                                    <td>$450</td>
                                                    <td><span class="badge rounded-pill bg-success">مووچە</span></td>
                                                    <td>مووچەی مانگی نیسان</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle edit-btn" data-id="2">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle delete-btn" data-id="2">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-id="3">
                                                    <td>3</td>
                                                    <td>هاوڕێ ئەحمەد</td>
                                                    <td>2023/04/17</td>
                                                    <td>$100</td>
                                                    <td><span class="badge rounded-pill bg-info">پێشەکی</span></td>
                                                    <td>پێشەکی پارە</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle edit-btn" data-id="3">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle delete-btn" data-id="3">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-id="4">
                                                    <td>4</td>
                                                    <td>دلێر عبدالله</td>
                                                    <td>2023/04/20</td>
                                                    <td>$200</td>
                                                    <td><span class="badge rounded-pill bg-warning text-dark">پاداشت</span></td>
                                                    <td>پاداشتی مانگی نیسان</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle edit-btn" data-id="4">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle delete-btn" data-id="4">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-id="5">
                                                    <td>5</td>
                                                    <td>لانە احمد</td>
                                                    <td>2023/04/25</td>
                                                    <td>$350</td>
                                                    <td><span class="badge rounded-pill bg-success">مووچە</span></td>
                                                    <td>مووچەی مانگی نیسان</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-circle edit-btn" data-id="5">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle delete-btn" data-id="5">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- Table Pagination -->
                                    <div class="table-pagination mt-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 mb-2 mb-md-0">
                                                <div class="pagination-info">
                                                    نیشاندانی <span id="startRecord">1</span> تا <span id="endRecord">5</span> لە کۆی <span id="totalRecords">5</span> تۆمار
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pagination-controls d-flex justify-content-md-end">
                                                    <button id="prevPageBtn" class="btn btn-sm btn-outline-primary rounded-circle me-2" disabled>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </button>
                                                    <div id="paginationNumbers" class="pagination-numbers d-flex">
                                                        <!-- Pagination numbers will be generated by JavaScript -->
                                                        <button class="btn btn-sm btn-primary rounded-circle me-2 active">1</button>
                                                    </div>
                                                    <button id="nextPageBtn" class="btn btn-sm btn-outline-primary rounded-circle">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/include-components.js"></script>
    <script src="js/employeePayment/script.js"></script>
</body>
</html> 