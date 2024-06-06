document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    let searchQuery = document.getElementById('find').value.trim();
    if (searchQuery !== '') {
        fetchResults(searchQuery);
    }
});

function fetchResults(query) {
    // Send search query to server-side PHP script
    fetch('search.php?q=' + encodeURIComponent(query))
    .then(response => response.text())
    .then(data => {
        document.getElementById('searchResults').innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}
