import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        let successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 4000);
});
