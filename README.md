# Seat Cafe Management System

## Project Overview

This project is a web-based system designed for a cafe to manage daily transactions, user login, and viewing records. The system consists of three main pages:
1. **Login Page** - For user authentication.
2. **Daily Record Management Page** - For recording daily transactions.
3. **Results Page** - For viewing monthly records.

## Folder Structure

project-folder/
│
├── css/
│   ├── login_styles.css
│   ├── style.css
│   └── result_styles.css
│
├── images/
│   └── pexels-nishess-shakya-401526881-15076694.jpg
│
├── confirmDelete.js
├── authorization.php
├── process.php
├── result.php
├── generate.php
├── db_clean.php
├── db.php
├── edit.php
├── delete.php
├── home.php
├── index.php
└── README.md


## Login Page

**File**: `index.php`

- **Description**: This page allows the user to log in to the system.
- **Main Components**:
  - **Logo**: Displays the cafe logo (located in the `images` folder).
  - **Login Form**: Includes fields for username and password.
  - **Session Handling**: Displays error messages if the login fails.
- **Image**: `./images/pexels-nishess-shakya-401526881-15076694.jpg`

## Daily Record Management Page

**File**: `home.php`

- **Description**: This page allows the user to record daily transactions and manage records.
- **Main Components**:
  - **Header**: Displays the title "Seat Cafe LogBook".
  - **Log Out Button**: Redirects the user to the login page.
  - **Sidebar**: Contains buttons to view results, download PDF, and remove all records.
  - **Form**: Includes fields for cash, card, total (hidden), expenditure, and comments.
- **JavaScript**: `confirmDelete.js` for confirming record deletion.

## Results Page

**File**: `result.php`

- **Description**: This page displays the monthly records in a table format.
- **Main Components**:
  - **Table**: Shows columns for ID, date, cash, card, total, expenditure, comment, and action.
  - **Action Buttons**: Includes edit and delete buttons for each record.
  - **Back Button**: Redirects the user back to the home page.
- **Database Interaction**: Fetches data from the `daily_transactions` table and displays it.

## Additional Files

- **CSS Files**: Located in the `css` folder, providing styles for the login page (`login_styles.css`), daily record management page (`style.css`), and results page (`result_styles.css`).
- **JavaScript File**: `confirmDelete.js` used to confirm deletion of records.
- **PHP Files**: Handle various backend functionalities such as user authorization (`authorization.php`), processing form data (`process.php`), generating results (`result.php`), downloading PDF (`generate.php`), cleaning the database (`db_clean.php`), editing records (`edit.php`), and deleting records (`delete.php`).

## Setup Instructions

1. **Clone the Repository**: 
   ```sh
   git clone https://github.com//.git


 
