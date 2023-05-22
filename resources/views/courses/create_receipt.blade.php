<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <form action="{{ route('Courses.store') }}" method="POST">
        @csrf
        <label for="student_name">Student Name</label>
        <input type="text" name="student_name" id="student_name" required>
    
        <label for="guardian_name">Guardian Name</label>
        <input type="text" name="guardian_name" id="guardian_name" required>
    
        <label for="installment_number">Installment Number</label>
        <input type="number" name="installment_number" max="5" min="1" id="installment_number" required>
        <br><br>
        <label for="guardian_name">Course Name</label>
        <select name="courses[]" id="courses" required>
            @foreach ($courses as $course)
                <option name="course_value" value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
        <button type="button" id="addCourse">Add Course</button>

        <table id="courseTable">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Courses will be dynamically added here -->
            </tbody>
        </table>
        <br><br><br>
        {{-- <input type="" name="guardian_name" id="guardian_name" required> --}}
    
        <button type="submit">Create</button>
    </form>



    <script>
    document.getElementById('addCourse').addEventListener('click', function() {
    var selectElement = document.getElementById('courses');
    var selectedCourse = selectElement.options[selectElement.selectedIndex].text;
    var courseId = selectElement.value;

    var tableBody = document.querySelector('#courseTable tbody');
    var newRow = tableBody.insertRow();

    var courseCell = newRow.insertCell();
    courseCell.textContent = selectedCourse;

    var actionCell = newRow.insertCell();
    var deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.textContent = 'حذف';
    deleteButton.addEventListener('click', function() {
        var row = this.parentNode.parentNode;
        row.remove();
    });
    actionCell.appendChild(deleteButton);

    // Append the selected course ID as a hidden input for form submission
    var hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'courses[]'; // Use the same name as in the controller
    hiddenInput.value = courseId;
    newRow.appendChild(hiddenInput);
});



    </script>
    
    
</body>
</html>