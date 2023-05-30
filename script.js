

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
