<!-- includes/footer.php -->
<style>
/* Ensure the body and html take full height */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

/* Make sure the body uses flexbox to ensure footer stays at the bottom */
body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Footer styles */
footer {
    background-color: #333;  /* Dark background */
    color: white;            /* White text */
    text-align: center;      /* Center the text */
    padding: 20px 0;         /* Add some padding */
    position: relative;
    width: 100%;
    margin-top: auto;  /* Push the footer to the bottom */
}

footer p {
    font-size: 14px;
    margin: 0;
}

footer a {
    color: #ff5733;          /* Light orange color for the links */
    text-decoration: none;   /* Remove underline from links */
    transition: color 0.3s ease;
}

footer a:hover {
    color: #c0392b;          /* Darker orange when hovered */
}

/* Make footer responsive */
@media (max-width: 768px) {
    footer {
        font-size: 12px;      /* Slightly smaller text on mobile */
    }
}


</style>

<footer>
    <p>&copy; 2025 Market Mingle. All rights reserved.</p>
</footer>
