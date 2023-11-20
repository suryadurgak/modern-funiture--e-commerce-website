
    // JavaScript to populate the course list dynamically
    document.addEventListener('DOMContentLoaded', function() {
      const courses = ['Mathematics', 'History', 'Science']; // Sample list of courses
      const courseList = document.getElementById('courseList');
      
      // Loop through courses and create list items
      courses.forEach(function(course) {
        const listItem = document.createElement('li');
        listItem.textContent = course;
        courseList.appendChild(listItem);
      });
    });
  