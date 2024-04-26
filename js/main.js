    var SearchIcon = document.querySelector('.search-icon');
    var SeachBar = document.querySelector('.search-bar');

    SearchIcon.addEventListener('click', function() {
        if (SeachBar.classList.contains('d-flex')) {
            SeachBar.classList.remove('d-flex');
        } else {
            SeachBar.classList.add('d-flex');
        }
        
    });
    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
    function validatePassword(password) {
        const hasMinimumLength = password.length >= 8;
        const hasMinimumDigits = password.replace(/\D/g, '').length >= 2;
        return hasMinimumLength && hasMinimumDigits;
    }
    function validateName(input) {
        const namePattern = /^[a-zA-Z\s]*$/;
        return namePattern.test(input);
    }
    
    function validateLastName(input) {
        const lastNamePattern = /^[a-zA-Z\s]*$/;
        return lastNamePattern.test(input);
    }
    function validatePhoneNumber(input) {
        const phoneNumberPattern = /^\d+$/;
        return phoneNumberPattern.test(input);
    }

    function validateLoginForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const alertDiv = document.getElementById('alert');

        if (email === '' || password === '') {
            alertDiv.innerHTML = 'Please fill all fields';
            alertDiv.style.display = 'block';
            return false;
        }

        if(!validateEmail(email) && !validatePassword(password)) {
            alertDiv.innerHTML = 'Email & Password are invalid';
            alertDiv.style.display = 'block';
            return false;
        }

        if (!validateEmail(email)) {
            alertDiv.innerHTML = 'Invalid email';
            alertDiv.style.display = 'block';
            return false;
        }

        if (!validatePassword(password)) {
            alertDiv.innerHTML = 'Invalid password';
            alertDiv.style.display = 'block';
            return false;
        }

        return true;
    }

    function validateRegisterForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const nom = document.getElementById('nom').value;
        const prenom = document.getElementById('prenom').value;
        const telephone = document.getElementById('telephone').value;

        const alertDiv = document.getElementById('alert');

        if (email === '' || password === '' || nom === '' || prenom === '' || telephone === '') {
            alertDiv.innerHTML = 'Please fill all fields';
            alertDiv.style.display = 'block';
            return false;
        }

        if(!validateEmail(email) && !validatePassword(password)) {
            alertDiv.innerHTML = 'Email & Password are invalid';
            alertDiv.style.display = 'block';
            return false;
        }

        if(!validateName(nom)) {
            alertDiv.innerHTML = 'Invalid name';
            alertDiv.style.display = 'block';
            return false;
        }

        if(!validateLastName(prenom)) {
            alertDiv.innerHTML = 'Invalid last name';
            alertDiv.style.display = 'block';
            return false;
        }

        if(!validatePhoneNumber(telephone)) {
            alertDiv.innerHTML = 'Invalid phone number';
            alertDiv.style.display = 'block';
            return false;
        }

        if (!validateEmail(email)) {
            alertDiv.innerHTML = 'Invalid email';
            alertDiv.style.display = 'block';
            return false;
        }

        if (!validatePassword(password)) {
            alertDiv.innerHTML = 'Invalid password';
            alertDiv.style.display = 'block';
            return false;
        }

        return true;
    }