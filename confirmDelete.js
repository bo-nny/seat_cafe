// confirmDelete.js

function confirmDelete() {
    // Display a confirmation dialog
    if (confirm("Are you sure you want to delete all records?")) {
        return true; // Proceed with form submission
    } else {
        return false; // Cancel form submission
    }
}
