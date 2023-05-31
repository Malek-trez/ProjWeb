
function validateLoginForm(event) {
    event.preventDefault(); // Prevent form submission for now

    // Get form input values
    var email = document.getElementById("form2Example18").value;
    var password = document.getElementById("form2Example28").value;

    // Basic email validation (you can add more checks)
    if (!/\S+@\S+\.\S+/.test(email)) {
        alert("Please enter a valid email address");
        return;
    }

    // Check password length
    if (password.length < 8) {
        alert("Password should be at least 8 characters long");
        return;
    }

    // If all validations pass, submit the form
    document.getElementById("loginForm").submit();
}
function handleRegisterFormSubmission(event) {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var email = document.getElementById('email').value;
    var dob = document.getElementById('form3Example3').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;

    var errorMessages = [];

    if (fname.trim() === '') {
        errorMessages.push({ field: 'fname', message: 'Please enter your first name.' });
    }

    if (lname.trim() === '') {
        errorMessages.push({ field: 'lname', message: 'Please enter your last name.' });
    }

    if (email.trim() === '') {
        errorMessages.push({ field: 'email', message: 'Please enter your email address.' });
    }

    if (dob.trim() === '') {
        errorMessages.push({ field: 'form3Example3', message: 'Please enter your date of birth.' });
    }

    if (password.trim() === '') {
        errorMessages.push({ field: 'password', message: 'Please enter a password.' });
    } else if (password.length < 8) {
        errorMessages.push({ field: 'password', message: 'Password should be at least 8 characters long.' });
    }

    if (confirmPassword.trim() === '') {
        errorMessages.push({ field: 'confirm_password', message: 'Please confirm your password.' });
    } else if (password !== confirmPassword) {
        errorMessages.push({ field: 'confirm_password', message: 'Passwords do not match.' });
    }

    if (errorMessages.length > 0) {
        for (var i = 0; i < errorMessages.length; i++) {
            var field = errorMessages[i].field;
            var message = errorMessages[i].message;
            var inputField = document.getElementById(field);
            var errorMessage = document.createElement('p');
            errorMessage.className = 'error-message';
            errorMessage.style.color = 'red';
            errorMessage.innerText = message;

            var existingErrorMessages = inputField.parentElement.getElementsByClassName('error-message');
            for (var j = 0; j < existingErrorMessages.length; j++) {
                existingErrorMessages[j].remove();
            }

            inputField.insertAdjacentElement('afterend', errorMessage);
        }
        event.preventDefault(); // Prevent form submission
    }
}

function showUserInfo() {
    // Replace the content of the right section with user information
    var rightSection = document.querySelector('.right-section');
    var name = document.getElementById('pro_name');

    fetch('profile.php?action=getUserInfo')
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                var userInfoHtml = `
                    <thead><h2>User Information</h2></thead>
                          <hr class="mb-4">
                    <ul>
                        <li><h3>First Name</h3><p>${data[0]}</p></li>
                        <li><h3>Last Name</h3><p>${data[1]}</p></li>
                        <li><h3>User e-mail</h3><p>${data[2]}</p></li>
                        <li><h3>User Sexe</h3><p>${data[3] === 'H' ? 'Homme' : 'Femme'}</p></li>
                        <li><h3>User Sold</h3><p>${data[4]} $</p></li>
                    </ul>`;

                name.innerHTML =`${data[0]}` ;
                rightSection.innerHTML = userInfoHtml;
            } else {
                rightSection.innerHTML = '<p>No user information available.</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            rightSection.innerHTML = '<p>An error occurred while fetching user information.</p>';
        });
}


function showBought() {
    var rightSection = document.querySelector('.right-section');

    fetch('profile.php?action=getBuyInfo')
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                var boughtHtml = `
                            <thead><h2>Bought</h2></thead>
                                  <hr class="mb-4">
                            <ul>`;

                data.forEach(bought => {
                    boughtHtml += `<li>Car ID: ${bought.car}</li>`;
                });

                boughtHtml += '</ul>';

                rightSection.innerHTML = boughtHtml;
            } else {
                rightSection.innerHTML = '<p>No bought information available.</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            rightSection.innerHTML = '<p>An error occurred while fetching bought information.</p>';
        });
}

function showRented() {
    var rightSection = document.querySelector('.right-section');

    fetch('profile.php?action=getRentInfo')
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                var rentalHtml = `
                           <thead> <h2>Rented</h2></thead>
                                 <hr class="mb-4">
                            <ul>`;

                data.forEach(rental => {
                    rentalHtml += `<li>Car ID: ${rental.car}</li>`;
                    rentalHtml += `<li>Start Date: ${rental.Date_Déb}</li>`;
                    rentalHtml += `<li>End Date: ${rental.Date_Fin}</li>`;
                });

                rentalHtml += '</ul>';

                rightSection.innerHTML = rentalHtml;
            } else {
                rightSection.innerHTML = '<p>No rented information available.</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            rightSection.innerHTML = '<p>An error occurred while fetching rental information.</p>';
        });
}