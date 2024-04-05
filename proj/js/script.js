const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// edit ticket
        function editTicket() {
            var priority = document.getElementById("priority").textContent;
            var status = document.getElementById("status").textContent;
            var department = document.getElementById("department").textContent;
            var agent = document.getElementById("agent").textContent;

            // Replace the ticket details section with the editing form
            document.querySelector(".todo").innerHTML = `
                <div class="head">
                    <h3>Edit Ticket</h3>
                    <i class='bx bx-check' onclick="saveTicket()"></i>
                </div>
                <ul class="todo-list">
                    <li>
                        <label for="edit-priority">Priority:</label>
                        <select id="edit-priority">
                            <option value="Low" ${priority === 'Low' ? 'selected' : ''}>Low</option>
                            <option value="Medium" ${priority === 'Medium' ? 'selected' : ''}>Medium</option>
                            <option value="High" ${priority === 'High' ? 'selected' : ''}>High</option>
                        </select>
                    </li>
                    <li>
                        <label for="edit-status">Status:</label>
                        <select id="edit-status">
                            <option value="Open" ${status === 'Open' ? 'selected' : ''}>Open</option>
                            <option value="In Progress" ${status === 'In Progress' ? 'selected' : ''}>In Progress</option>
                            <option value="Resolved" ${status === 'Resolved' ? 'selected' : ''}>Resolved</option>
                            <option value="Closed" ${status === 'Closed' ? 'selected' : ''}>Closed</option>
                        </select>
                    </li>
                    <li>
                        <label for="edit-department">Department:</label>
                        <input type="text" id="edit-department" value="${department}">
                    </li>
                    <li>
                        <label for="edit-agent">Assigned Agent:</label>
                        <input type="text" id="edit-agent" value="${agent}">
                    </li>
                    <li>
                        <label for="edit-hashtags">Hashtags:</label>
                        <input type="text" id="edit-hashtags" value="login authentication websiteissue">
                    </li>
                </ul>
            `;
        }

        function saveTicket() {
            var priority = document.getElementById("edit-priority").value;
            var status = document.getElementById("edit-status").value;
            var department = document.getElementById("edit-department").value;
            var agent = document.getElementById("edit-agent").value;
            var hashtags = document.getElementById("edit-hashtags").value;

            // TODO: Send the updated ticket details to the server for saving

            // Replace the editing form with the updated ticket details
            document.querySelector(".todo").innerHTML = `
                <div class="head">
                    <h3>Ticket Details</h3>
                    <i class='bx bx-pencil' onclick="editTicket()"></i>
                </div>
                <ul class="todo-list">
                    <li class="cor">
                        <p>Ticket ID: #<?php echo $ticket->id ?></p>
                    </li>
                    <li class="cor">
                        <p>Priority: <span id="priority">${priority}</span></p>
                    </li>
                    <li class="cor">
                        <p>Status: <span id="status">${status}</span></p>
                    </li>
                    <li class="cor">
                        <p>Department: <span id="department">${department}</span></p>
                    </li>
                    <li class="cor">
                        <p>Assigned Agent: <span id="agent">${agent}</span></p>
                    </li>
                    <li class="cor">
                        <p>Hashtags: ${hashtags}</p>
                    </li>
                </ul>
            `;
        }