document.addEventListener("DOMContentLoaded", function() {
    const tabLinks = document.querySelectorAll(".nav-item");
    const tabWrappers = document.querySelectorAll(".tab-wrapper");
  
    // Add click event listeners to each tab link
    tabLinks.forEach(tab => {
      tab.addEventListener("click", function(e) {
        e.preventDefault();
  
        const tabId = this.getAttribute("data-tab");
  
        // Remove active class from all tab links and tab wrappers
        tabLinks.forEach(link => link.classList.remove("active"));
        tabWrappers.forEach(wrapper => wrapper.classList.remove("active"));
  
        // Add active class to the clicked tab link and corresponding tab wrapper
        this.classList.add("active");
        document.getElementById(tabId).classList.add("active");
      });
    });
  });
  