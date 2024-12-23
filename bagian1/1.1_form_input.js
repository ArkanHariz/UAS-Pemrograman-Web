document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("signup-form");
    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    const terms = document.getElementById("terms");

    // Helper function to show error message
    function showError(input, message) {
        const formGroup = input.parentElement;
        let error = formGroup.querySelector(".error-message");

        if (!error) {
            error = document.createElement("small");
            error.className = "error-message";
            error.style.color = "red";
            formGroup.appendChild(error);
        }

        error.textContent = message;
        input.style.borderColor = "red";
    }

    // Helper function to clear error
    function clearError(input) {
        const formGroup = input.parentElement;
        const error = formGroup.querySelector(".error-message");

        if (error) {
            error.textContent = "";
        }

        input.style.borderColor = "";
    }

    // Validation logic
    function validateForm() {
        let isValid = true;

        // Username validation
        if (username.value.trim() === "") {
            showError(username, "Username is required.");
            isValid = false;
        } else {
            clearError(username);
        }

        // Email validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.value.match(emailPattern)) {
            showError(email, "Enter a valid email address.");
            isValid = false;
        } else {
            clearError(email);
        }

        // Password validation
        if (password.value.length < 6) {
            showError(password, "Password must be at least 6 characters.");
            isValid = false;
        } else {
            clearError(password);
        }

        // Confirm password validation
        if (password.value !== confirmPassword.value) {
            showError(confirmPassword, "Passwords do not match.");
            isValid = false;
        } else {
            clearError(confirmPassword);
        }

        // Terms and conditions validation
        if (!terms.checked) {
            showError(terms, "You must agree to the terms.");
            isValid = false;
        } else {
            clearError(terms);
        }

        return isValid;
    }

    // Form submit event
    form.addEventListener("submit", (e) => {
        if (!validateForm()) {
            e.preventDefault(); // Prevent form submission only if validation fails
        }
    });
    

    // Real-time validation on input change
    [username, email, password, confirmPassword, terms].forEach((input) => {
        input.addEventListener("input", () => {
            validateForm();
        });
    });
});