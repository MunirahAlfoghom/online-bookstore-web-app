// Form validation on Add/Edit Book pages
function validateForm(event) {
    event.preventDefault();
    const errors = [];
    const title = document.getElementById('title').value.trim();
    const author = document.getElementById('author').value.trim();
    const price = document.getElementById('price').value.trim();
    const category = document.getElementById('category').value;
  
    if (!title) errors.push('Title is required.');
    if (!author) errors.push('Author is required.');
    if (!price || isNaN(price) || Number(price) <= 0) {
      errors.push('Price must be a positive number.');
    }
    if (!category) errors.push('Please select a category.');
  
    if (errors.length) {
      alert('Please fix the following errors:\n- ' + errors.join('\n- '));
    } else {
      event.target.submit();
    }
  }
  
  // Attach validation to forms
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('bookForm');
    if (form) form.addEventListener('submit', validateForm);
  });