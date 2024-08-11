document.getElementById('search-btn').addEventListener('click', function () {
    searchStaff(1);
});

document.addEventListener('click', function(event) {
    if (event.target.matches('.pagination a')) {
        event.preventDefault();
        const page = event.target.getAttribute('href').split('page=')[1];
        searchStaff(page);
    }
});

function searchStaff(page) {
    const query = document.getElementById('example2').value;

    fetch(`/staff-directory?query=${query}&page=${page}`, {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        const staffList = document.getElementById('staff-list');
        staffList.innerHTML = ''; // Clear previous results

        if (data.data.length) {
            data.data.forEach(staffMember => {
                const staffCard = `
                <div id="card_5" class=" col-xxl-4 col-xl-6 col-lg-6  col-md-6 layout-spacing">
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-7 m-auto mt-5">
                        <a class="card style-7" href="" target="_blank">
                            <img src="/storage/${staffMember.profile_picture}" class="card-img-top" alt="...">
                            <div class="card-footer">
                                <h5 class="card-title mb-0">${staffMember.name}</h5>
                                <p class="card-text">
                                    <strong>Extension:</strong> ${staffMember.ext_no}<br>
                                    <strong>Department:</strong> ${staffMember.department}<br>
                                    <strong>Designation:</strong> ${staffMember.designation}<br>
                                    <strong>Contact Number:</strong> ${staffMember.contact_number}<br>
                                    <strong>Email:</strong> ${staffMember.office_email}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                `;
                staffList.innerHTML += staffCard;
            });


            document.getElementById('staff-directory');

        } else {
            staffList.innerHTML = '<p>No results found</p>';
        }
    })
    .catch(error => console.error('Error fetching staff:', error));
}
