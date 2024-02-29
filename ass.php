<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Page</title>
    <style>
        /* Simple CSS for styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .assignments-container {
            margin-top: 20px;
        }
        .assignment {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .hide-button {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Assignment</h1>
        <form id="assignmentForm">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea><br>
            <label for="dueDate">Due Date:</label><br>
            <input type="date" id="dueDate" name="dueDate" required><br><br>
            <button type="submit">Add Assignment</button>
        </form>

        <!-- Hide Form and Unhide Form buttons -->
        <button id="hideFormBtn">Hide Form</button>
        <button id="unhideFormBtn"  class="hide-button">Unhide Form</button>

        <h1>Assignments</h1>
        <div id="assignments">
            <!-- Assignments will be displayed here -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const assignmentForm = document.getElementById('assignmentForm');
            const assignmentsContainer = document.getElementById('assignments');
            const hideFormBtn = document.getElementById('hideFormBtn');
            const unhideFormBtn = document.getElementById('unhideFormBtn');
            const form = document.getElementById('assignmentForm');
            const passcode = "123456"; // Passcode to show the unhide button

            hideFormBtn.addEventListener('click', function(event) {
                event.preventDefault();
                // Hide the form
                form.style.display = 'none';
                // Show the "Unhide Form" button
                unhideFormBtn.classList.remove('hide-button');
            });

            // Add event listener to unhide button
            unhideFormBtn.addEventListener('click', function(event) {
                event.preventDefault();
                // Prompt for passcode
                const userPasscode = prompt("Enter passcode to unhide the form:");
                // If passcode matches, show the form
                if (userPasscode === passcode) {
                    form.style.display = 'block';
                    unhideFormBtn.classList.add('hide-button');
                } else {
                    alert("Incorrect passcode. Form cannot be unhided.");
                }
            });

            assignmentForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // Get form values
                const title = document.getElementById('title').value;
                const description = document.getElementById('description').value;
                const dueDate = document.getElementById('dueDate').value;

                // Create assignment element
                const assignmentElement = document.createElement('div');
                assignmentElement.classList.add('assignment');
                assignmentElement.innerHTML = `
                    <h3>${title}</h3>
                    <p><strong>Description:</strong> ${description}</p>
                    <p><strong>Due Date:</strong> ${dueDate}</p>
                `;

                // Append assignment to container
                assignmentsContainer.appendChild(assignmentElement);

                // Clear form fields
                assignmentForm.reset();
            });
        });
    </script>
</body>
</html>
