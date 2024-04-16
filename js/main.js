    var SearchIcon = document.querySelector('.search-icon');
    var SeachBar = document.querySelector('.search-bar');

    SearchIcon.addEventListener('click', function() {
        if (SeachBar.classList.contains('d-flex')) {
            SeachBar.classList.remove('d-flex');
        } else {
            SeachBar.classList.add('d-flex');
        }
        
    });
