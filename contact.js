document.addEventListener('DOMContentLoaded', function() {
  var contactForm = document.getElementById('contactForm');
  var responseMessage = document.getElementById('responseMessage');

  contactForm.addEventListener('submit', function(event) {
    event.preventDefault();

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var query = document.getElementById('query').value;

  
    var formData = {
      name: name,
      email: email,
      query: query
    };

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_contact.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
       
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
    
          responseMessage.textContent = 'Form submitted successfully!';
        } else {
        
          responseMessage.textContent = 'An error occurred: ' + response.message;
        }
      }
    };
    xhr.send(JSON.stringify(formData));
  });
});
