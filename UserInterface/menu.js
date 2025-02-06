function toggleSidebar() {
    // Get elements by their IDs
    const sidebar = document.getElementById("mySidebar");
    const content = document.getElementById("mainContent");
    const topBar = document.getElementById("pageTitle");

    // Toggle the 'closed' class on sidebar to change its width
    sidebar.classList.toggle("closed");

    // Toggle the 'shrink' class on main content and top bar to adjust margins and width accordingly
    content.classList.toggle("shrink");
    topBar.classList.toggle("shrink");
}
