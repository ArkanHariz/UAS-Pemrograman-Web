document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("loginForm");
    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const password = document.getElementById("password");

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

    function clearError(input) {
        const formGroup = input.parentElement;
        const error = formGroup.querySelector(".error-message");

        if (error) {
            error.textContent = "";
        }

        input.style.borderColor = "";
    }

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
        if (password.value.trim().length < 6) {
            showError(password, "Password must be at least 6 characters.");
            isValid = false;
        } else {
            clearError(password);
        }

        return isValid;
    }

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        if (validateForm()) {
            const formData = new FormData(form);

            fetch("login.php", {
                method: "POST",
                body: formData,
            })
                .then((response) => response.json()) // Parse the response as JSON
                .then((data) => {
                    if (data.success) {
                        alert("Login successful!");
                        window.location.href = "1.2_event_handling.html"; // Redirect on success
                    } else {
                        alert(data.message || "Invalid credentials."); // Show the error message
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Something went wrong. Please try again.");
                });
        }
    });

    username.addEventListener("blur", () => {
        if (username.value.trim() === "") {
            showError(username, "Username cannot be empty.");
        } else {
            clearError(username);
        }
    });

    email.addEventListener("blur", () => {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.value.match(emailPattern)) {
            showError(email, "Invalid email format.");
        } else {
            clearError(email);
        }
    });

    password.addEventListener("input", () => {
        if (password.value.trim().length < 6) {
            showError(password, "Password must be at least 6 characters.");
        } else {
            clearError(password);
        }
    });
});