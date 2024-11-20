// Function to add animation when section comes into view
window.addEventListener('scroll', function() {
    var libraryInfo = document.querySelector('.library-info');
    var position = libraryInfo.getBoundingClientRect().top;
    var screenPosition = window.innerHeight / 1.5;
    
    if (position < screenPosition) {
        libraryInfo.classList.add('fade-in-visible');
    }
});
