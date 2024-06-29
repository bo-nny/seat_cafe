 window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                alert('Invalid username or password');
            }
};


function confirmDelete() {
    // Display a confirmation dialog
    if (confirm("Are you sure you want to delete all Records?")) {
        return true; // Proceed with form submission
    } else {
        return false; // Cancel form submission
    }
}


