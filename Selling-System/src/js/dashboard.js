// Dashboard.js - JavaScript for dashboard functionality
// For ASHKAN Warehouse Management System

document.addEventListener('DOMContentLoaded', function() {
    // Check if Chart is defined
    if (typeof Chart === 'undefined') {
        console.error('Chart.js is not loaded. Charts will not be initialized.');
        // Try to load Chart.js dynamically
        const scriptElement = document.createElement('script');
        scriptElement.src = 'https://cdn.jsdelivr.net/npm/chart.js';
        scriptElement.onload = function() {
            console.log('Chart.js loaded dynamically');
            initCharts();
        };
        document.head.appendChild(scriptElement);
        } else {
        initCharts();
    }
    
    // Initialize notification toggle directly here as a backup
    initNotificationToggle();
});

// Initialize all charts
function initCharts() {
    // Initialize charts if elements exist
    if (document.getElementById('salesChart')) {
        initSalesChart();
    }
    
    if (document.getElementById('inventoryChart')) {
        initInventoryChart();
    }
}

// Initialize Sales Chart
function initSalesChart() {
    if (typeof Chart === 'undefined') {
        console.error('Chart.js is not loaded. Sales chart will not be initialized.');
        return;
    }
    
    const salesChartElement = document.getElementById('salesChart');
    if (!salesChartElement) return;
    
    const ctx = salesChartElement.getContext('2d');
    
    const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: ['هەفتە ١', 'هەفتە ٢', 'هەفتە ٣', 'هەفتە ٤', 'هەفتە ٥', 'هەفتە ٦'],
                datasets: [{
                label: 'فرۆشتن',
                data: [12500, 19200, 15600, 24800, 18300, 27500],
                backgroundColor: 'rgba(115, 128, 236, 0.1)',
                borderColor: '#7380ec',
                    borderWidth: 2,
                tension: 0.4,
                pointBackgroundColor: '#7380ec',
                pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                y: {
                    beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                            return context.dataset.label + ': $' + context.parsed.y.toLocaleString();
                        }
                    }
                }
                }
            }
        });
    }

// Initialize Inventory Chart
function initInventoryChart() {
    if (typeof Chart === 'undefined') {
        console.error('Chart.js is not loaded. Inventory chart will not be initialized.');
        return;
    }
    
    const inventoryChartElement = document.getElementById('inventoryChart');
    if (!inventoryChartElement) return;
    
    const ctx = inventoryChartElement.getContext('2d');
    
    const inventoryChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels: ['پڕبوو', 'بەتاڵ'],
                datasets: [{
                data: [68, 32],
                backgroundColor: ['#7380ec', '#eef0f6'],
                    borderWidth: 0,
                cutout: '80%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                            return context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                }
            }
        });
}

// Initialize notification toggle functionality
function initNotificationToggle() {
    const notificationToggle = document.getElementById('notificationToggle');
    const notificationPanel = document.querySelector('.notification-panel');
    const closeButton = document.querySelector('.btn-close-panel');
    
    if (notificationToggle && notificationPanel) {
        notificationToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            notificationPanel.classList.toggle('show');
        });
    }
    
    if (closeButton && notificationPanel) {
        closeButton.addEventListener('click', function() {
            notificationPanel.classList.remove('show');
        });
    }
    
    // Close notification panel when clicking outside
    document.addEventListener('click', function(e) {
        if (notificationPanel && notificationPanel.classList.contains('show') &&
            !notificationPanel.contains(e.target) &&
            e.target !== notificationToggle &&
            !notificationToggle.contains(e.target)) {
            notificationPanel.classList.remove('show');
        }
    });
}