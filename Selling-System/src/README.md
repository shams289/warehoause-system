# سیستەمی بەڕێوەبردنی کۆگا (Warehouse Management System)

A comprehensive warehouse management system built with HTML, CSS, JavaScript, and PHP. The system features a responsive design with a modern sidebar interface and supports Kurdish language.

## Recent Updates

### PHP Conversion
- All HTML files have been converted to PHP to support server-side functionality
- Components (navbar, sidebar) are now loaded dynamically via AJAX
- Fixed CORS issues when accessing components
- Added proper error handling

## Features

The system consists of 8 main sections:

1. **Dashboard**
   - Overview of sales, profits, expenses, and inventory
   - Charts for sales trends and top products
   - Low stock alerts
   - Recent sales list

2. **Product Entry**
   - Form for entering new products into inventory
   - Receipt generation
   - Supplier selection
   - Payment type selection

3. **Add Product**
   - Form for adding new product types to the system
   - Product details including name, code, unit, price, etc.
   - Product categorization
   - Image upload

4. **Product Exit (Sales)**
   - Form for recording product sales
   - Customer selection
   - Automatic price calculation
   - Discount options
   - Receipt printing

5. **Debts**
   - Supplier debts tracking
   - Customer debts tracking
   - Payment scheduling
   - Filtering by date and entity

6. **Accounts**
   - Supplier management
   - Customer management
   - Transaction history

7. **Expenses**
   - Employee payments
   - Shipping costs
   - Other expenses
   - Expense categorization

8. **Reports**
   - Daily and monthly reports
   - Sales, profits, and expenses analysis
   - Chart and table views
   - Export to PDF and Excel

## Technical Details

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP
- **UI Framework**: Bootstrap 5
- **Icons**: Font Awesome
- **Charts**: Chart.js
- **Data Storage**: MySQL (planned)
- **RTL Support**: Full support for Kurdish language
- **Responsive Design**: Works on mobile, tablet, and desktop

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/warehouse-system.git
   ```

2. Place the project folder in your web server directory (e.g., htdocs for XAMPP)

3. Access the application through your web server:
   ```
   http://localhost/inventory/
   ```

## Server Requirements

- PHP 7.4 or higher
- Apache or Nginx web server
- XAMPP, WAMP, MAMP, or any PHP development environment

## Component System Documentation

### Overview
This document explains the modular component system implemented in the application. The system extracts common UI elements like the navbar and sidebar into separate reusable components.

### Structure
- `components/navbar.php` - Contains the navigation bar HTML
- `components/sidebar.php` - Contains the sidebar menu HTML
- `js/include-components.js` - JavaScript for loading and initializing components

### How to Use

#### Including Components in a Page
To include the navbar and sidebar in any page, follow these steps:

1. Add placeholder containers in your HTML:
```html
<!-- Navbar container - will be populated by JavaScript -->
<div id="navbar-container"></div>

<!-- Sidebar container - will be populated by JavaScript -->
<div id="sidebar-container"></div>
```

2. Include the component loader script before your page-specific scripts:
```html
<!-- Component loading script -->
<script src="js/include-components.js"></script>
```

3. The components will be automatically loaded and initialized when the page loads.

#### Creating New Pages
When creating a new page, ensure it has:
1. The navbar and sidebar container divs
2. The include-components.js script reference

#### Modifying Components
To modify a component:
1. Edit the respective file in the components directory
2. The changes will be reflected in all pages that use the component

### Benefits
- Code reusability - No need to duplicate navbar and sidebar code
- Easier maintenance - Update once, reflect everywhere
- Consistent UI across all pages
- Reduced file size for individual pages 