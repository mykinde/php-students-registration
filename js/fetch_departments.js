document.addEventListener("DOMContentLoaded", function () {
    const facultySelect = document.getElementById("faculty");
    const departmentSelect = document.getElementById("department");

    facultySelect.addEventListener("change", function () {
        const facultyId = this.value;

        if (facultyId) {
            fetch(`../students/get_departments.php?faculty_id=${facultyId}`)
                .then(response => response.json())
                .then(data => {
                    departmentSelect.innerHTML = '<option value="">Select Department</option>';
                    data.forEach(dept => {
                        departmentSelect.innerHTML += `<option value="${dept.id}">${dept.name}</option>`;
                    });
                })
                .catch(error => console.error('Error:', error));
        } else {
            departmentSelect.innerHTML = '<option value="">Select Department</option>';
        }
    });
});
