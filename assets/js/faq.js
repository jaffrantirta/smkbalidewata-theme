document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle Functionality
    const faqItems = document.querySelectorAll('[data-faq-toggle]');
    
    faqItems.forEach(function(button) {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const arrow = this.querySelector('svg');
            const isOpen = content.style.display === 'block';
            
            // Close all other FAQ items
            faqItems.forEach(function(otherButton) {
                if (otherButton !== button) {
                    const otherContent = otherButton.nextElementSibling;
                    const otherArrow = otherButton.querySelector('svg');
                    otherContent.style.display = 'none';
                    otherArrow.style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current FAQ item
            if (isOpen) {
                content.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
            } else {
                content.style.display = 'block';
                arrow.style.transform = 'rotate(180deg)';
            }
        });
    });
});